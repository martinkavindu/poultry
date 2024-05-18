<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function  Allpermission(){
$permissions = Permission::all();

return view('admin.allpermission',compact('permissions'));

    }
}
