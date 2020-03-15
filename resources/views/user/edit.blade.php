@extends('layout.base')
@section('title', '更新个人资料')

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


    <div class="offset-md-2 col-md-8">
        <div class="card ">
            <div class="card-header">
                <h5>更新个人资料</h5>
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


                <div class="gravatar_edit">
                    <a href="http://gravatar.com/emails" target="_blank">
                        <img  class="gravatar" src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}"/>
                    </a>
                </div>

                <form method="POST" action="{{ route('users.update', $user->id )}}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">名称：</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">确认密码：</label>
                        <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">更新</button>
                </form>
            </div>
        </div>
    </div>
@stop
