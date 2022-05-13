@extends('layouts.user_type.auth')

@section('content')

    <div class="grid grid-cols-4">
        {{--
        @foreach($journals as $journal)

            <a href="{{ route("journals.details", ["id"=> $journal->id]) }}">
                <div>Nom: {{ $journal->name }}</div>
                <div>Total: {{ $journal->total }}</div>
            </a>
        @endforeach
    </div>--}}

    <div>
        <h1>Creer un journal</h1>
        @include("components.formulaire.journal")
    </div>


@endsection

