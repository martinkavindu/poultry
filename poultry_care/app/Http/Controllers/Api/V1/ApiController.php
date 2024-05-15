<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ordersResource;
use App\Http\Requests\V1\StoreOrderRequest;
use Twilio\Rest\Client;
use Tymon\JWTAuth\Facades\JWTAuth;
use Mail;

class ApiController extends Controller
{
public function index(){

    return  Orders::all();
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

    $quantityAvailable = DB::table('products')
                       ->where('product_name', $request->order_item)
                       ->first();

   $quantity = $quantityAvailable->Quantity;
   

    if($quantity < $request->quantity){

        return response()->json(['success' =>false, 'message' => 'quantity entered is not available']);

    }
    $remainder = $quantity - $request->quantity;

    DB::table('products')
            ->where('product_name',$request->order_item)
            ->update([
             'Quantity' =>$remainder
            ]);

    // Insert new order
    $inserted = DB::table('orders')->insert([
        'order_id' => $newOrderId,
        'customer_id' => $newCustomerId,
        'customer_name' => $request->customer_name,
        'customer_email' => $request->customer_email,
        'customer_phone' => $request->customer_phone,
        'amount' => $request->amount,
        'order_type' => 'website',
        'order_item' => $request->order_item,
        'quantity' => $request->quantity,
    ]);



    // Check if insertion was successful before proceeding
    if ($inserted) {
        // Send SMS
        $account_sid = config('services.twilio.sid');
        $account_token = config('services.twilio.token');
        $number = config('services.twilio.from');  

        $client = new Client($account_sid, $account_token);
        $client->messages->create($request->customer_phone, [
            'from' => $number,
            'body' => 'Thank you customer your order has been received'
        ]);

        // Send Email
        $data['name'] = $request->customer_name;
        $data['email'] = $request->customer_email;
        $data['title'] ="New order Received";
        $data['order'] = $newOrderId;
        $data['quantity'] = $request->quantity;
        $data['cost']   = $request->amount;
        $data['product'] = $request->item;

        Mail::send('order_mail', ['data' => $data], function($message) use($data) {
            $message->to($data['email'])->subject($data['title']);
        });
    }
    
   
    return response()->json(['success' => true, 'message' => 'data inserted successfully']);

}

//register api

public function RegisterApi(Request $request){

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' =>'required|confirmed',
    ]);

    User::create([
    "name" => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    ]);

    return response()->json(["success"=>true,"message"=>"user created successfully"]);

}
//login api
public function LoginApi(Request $request){

$request->validate([
    'password'=>'required',
    'email' =>'required|email'

]);

config(['jwt.ttl' => 180]);

$token = JWTAuth::attempt([
    'email' => $request->email,
    'password' => $request->password,
]);
if(!empty($token)){

 return response()->json(['success'=>true,'token'=>$token,'expiry'=>'180 mins']);

}
return response()->json(['success'=>false, 'message' => 'incorrect details' ]);

}

//profile Api
public function ProfileApi(){

$userData = auth()->user();

return response()->json(['success'=>true,'user'=>$userData]);

}


public function LogoutApi(){

    auth()->logout();

    return response()->json(['success'=>true,'message'=>'logout successful']);
}

public function ChangePassword(Request $request){

    $request->validate([
        'new_password' => 'required',
        'old_password' => 'required'
    ]);

    $user = auth()->user();
    if (!Hash::check($request->old_password, $user->password)) {
        return response()->json(['success' => false, 'message' => 'Old password is incorrect'], 400);
    }

    $user->password = Hash::make($request->new_password);
    $user->save();
    return response()->json(['success' => true, 'message' => 'Password changed successfully']);
}

}
