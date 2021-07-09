<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partials.head')

    @auth

    <body class="">

        @php
            $segment_1 = Request::segment(1);
            $segment_2 = Request::segment(2);
        @endphp

        <div id="wrapper">

            @include('partials.nav')

            <div id="page-wrapper" class="gray-bg">

                @include('partials.nav-head')

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-xs-8">
                        <ol class="breadcrumb" style="margin-top:20px;">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            @if (isset($segment_1))
                            <li class="{{$segment_2??'active'}}">
                                <a href="{{ \Route::has($segment_1.'.index')?route($segment_1.'.index'):'#' }}">{{title_case(str_replace('-', ' ', $segment_1))}}</a>
                            </li>
                            @endif
                            @if (isset($segment_2))
                                <li class="active">
                                    <strong>{{title_case(str_replace('-', ' ', $segment_2))}}</strong>
                                </li>
                            @endif
                        </ol>
                    </div>
                    <div class="col-xs-4 visible-lg-block visible-md-block visible-sm-block" style="margin-top:20px;">

                        <h4 class="pull-right">{{now()->format('D dS F Y')}} </h4>
                    </div>
                </div>

                {{-- Content --}}
                @yield('content')

                @if (isset($slot))
                    {{ $slot }}
                @endif

                @include('partials.footer')

            </div>

            @include('partials.right-sidebar')

        </div>

        {{-- Javascript --}}
        @include('partials.javascript')

        {{-- Toastr js --}}
        @toastr_js
        @toastr_render

        <script>
            $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

        @yield('js')

    </body>


    @endauth

    @guest
    <body class="gray-bg">

        <div class="middle-box gray-bg loginscreen animated fadeInDown">
            <div class="mt-5" id="app">
                <div class="text-center">
                    <img src="{{ asset('img/landing/logo.svg') }}" width="200">
                </div>
                <h3 class="text-center">Welcome to {{ config('app.name') }}</h3>
                <p class="text-center">{{ config('app.description') }}</p>

                @yield('content')
            </div>
        </div>



        <!-- Mainly scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <script>
            $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

        @yield('js')

        {{-- Toastr js --}}
        @toastr_js
        @toastr_render

    </body>
    @endguest

</html>

