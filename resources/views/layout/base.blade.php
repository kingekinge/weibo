<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
    {{--    两个参数，如果第一个为空第二个是默认参数--}}
    <title>@yield('title','WeiBo') </title>

    <link rel="stylesheet" href="{{mix('css/app.css')}}">

</head>
<body>

    @include('layout._header')


    <div class="container mt-4">
        @yield('content')

        @include('layout._footer')
    </div>





    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
