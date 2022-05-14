@extends('layouts.user_type.guest')

@section('content')

    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="grid grid-cols-2">
                        <div class="relative">
                            <div class="title absolute bottom-0 right-0">
                                <p class="text-8xl">Gestion<br/> Budget</p>
                            </div>
                        </div>

                        <div class="flex justify-end mt-3.5">
                            <div class="flex border-2 rounded-md">
                                <form role="form" method="POST" id="login-auth" class="p-2" action="/session" autocomplete="new-password">
                                    @csrf
                                    <label>Identifiant</label>
                                    <div class="mb-3">
                                        <input type="text" class="border-2 h-14 rounded-md" name="prenom_usuel" id="prenom_usuel" placeholder="prenom usuel"/>
                                        @error('username')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <label>Mot de passe</label>
                                    <div class="mb-3">
                                        <input type="password" class="border-2 h-14 rounded-md" name="password" id="password" />
                                        @error('password')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex flex-row">
                                        <input class="border-2" type="checkbox" id="remember" value="remember" name="remember">
                                        <label class="pl-2" for="remember">Se souvenir</label>
                                    </div>
                                    <div>
                                        <button type="submit" id="login-btn-submit" class="btn rounded">Se connecter</button>
                                    </div>
                                </form>
                            </div>
                            <div class="flex items-center">
                                <div class="loader hidden">
                                    <img class="loader__image" src="{{ asset("storage/loader.gif") }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection


@section("script")
    <script type="text/javascript"src="{{ url(asset("assets/js/functions/login.js")) }}"></script>
<script>
    // gestion formulaire

    // desactiver l'autocompletion des precedents input information
    jQuery(document).ready(function() {
        jQuery('input').each( function() {

                jQuery(this).attr('readonly', 'true').attr('onClick', "this.removeAttribute('readonly');");

                jQuery(this).on('mouseleave', function() {
                    jQuery(this).attr('readonly', 'true')
                });
        });
});

</script>
@endsection
