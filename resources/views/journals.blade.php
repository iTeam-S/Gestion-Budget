@extends('layouts.user_type.auth')

@section('content')
<section>
<a class="nav-link {{ (Request::is('journals') ? 'active' : '') }}" href="{{ url('journals') }}" style="color:#008080; font-size:25px; font-weight:bolder;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="nav-link-text ms-1">Journals</span>
                </a>
    <div class="grid grid-cols-4">
        @foreach($journals as $journal)

            <a href="{{ route("journals.details", ["id"=> $journal->id]) }}">
                <div>Nom: {{ $journal->name }}</div>
                <div>Total: {{ $journal->total }}</div>
            </a>
        @endforeach
    </div>

    <div>
    <h1 style=" text-align: center;font-weight:bolder; color:black; font-size:23px;">**Créer un journal**</h1>
        <hr>
        @include("components.formulaire.journal")
    </div>


@endsection
</section>
