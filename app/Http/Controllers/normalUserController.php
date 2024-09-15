<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class normalUserController extends Controller
{
    public function userDashboard(){

    return view('user.userdashboard');
    }
}
