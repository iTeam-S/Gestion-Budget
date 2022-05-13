@extends('layouts.user_type.auth')

@section('content')

    <div class="grid grid-cols-4">
    <div>
        <h1>Creer un journal</h1>
        @include("components.formulaire.journal")
    </div>


@endsection

