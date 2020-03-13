<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

     function  siginUp(){
            return view('user.signup');

     }

}
