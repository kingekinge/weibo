@extends('layout.base')

@section('title','登录')

@section('content')

    <div class="offset-md-2 col-md-8">
        <div class="card ">
            <div class="card-header">
                <h5>登录</h5>
            </div>
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


                    @foreach(['danger', 'warning', 'success', 'info'] as $msg)
                        @if(session()->has($msg))
                            <div class="alert alert-{{$msg}}" role="alert">
                                {{session()->get($msg)}}
                            </div>
                        @endif
                    @endforeach


                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">登录</button>
                </form>

                <hr>

                <p>还没账号？<a href="{{ route('signup') }}">现在注册！</a></p>
            </div>
        </div>
    </div>

@stop
