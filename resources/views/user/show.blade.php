@extends('layout.base')

@section('title',$user->name)


@section('content')

    <div class="row">
        <div class="offset-md-2 col-md-8">
            <div class="col-md-12">
                <div class="offset-md-2 col-md-8">
                    <section class="user_info">
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
                        @include('user._user_info', ['user' => $user])
                    </section>
                </div>
            </div>
        </div>
    </div>



@stop
