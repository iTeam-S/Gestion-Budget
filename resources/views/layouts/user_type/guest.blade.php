@extends('layouts.app')

@section('guest')
    @if(\Request::is('login/forgot-password'))
        @yield('content')
    @else
        @yield('content')
    @endif
@endsection
