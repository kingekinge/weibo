<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SessionsController extends Controller
{
    function create(){
        return view('session.create');

    }


    function store(Request $request){
        $credentials = $this->validate($request,[
            'email' => 'required|email|max:255',
            'password' => 'required'

        ]);


//        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
//            // 该用户存在于数据库，且邮箱和密码相符合
//        }

        //$request->has('remember'); 记住我


        if(Auth::attempt($credentials,$request->has('remember'))){
            session()->flash('success', '欢迎回来！');
            return redirect()->route('users.show', [Auth::user()]);

        }else{
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }

    }

    function  destroy(){
        Auth::logout();
        session()->flash('success','登出成功');
        return redirect('login');



    }

}
