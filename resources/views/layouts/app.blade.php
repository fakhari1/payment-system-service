<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @vite(['resources/js/app.js', 'resources/sass/app.scss'])

    @yield('head')

</head>
<body>
<div id="app">
    @include('partials.navbar')


    <main class="py-4 text-center">
        @if(session('mustVerifyEmail'))
            <div class="alert alert-danger text-center text-lg w-auto d-inline-block mx-auto py-2 px-3"
                 style="font-size: 18px;">
                <a href="{{ route('user.email.verify') }}" onclick="event.preventDefault(); document.getElementById('verify-email-form').submit();">
                    {{ __('messages.verifyEmail') }}
                </a>
                <form action="{{ route('user.email.verify') }}" method="post">
                    @csrf
                </form>
            </div>
        @endif

        @yield('content')
    </main>
</div>
</body>
</html>
