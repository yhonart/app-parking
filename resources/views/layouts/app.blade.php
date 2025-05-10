<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jawa 9&10 Gate Pass</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css?v=3.2.0')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/wxyzStyle.css')}}">

    <link rel="stylesheet" href="{{asset('public/plugins/alertifyjs/css/alertify.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/alertifyjs/css/themes/bootstrap.min.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/8.2.1/adapter.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script src="{{ asset('public/plugins/jquery.min.js') }}" type="text/javascript"></script>
    
    <script src="{{ asset('public/plugins/alertifyjs/alertify.min.js') }}" type="text/javascript"></script>    
    <!-- Scripts -->
    
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="#" class="navbar-brand">                    
                    <span class="brand-text font-weight-light">Gate Pass</span>
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Add Master Data</a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </nav>
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
</body>
</html>
