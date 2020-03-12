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


    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Weibo App</a>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item"><a class="nav-link" href="/help">帮助</a></li>
                <li class="nav-item"><a class="nav-link" href="#">登录</a></li>
            </ul>
        </div>
    </nav>


    <div class="container mt-4">
        @yield('content')
    </div>


</body>
</html>
