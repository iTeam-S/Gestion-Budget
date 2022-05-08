
@extends('layouts.user_type.auth')

@section('content')

    {{-- liste comptes --}}
    <div>
        <h1>Creer un compte</h1>
        @include("components.formulaire.compte")
    </div>


@endsection

