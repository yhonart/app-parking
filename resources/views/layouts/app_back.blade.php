<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css?v=3.2.0')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/wzyzStyle.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="{{ asset('js/html5-qrcode.min.js') }}" type="text/javascript"></script>

    <!-- Scripts -->
    <script data-cfasync="false" nonce="eb864f95-d73a-4f2d-8ff3-3589f837debc">try{(function(w,d){!function(bz,bA,bB,bC){if(bz.zaraz)console.error("zaraz is loaded twice");else{bz[bB]=bz[bB]||{};bz[bB].executed=[];bz.zaraz={deferred:[],listeners:[]};bz.zaraz._v="5853";bz.zaraz._n="eb864f95-d73a-4f2d-8ff3-3589f837debc";bz.zaraz.q=[];bz.zaraz._f=function(bD){return async function(){var bE=Array.prototype.slice.call(arguments);bz.zaraz.q.push({m:bD,a:bE})}};for(const bF of["track","set","debug"])bz.zaraz[bF]=bz.zaraz._f(bF);bz.zaraz.init=()=>{var bG=bA.getElementsByTagName(bC)[0],bH=bA.createElement(bC),bI=bA.getElementsByTagName("title")[0];bI&&(bz[bB].t=bA.getElementsByTagName("title")[0].text);bz[bB].x=Math.random();bz[bB].w=bz.screen.width;bz[bB].h=bz.screen.height;bz[bB].j=bz.innerHeight;bz[bB].e=bz.innerWidth;bz[bB].l=bz.location.href;bz[bB].r=bA.referrer;bz[bB].k=bz.screen.colorDepth;bz[bB].n=bA.characterSet;bz[bB].o=(new Date).getTimezoneOffset();if(bz.dataLayer)for(const bJ of Object.entries(Object.entries(dataLayer).reduce(((bK,bL)=>({...bK[1],...bL[1]})),{})))zaraz.set(bJ[0],bJ[1],{scope:"page"});bz[bB].q=[];for(;bz.zaraz.q.length;){const bM=bz.zaraz.q.shift();bz[bB].q.push(bM)}bH.defer=!0;for(const bN of[localStorage,sessionStorage])Object.keys(bN||{}).filter((bP=>bP.startsWith("_zaraz_"))).forEach((bO=>{try{bz[bB]["z_"+bO.slice(7)]=JSON.parse(bN.getItem(bO))}catch{bz[bB]["z_"+bO.slice(7)]=bN.getItem(bO)}}));bH.referrerPolicy="origin";bH.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bz[bB])));bG.parentNode.insertBefore(bH,bG)};["complete","interactive"].includes(bA.readyState)?zaraz.init():bz.addEventListener("DOMContentLoaded",zaraz.init)}}(w,d,"zarazData","script");window.zaraz._p=async dq=>new Promise((dr=>{if(dq){dq.e&&dq.e.forEach((ds=>{try{const dt=d.querySelector("script[nonce]"),du=dt?.nonce||dt?.getAttribute("nonce"),dv=d.createElement("script");du&&(dv.nonce=du);dv.innerHTML=ds;dv.onload=()=>{d.head.removeChild(dv)};d.head.appendChild(dv)}catch(dw){console.error(`Error executing script: ${ds}\n`,dw)}}));Promise.allSettled((dq.f||[]).map((dx=>fetch(dx[0],dx[1]))))}dr()}));zaraz._p({"e":["(function(w,d){})(window,document)"]});})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
