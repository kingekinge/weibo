<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Auth;

class UserController extends Controller
{

    /**
     * UserController constructor. 除了指定的路由，其他的都要登录
     */
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store']
        ]);


        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }



    function index(){
            //每个分页10条数据，参数加上？page=1
            $users=User::paginate(1);
            return view('user.index',compact('users'));
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

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        //注册后自动登录
        Auth::login($user);

        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');

        return redirect()->route('users.show',[$user]);

    }

    function edit(User $user) {
        return view('user.edit', compact('user'));
    }


    function update(User $user,Request $request){

        $this->authorize('update',$user);

        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'password' => 'nullable| confirmed|min:6'
        ]);


        $arr=array();

        $arr['name']=$request->name;
        if(!is_null($request->password)){
            $arr['password']=bcrypt($request->password);
        }

        $update = $user->update($arr);

        if($update){
            session()->flash('success','更新资料成功');
            return redirect()->route('users.show',$user);
        }

        session()->flash('danger','更新资料失败');



    }





}
