@extends('layouts.app')

@section('content')

    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

<div class="login">
    <form id="form" method="POST" action="{{ route('login') }}">
        @csrf
    	<input type="email" name="email" id="user" placeholder="iteams username" required="required" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus/>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <button type="submit" class="btn btn-primary btn-block btn-large">se connecter</button>
    </form>
</div>
@endsection
