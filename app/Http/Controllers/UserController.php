<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{

    function edit(){

    }


    function index(){

    }


     function create(){
         return view('user.create');
     }


     function show(User $user) {
         return view('user.show', compact('user'));
    }



}
