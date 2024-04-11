<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;

class AdminController extends Controller
{
    public function adminDashboard(){

      $orders = Orders::all();
      $total = $orders->count();
        return view('admin.dashboard',compact('total'));
    }

    public function Logout (Request $request){

        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
      }
  
}
