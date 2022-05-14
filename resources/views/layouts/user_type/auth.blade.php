@extends('layouts.app')

@section('auth')
    <div class="main">
        <div class="flex flex-row">
            @include('layouts.navbars.auth.sidebar')
            <div class="flex-auto w-80">
                @include('layouts.navbars.auth.nav')
                <div class="mt-4 overflow-x-hidden overflow-y-auto">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include("layouts.footers.auth.footer")


@endsection
