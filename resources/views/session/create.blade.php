@extends('layout.base')

@section('title','登录')

@section('content')

    @foreach(['danger', 'warning', 'success', 'info'] as $msg)
        @if(session()->has($msg))
            <div class="alert alert-{{$msg}} alert-dismissible fade show" role="alert">
                {{session()->get($msg)}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endforeach



    <div class="offset-md-3 col-md-6">
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

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">记住我</label>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">登录</button>
                </form>

                <hr>

                <p>还没账号？<a href="{{ route('users.create') }}">现在注册！</a></p>
            </div>
        </div>
    </div>

@stop
