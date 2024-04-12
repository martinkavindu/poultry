<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function adminDashboard(){

    //   $orders = Orders::all();
    //   $total = $orders->count();
    $orders = DB::select("SELECT * FROM orders");
    $total = count($orders);
        return view('admin.dashboard',compact('total','orders'));
    }

    public function Logout (Request $request){

        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
      }
   public function Orders(){
    $orders = DB::select("SELECT * FROM orders");
    return view('admin.orders',compact('orders'));

   }
}
