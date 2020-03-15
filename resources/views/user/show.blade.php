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
                            <div class="alert alert-{{$msg}}" role="alert">
                                {{session()->get($msg)}}
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
