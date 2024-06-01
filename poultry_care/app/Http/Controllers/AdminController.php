<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail;
use Spatie\Permission\Models\Role;
use Twilio\Rest\Client;

class AdminController extends Controller
{
    public function adminDashboard()
    {

        $orders = DB::select("SELECT * FROM orders");
        $total = count($orders);
        $neworders = DB::select("SELECT * FROM orders WHERE order_status = 'pending'");
        $new = count($neworders);
        $salesTotal = DB::table('sales')->sum('total_price');
        $quantityOrders = Orders::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(quantity) as total_quantity')
        )
            ->whereMonth('created_at', '>=', 1)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get()
            ->toArray();
        $salesData = DB::table('sales')->select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_price) as total_price')
        )
            ->whereMonth('created_at', '>=', 1)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get()
            ->toArray();

        return view('admin.dashboard', compact('total', 'orders', 'new', 'neworders', 'salesTotal', 'quantityOrders', 'salesData'));
    }

    public function Logout(Request $request)
    {

        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
    }
    public function Orders()
    {
        $orders = DB::select("SELECT * FROM orders");
        $neworders = DB::select("SELECT * FROM orders WHERE order_status = 'pending'");
        $new = count($neworders);
        return view('admin.orders', compact('orders', 'neworders', 'new'));
    }
    public function Deleteorder($id)
    {

        Orders::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Order deleted successfully');
    }

    public function Editorder(Request $request)
    {
        $id = $request->id;
        $order = Orders::find($id);
        return response()->json(['success' => true, 'data' => $order]);
    }

    public function UpdateOrder(Request $request)
    {
        $oid = $request->id;
        Orders::findOrFail($oid)->update([
            'payment_status' => $request->payment_status,
            'quantity' => $request->number_items,
            'order_status' => $request->order_status,
            'amount' => $request->amount,
        ]);

        if ($request->payment_status == 'paid') {
            DB::table('sales')->insert([
                'product' => $request->item_name,
                'Quantity' => $request->number_items,
                'total_price' => $request->amount,
                'notes' => "Custoner paid order",
            ]);

        }

        return redirect()->route('customer.orders')->with('message', 'Order updated successfully');
    }
    public function Customers()
    {

        $customersdata = Orders::all();
        $neworders = DB::select("SELECT * FROM orders WHERE order_status = 'pending'");
        $new = count($neworders);
        return view('admin.customers', compact('customersdata', 'new'));
    }

    public function PendingOrders()
    {
        $neworders = DB::select("SELECT * FROM orders WHERE order_status = 'pending'");
        $new = count($neworders);

        return view('admin.pending', compact('new', 'neworders'));
    }

    public function Allsales()
    {
        $sales = DB::select("SELECT * FROM sales");
        $neworders = DB::select("SELECT * FROM orders WHERE order_status = 'pending'");
        $new = count($neworders);
        return view('admin.sales', compact('sales', 'new'));

    }

    public function AllInventory()
    {

        $inventories = DB::select("SELECT * FROM products");
        $neworders = DB::select("SELECT * FROM orders WHERE order_status = 'pending'");
        $new = count($neworders);

        return view('admin.inventory', compact('inventories', 'new'));

    }
    public function Addinventory(Request $request)
    {

        $latestProductId = DB::table('products')->max('product_id');
        $lastNumber = intval(substr($latestProductId, 2));
        $newProductId = 'PD' . str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);

        DB::table('products')->insert([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'Quantity' => $request->quantity,
            'unit' => $request->unit,
            'category' => $request->category,
            'product_id' => $newProductId,
        ]);return redirect()->route('all.inventory')->with('message', 'product added successfully');

    }
    public function Deleteproduct($id)
    {

        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('all.inventory')->with('message', 'product delete successfully');

    }
    public function Getproduct(Request $request)
    {

        $pid = $request->id;
        $products = DB::table('products')->where('id', $pid)->get();

        return response()->json(['success' => true, 'data' => $products]);
    }

    public function UpdateInventory(Request $request)
    {
        $pid = $request->id;

        DB::table('products')->where('id', $pid)->update([
            'product_name' => $request->product_name,
            'Quantity' => $request->quantity,
            'product_price' => $request->product_price,
            'unit' => $request->unit,
            'category' => $request->category,

        ]);

        return redirect()->route('all.inventory')->with('message', 'product updated successfully');
    }

    public function Allproducts()
    {

        $products = DB::table('products')->pluck('product_name')->toArray();

        return response()->json(['success' => true, 'data' => $products]);
    }

    public function ProductData()
    {

        $productdata = DB::table('products')->get();
        return response()->json(['success' => true, 'data' => $productdata]);
    }

    public function Getprice(Request $request)
    {

        $item = $request->item;

        $price = DB::table('products')->where('product_name', $item)->pluck('product_price');
        return response()->json(['success' => true, 'data' => $price]);
    }

    public function getQuantity(Request $request)
    {
        $quatity = DB::table('products')
            ->where('product_name', $request->item)
            ->pluck('Quantity');

        return response()->json(['success' => true, 'data' => $quatity]);

    }

    public function Addorder(Request $request)
    {
        // Generate new orde
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

        // products renaining
        $quantityAvailable = DB::table('products')
            ->where('product_name', $request->item)
            ->first();

        $quantity = $quantityAvailable->Quantity;

        $remainder = $quantity - $request->quantity;

        DB::table('products')
            ->where('product_name', $request->item)
            ->update([
                'Quantity' => $remainder,
            ]);
        //sending  message

        $account_sid = config('services.twilio.sid');
        $account_token = config('services.twilio.token');
        $number = config('services.twilio.from');

        $client = new Client($account_sid, $account_token);
        $client->messages->create($request->customer_phone, [
            'from' => $number,
            'body' => 'Thank you customer your order has been received',
        ]);
        // sending email
        $data['name'] = $request->customer_name;
        $data['email'] = $request->customer_email;
        $data['title'] = "New order Received";
        $data['order'] = $newOrderId;
        $data['quantity'] = $request->quantity;
        $data['cost'] = $request->amount;
        $data['product'] = $request->item;

        Mail::send('order_mail', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        }

        );

        return redirect()->route('customer.orders')->with('message', 'Order created successfully');
    }

    public function AddSales(Request $request)
    {

        DB::table('sales')->insert([
            'product' => $request->product,
            'Quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'total_price' => $request->total_price,
            'notes' => $request->notes,
            'discount' => $request->discount,
        ]);

        return redirect()->route('all.sales')->with('message', 'Sale added successfully');
    }

    public function Deletesale($id)
    {

        DB::table('sales')->where('id', $id)->delete();
        return redirect()->route('all.sales')->with('message', 'Sale deleted successfully');

    }
    public function Systemusers()
    {
        $systemusers = User::where('role', 'admin')->get();
        $roles = Role::all();

        return view('admin.system_users', compact('systemusers', 'roles'));
    }

    public function Adduser(Request $request)
    {

        $id = $request->id;

        if (!empty($id)) {

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->username = $request->username;
    
            $user->save();

        $user->roles()->detach();

        if ($request->roles) {
            $role = Role::findById($request->roles);
            $user->assignRole($role);
        }

        return redirect()->route('system.users')->with('message', 'User updated  successfully');


        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'admin';
        $user->status = 'active';
        $user->password = Hash::make($request->password);
        $user->username = $request->username;

        $user->save();

        if ($request->roles) {
            $role = Role::findById($request->roles);
            $user->assignRole($role);
        }

        return redirect()->route('system.users')->with('message', 'User added  successfully');
    }


    public function Editusers(Request $request){

        $id = $request->id;

        $user = User::findOrFail($id);

        return response()->json(['data'=>$user]);
    }

    public function Deleteuser($id){

    $user= User::findOrFail($id);

    if(!empty($user)){

        $user->delete();
    }

    return redirect()->route('system.users')->with('message', 'User deleted  successfully');
    }

    public function Importpermission(){

        return view('admin.importpermission');
    }
}
