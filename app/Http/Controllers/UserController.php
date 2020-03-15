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


    function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

    }



}
