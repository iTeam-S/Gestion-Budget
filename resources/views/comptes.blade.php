
@extends('layouts.user_type.auth')

@section('content')
<section style="margin-left:25px;">
<a class="nav-link {{ (Request::is('comptes') ? 'active' : '') }}" href="{{ url('comptes') }}" style="color:#008080; font-size:25px; font-weight:bolder;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                    </svg>
                    <span class="nav-link-text ms-1">Comptes</span>
                </a>
                {{-- liste comptes --}}
    <div>
    <h1 style="text-align: center;font-weight:bolder;color:black; font-size:23px;">**Créer un compte**</h1>
        <hr>
        @include("components.formulaire.compte")
    </div>


@endsection

</section>

   
