@extends('layouts.user_type.guest')

@section('content')

    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="grid grid-cols-2">
                        <div class="relative">
                            <div class="title absolute bottom-0 right-0" >
                                <p class="text-8xl">Gestion<br/> Budget</p>
                            </div>
                        </div>

                        <div class="flex justify-end mt-3.5" style="margin-right: 200px; margin-top:100px;">
                            <div class="flex border-2 rounded-md" style="border-color:#008080; width:300px; align-items: center ; border-radius:20px; display: flex;justify-content: center; padding: 30px;" >
                                <form role="form" method="POST" id="login-auth" class="p-2" action="/session" autocomplete="new-password">
                                    @csrf
                                    <label>Identifiant</label>
                                    <div class="mb-3">
                                        <input type="text" class="border-2 h-14 rounded-md" name="username" id="username" placeholder="prenom usuel"/>
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
                                    </div> <br>
                                    <div style="text-align:center;">
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

    const loginForm= document.getElementById("login-auth");

    function authenticate(username, password, rememberMe){


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
                    isRegistered(user, password, rememberMe);
                })
                .fail(function(){
                    result= {"exception": "is not a member"}

                })
                .always(function () {
                    $('.loader').addClass('hidden')
                })
        })(jQuery)

        return result
    }


    function isRegistered(user, password, rememberMe){
        let hostname= window.location.hostname;
        let port= window.location.port;
        let url="http://"+hostname+":"+port+"/api/users/"+user.id;


        (function($){

                var xhr= $.ajax({
                    url: url
                })
                    .done(function(userInDB){

                        userInDB.exception == "not registered yet" ?addUser(user): login(userInDB, password, rememberMe);
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


    function login(user, password, rememberMe){
        let hostname= window.location.hostname;
        let port= window.location.port;
        let url= "http://"+hostname+":"+port+"/session";

        (function($){

            console.log(rememberMe);
            var xhr= $.ajax({
                url: url,
                data: {"_token": "{{ csrf_token() }}", email: user.email, password: password, remember: rememberMe},
                method: "POST"
            }).done(function(page){


                window.location.replace("/dashboard");
                window.history.pushState({}, "", "/dashboard");
            }).fail(function(xhr, status){
                console.log("authentication "+status);
            }

            )

        })(jQuery)

    }


    loginForm.addEventListener("submit", (event)=> {

        if(!event.preventDefault()) {


            let username= event.target.username.value
            let password= event.target.password.value


            /*si l'utilisateur a coché sur se souvenir de moi alors la variable
            rememberMe est à true, sinon c'est à false */

            let rememberMeElement= document.getElementById("remember");
            let rememberMe= rememberMeElement.checked ? true: false;

            var guest= authenticate(username, password, rememberMe);

            // annule la submittion
            return false;
        }

    })
</script>
@endsection
