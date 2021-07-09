<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="api-token" content="{{ auth()->user()->api_token??null }}">
    <meta name="api-base-url" content="{{ url('api') }}" /> --}}

    <title>{{ config('app.name') . (Request::segment(1)? ' | '.Request::segment(1) : '') }}</title>

    @toastr_css

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">


    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">


    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @livewireStyles

    @yield('css')

    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>

</head>
