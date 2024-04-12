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

    return  Orders::create($request->all());
}

}
