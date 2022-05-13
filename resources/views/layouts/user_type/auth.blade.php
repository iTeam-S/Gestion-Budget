@extends('layouts.app')

@section('auth')

    <div class="flex">
        @include('layouts.navbars.auth.sidebar')

        <div class="flex-auto w-80">
            @include('layouts.navbars.auth.nav')
            <div class="bg-gray-100 main-content max-height-vh-100 h-100">
                @yield('content')
            </div>
        </div>
    </div>

@endsection
