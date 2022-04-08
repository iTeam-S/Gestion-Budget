<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/login') }}">
            Gestion budget
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- partie navbar gauche --}}
            <ul class="navbar-nav me-auto"></ul>

            {{-- partie navbar droite --}}
            <ul class="navbar-nav ms-auto">

                @auth
                    <li class="nav-item"><a href="#" class="nav-link">Journals</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Statistique</a></li>

                    {{-- le système de notification est propre aux admin et lead --}}
                    @if(Auth::user()->group->name != "utilisateur")

                        <li class="nav-item"><a href="#" class="nav-link">Notifications</a></li>
                    @endif

                    {{-- dropdown responsive --}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre>

                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf {{-- obligatoire --}}
                            </form>

                        </div>
                    </li>
                    {{-- fin dropdown responsive --}}
                @endauth
            </ul>
        </div>
    </div>
</nav>
