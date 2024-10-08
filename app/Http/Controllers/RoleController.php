<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Exports\permissionsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PermissionsImport;
use DB;

class RoleController extends Controller
{
    public function Allpermission()
    {
        $permissions = Permission::all();

        return view('admin.allpermission', compact('permissions'));

    }

    public function Addpermission(Request $request)
    {

        if (!empty($request->id)) {
            $permission = Permission::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'group_name' => $request->group_name,
                ]);
            return redirect()->route('all.permission')->with('message', 'Permission updated successfully');

        }
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        return redirect()->route('all.permission')->with('message', 'Permission created successfully');
    }

    public function Deletepermission($id)
    {

        Permission::where('id', $id)->delete();
        return redirect()->route('all.permission')->with('message', 'Permission deleted successfully');
    }

    public function Getpermission(Request $request)
    {

        $permission = Permission::where('id', $request->id)->first();
        return response()->json(['data' => $permission]);
    }

    public function AllRoles(){

        $roles =Role::all();

        return view('admin.allroles',compact('roles'));
    }

    public function AddRole(Request $request)
    {

        $role = Role::create([
            'name' => $request->name,
            
        ]);

        return redirect()->route('all.roles')->with('message', 'Role created successfully');
    }


    public function Deleterole($id){

        Role::where('id',$id)->delete();
        return redirect()->back()->with('message','Role deleted successfully');
    }

    public function Addrolespermission(){

        $roles =  Role::all();
        $permission =  Permission::all();
        $permission_groups = User::getpermissionGroups();
        
        return view('admin.addrolespermission',compact('roles','permission','permission_groups'));

    }

    public function Storerolepermission(Request $request){
        $data = array();
        $permissions = $request->permission;

        foreach($permissions as $key => $item){

        $data['role_id'] = $request->role_id;
        $data['permission_id'] = $item;

        DB::table('role_has_permissions')->insert($data);
    }
        return redirect()->route('all.roles&permisssion')->with('message','role and permission added successfuly');
        
    }

    public function Allrolespermission(){

        $roles= Role::all();
         return view('admin.allrolespermission',compact('roles'));
    }

    public function Editpermissionrole($id){

$role = Role::findOrFail($id);
$permissions = Permission::all();
$permission_groups = User::getpermissionGroups();

return view('admin.editrolespermission',compact('role','permissions','permission_groups'));


    }

    public function Updaterolepermission(Request $request,$id){

        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if(!empty($permissions)){
            $role->permissions()->attach($permissions);
        }

        
        return redirect()->route('all.roles&permisssion')->with('message','permissions updated successfully');
    }

    public function Deletepermissionrole($id){

        $role = Role::findOrFail($id);
        if(!is_null($role)){

            $role->delete();
        }

        return redirect()->back()->with('message','role deleted successfully');
    }


    
    public function Exportpermission(){

        return Excel::download(new permissionsExport, 'permission.xlsx');
        
    }
public function Importpermission(Request $request){

    Excel::import(new PermissionsImport, $request->file('importfile'));
        
    return redirect()->route('all.permission')->with('message', 'successfully imported');


}

}
