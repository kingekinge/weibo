@extends('layout.base')

@section('title','注册')

@section('content')

    <div class="container col-xl-5 col-sm-9 col-9">
        <div class="card">
            <h5 class="card-header">注册</h5>
            <div class="card-body">


                @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>
                                {{$error}}
                        </li>
                        @endforeach
                    </ul>
                    </div>
                @endif





        {{--  Laravel 提供了全局辅助函数 old 来帮助我们在 Blade 模板中显示旧输入数据。
        这样当我们信息填写错误，页面进行重定向访问时，输入框将自动填写上最后一次输入过的数据。 --}}

                <form  method="post" action="{{route('users.store')}}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">名称</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" >
                    </div>
                    <div class="form-group">
                        <label for="email">邮箱</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="password">密码</label>
                        <input type="password" class="form-control"  name="password" value="{{old('password')}}">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">确认密码</label>
                        <input type="password" class="form-control" name="password_confirmation"   value="{{old('password_confirmation')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">注册</button>
                </form>

            </div>
        </div>
    </div>


@stop
