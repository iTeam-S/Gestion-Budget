<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="//fonts.gstatic.com"                            rel="dns-prefetch">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}"                     rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>iTeam-$ | Gestion budget</title>
</head>


<body id="globalBody" class="m-0">
    <div id="page">
        <div class="ocean">
            <div class="wave"></div>
            <div class="wave"></div>
        </div>

        <div class="login">
            <form id="form">
                @csrf
                <input type="text" name="email" id="user" placeholder="iteams username or email" required="required" />
                <input type="password" name="password" id="password" placeholder="mot de passe" required="required" />
                <button type="submit" class="btn btn-primary btn-block btn-large">se connecter</button>
            </form>
        </div>
    </div>
    <script>
        /*

            var global_test_notif = 'Global test notif';
            var dom_body = document.querySelector('#globalBody');
            var dom_button = document.querySelector('#btn-notification');
            var dom_spanotif = document.querySelector('#span-count-notif');
            var dom_containernotif = document.querySelector('#notification-container');
            var dom_addnotif = document.querySelector('#btn-add-notification');
            var dom_closevolet = document.querySelector('#close-volet');


            function addClass(paramCible, paramClass){

                paramCible.classList.add(paramClass);
            }

            function removeClass(paramCible, paramClass){
                paramCible.classList.remove(paramClass);
            }

            function hasClass(paramCible, paramClass){
                return paramCible.classList.contains(paramClass);
            }

            function showNotifContainer() {
                addClass(dom_body, 'notif-opened');
                addClass(dom_containernotif, "notif-opened");
                removeClass(dom_containernotif, 'd-none');
            }


            dom_closevolet.onclick= function(){

                console.log("console.log");
                removeClass(dom_body, 'notif-opened');
                removeClass(dom_containernotif, 'notif-opened');
                addClass(dom_containernotif, 'd-none');
            }

            dom_button.onclick = function() {
                showNotifContainer();
            }*/

    </script>
</body>
</html>
