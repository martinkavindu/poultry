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
    $neworders =DB::select("SELECT * FROM orders WHERE order_status = 'pending'");
    $new =count($neworders);
    return view('admin.dashboard',compact('total','orders','new','neworders'));
    }

    public function Logout (Request $request){

        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
      }
   public function Orders(){
    $orders = DB::select("SELECT * FROM orders");
    $neworders =DB::select("SELECT * FROM orders WHERE order_status = 'pending'");
    $new =count($neworders);
    return view('admin.orders',compact('orders','neworders','new'));
   }
   public function Deleteorder($id){

    Orders::findOrFail($id)->delete();
    return redirect()->back()->with('message','Order deleted successfully');
   }

   public function Editorder(Request $request){
    $id = $request->id;
    $order = Orders::find($id);
    return response()->json(['success' => true,'data'=>$order]);
   }

   public function UpdateOrder( Request $request){
    $oid = $request->id;
    Orders::findOrFail($oid)->update([
   'payment_status' =>$request->payment_status,
   'number_items' =>$request->number_items,
   'order_status' =>$request->order_status,
    'amount'     =>$request->amount,
    ]);

    return redirect()->route('customer.orders')->with('message','Order updated successfully');

   }
   public function Customers(){

    $customersdata= Orders::all();
    $neworders =DB::select("SELECT * FROM orders WHERE order_status = 'pending'");
    $new =count($neworders);
    return view('admin.customers',compact('customersdata','new'));
   }

   public function PendingOrders(){
    $neworders = DB::select("SELECT * FROM orders WHERE order_status = 'pending'");
    $new =count($neworders);

    return view('admin.pending',compact('new','neworders'));
   }
}
