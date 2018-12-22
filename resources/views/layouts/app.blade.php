<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('css/app.css')}}">
    <script async src="{{URL::asset('js/app.js')}}"></script>
    <script async src="{{URL::asset('js/script.js')}}"></script>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">Brand</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">Заказы</a></li>
                <li><a href="{{ route('products') }}">Товары</a></li>
                <li><a href="{{ route('temp') }}">Температура воздуха в Брянске</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>
</body>
</html>