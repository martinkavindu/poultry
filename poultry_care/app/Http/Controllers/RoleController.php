<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

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
}
