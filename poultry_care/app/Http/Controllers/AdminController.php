<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin.dashboard');
    }

    public function Logout (Request $request){

        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
      }
  
}
