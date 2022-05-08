@extends('layouts.app')

@section('auth')


        @if (\Request::is('comptes'))
            @include('layouts.navbars.auth.sidebar')
            <div class="bg-gray-100 main-content max-height-vh-100 h-100">
                @include('layouts.navbars.auth.nav')
                @yield('content')
            </div>

        @elseif (\Request::is('ecritures'))
            @include('layouts.navbars.auth.nav')
                @include('layouts.navbars.auth.sidebar')
                <main class="mt-1 main-content border-radius-lg">
                    @yield('content')
                    @include('layouts.footers.auth.footer')
                </main>

        @else
            @include('layouts.navbars.auth.sidebar')
            <main class="main-content max-height-vh-100 h-100 mt-1 border-radius-lg }}">
                @include('layouts.navbars.auth.nav')
                <div class="py-4 container-fluid">
                    @yield('content')
                    @yield("script")
                </div>
            </main>
            @include('layouts.footers.auth.footer')

        @endif
@endsection
