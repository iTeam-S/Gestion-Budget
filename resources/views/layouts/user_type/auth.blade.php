@extends('layouts.app')

@section('auth')

    <div class="flex">
        @include('layouts.navbars.auth.sidebar')
        <div class="flex-auto w-80">
            @include('layouts.navbars.auth.nav')
            <div class="mt-4">
                @yield('content')
            </div>
        </div>
        @include("layouts.footers.auth.footer")
    </div>

@endsection
