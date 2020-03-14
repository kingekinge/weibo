<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{

     function  siginUp(){
            return view('user.signup');

     }


     function create(){
         return view('user.signup');
     }


     function show(User $user) {
         return view('user.show', compact('user'));
    }

}
