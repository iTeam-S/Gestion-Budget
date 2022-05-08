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
                                <form role="form" method="POST" id="login-auth" class="p-2" action="/session">
                                    @csrf
                                    <label>Identifiant</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control border-2 h-14 rounded-md" name="username" id="username" placeholder="prenom usuel">
                                        @error('username')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <label>Mot de passe</label>
                                    <div class="mb-3">
                                        <input type="password" class="form-control border-2 h-14 rounded-md" name="password" id="password" placeholder="secret" aria-label="Password" aria-describedby="password-addon">
                                        @error('password')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex flex-row">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                        <label class="form-check-label pl-px" for="rememberMe">Se souvenir de moi</label>
                                    </div>
                                    <div class="">
                                        <button type="submit" id="login-btn-submit" class="btn rounded">Se connecter</button>
                                    </div>
                                </form>
                            </div>
                            <div class="loader hidden">
                                <img class="loader__image" src="{{ asset("storage/loader.gif") }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection


@section("script")
<script>
    // gestion formulaire

    const loginForm= document.getElementById("login-auth");

    function authenticate(username, password){


        let url= "https://api.iteam-s.mg/api/membre/get/"+ username;
        var result= {};

        (function($){
                var xhr= $.ajax({
                    url: url,
                    beforeSend: function(){
                        $('.loader').removeClass('hidden')
                    }
                })
                .done(function(user){
                    isRegistered(user, password);
                })
                .fail(function(){
                    result= {
                        "exception": "is not a member"
                    }

                })
                .always(function () {
                    $('.loader').addClass('hidden')
                })
        })(jQuery)

        return result
    }


    function isRegistered(user, password){
        let hostname= window.location.hostname;
        let port= window.location.port;
        let url="http://"+hostname+":"+port+"/api/users/"+user.id;


        (function($){

                var xhr= $.ajax({
                    url: url
                })
                    .done(function(userInDB){

                        userInDB.exception == "not registered yet" ?addUser(user): login(userInDB, password);
                    })
                    .fail(function(){
                        return objet= {
                            "exception": "request problem"
                        }
                    })
            }
        )(jQuery)
    }


    function addUser(user){
        let hostname= window.location.hostname;
        let port= window.location.port;
        let url= "http://"+hostname+":"+port+"/api/users";
        (function($){

            var xhr= $.ajax({
                url: url,
                method: "POST",
                data: {"_token": "{{ csrf_token() }}", user: user}
            }).done(function(userInDB){

                login(userInDB.name);

            }).fail(function(jqXHR, textStatus){

                console.log("non enregistrer");

            })
        }

        )(jQuery)
    }


    function login(user, password){
        let hostname= window.location.hostname;
        let port= window.location.port;
        let url= "http://"+hostname+":"+port+"/session";

        (function($){

            var xhr= $.ajax({
                url: url,
                data: {"_token": "{{ csrf_token() }}", email: user.email, password: password},
                method: "POST"
            }).done(function(page){

                // redirection
                window.location.replace("/dashboard");
                window.history.pushState({}, "", "/dashboard");
            }).fail(function(xhr, status){
                console.log(status);
            }

            )

        })(jQuery)

    }


    loginForm.addEventListener("submit", (event)=> {

        if(!event.preventDefault()) {
            // loader start

            let username= event.target.username.value
            let password= event.target.password.value


            var guest= authenticate(username, password);

            // annule la submittion
            return false;
        }

    })
</script>
@endsection
