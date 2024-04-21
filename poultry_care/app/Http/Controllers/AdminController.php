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
   'quantity' =>$request->number_items,
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

   public function Allsales(){
  $sales = DB::select("SELECT * FROM sales");
  $neworders = DB::select("SELECT * FROM orders WHERE order_status = 'pending'");
  $new =count($neworders);
  return view('admin.sales',compact('sales','new'));

   }

   public function AllInventory(){

    $inventories = DB::select("SELECT * FROM products");
    $neworders = DB::select("SELECT * FROM orders WHERE order_status = 'pending'");
    $new =count($neworders);

    return view('admin.inventory',compact('inventories','new'));

   }
   public function Addinventory(Request $request){

    $latestProductId = DB::table('products')->max('product_id');
    $lastNumber = intval(substr($latestProductId, 2)); 
    $newProductId = 'PD' . str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT); 

    DB::table('products')->insert([
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'Quantity' => $request->quantity,
        'unit'    =>$request->unit,
        'category' =>$request->category,
        'product_id' => $newProductId
    ]); return redirect()->route('all.inventory')->with('message','product added successfully');

}
public function Deleteproduct($id){

      DB::table('products')->where('id', $id)->delete();
      return redirect()->route('all.inventory')->with('message','product delete successfully');
  
}
public function Getproduct(Request $request){

    $pid = $request->id;
   $products = DB::table('products')->where('id',$pid)->get();

    return response()->json(['success'=>true,'data'=>$products]);
}

public function UpdateInventory(Request $request){
    $pid = $request->id;

    DB::table('products')->where('id',$pid)->update([
'product_name' =>$request->product_name,
'Quantity'     =>$request->quantity,
'product_price' =>$request->product_price,
'unit'          =>$request->unit,
'category'     =>$request->category,


    ]);

    return redirect()->route('all.inventory')->with('message','product updated successfully');
}

public function Allproducts(){

    $products = DB::table('products')->pluck('product_name')->toArray();

    return response()->json(['success'=>true,'data'=>$products]);
}

public function Getprice(Request $request){

$item = $request->item;

$price = DB::table('products')->where('product_name',$item)->pluck('product_price');
return response()->json(['success'=>true,'data'=>$price]);
}

public function Addorder(Request $request)
{
    // Generate new order ID
    $latestOrderId = DB::table('orders')->max('order_id');
    $lastOrderNumber = intval(substr($latestOrderId, 2)); 
    $newOrderId = 'OD' . str_pad($lastOrderNumber + 1, 2, '0', STR_PAD_LEFT); 

    // Generate new customer ID
    $latestCustomerId = DB::table('orders')->max('customer_id');
    $lastCustomerNumber = intval(substr($latestCustomerId, 2)); 
    $newCustomerId = 'CT' . str_pad($lastCustomerNumber + 1, 2, '0', STR_PAD_LEFT); 


    DB::table('orders')->insert([
        'order_id' => $newOrderId,
        'customer_id' => $newCustomerId,
        'customer_name' => $request->customer_name,
        'customer_email' => $request->customer_email,
        'customer_phone' => $request->customer_phone,
        'amount' => $request->amount,
        'payment_status' => $request->payment_status,
        'order_item' => $request->item,
        'quantity' => $request->quantity,
        'order_status' => $request->order_status,
    ]);

    return redirect()->route('customer.orders')->with('message', 'Order created successfully');
}


}
