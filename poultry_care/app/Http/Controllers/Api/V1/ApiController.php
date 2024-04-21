<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ordersResource;
use App\Http\Requests\V1\StoreOrderRequest;

class ApiController extends Controller
{
public function index(){

    return Orders::all();
}

// public function show(Orders $orders){

//     return Orders::where('id')->get();
// }

public function store(StoreOrderRequest $request){
 
        // Generate new order ID
        $latestOrderId = DB::table('orders')->max('order_id');
        $lastNumber = intval(substr($latestOrderId, 2)); 
        $newOrderId = 'OD' . str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT); 
    
        // Generate new customer ID
        $latestCustomerId = DB::table('orders')->max('customer_id');
        $lastCustomerNumber = intval(substr($latestCustomerId, 2)); 
        $newCustomerId = 'CT' . str_pad($lastCustomerNumber + 1, 2, '0', STR_PAD_LEFT); 
    
    
        // Insert new order
      return  DB::table('orders')->insert([
            'order_id' => $newOrderId,
            'customer_id' => $newCustomerId,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'amount' => $request->amount,
            // 'payment_status' => $request->payment_status,
            'order_item' => $request->order_item,
            'quantity' => $request->quantity,
            // 'order_status' => $request->order_status,
        ]);
    
}

}
