<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="//fonts.gstatic.com"                            rel="dns-prefetch">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}"                     rel="stylesheet">
    @livewireStyles
    @yield("style")
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>iTeam-$ | Gestion budget</title>
</head>


<body id="globalBody" style="margin: 0;">
    <div id="globalPage" class="trans">
        <nav>
            <button id="btn-notification" class="trans"><i class="fa fa-bell"></i><span id="span-count-notif" class="trans"></span></button>
        </nav>
        <div id="notification-container" class="d-none">
            <div class="position-relative">
                <div class="w-100 d-flex justify-content-end">
                    <button id="close-volet" class="trans">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 20px; height:20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            <div>Il n'y a rien ici.</div>
        </div>
    </div>
        <main class="d-none">
            <button id="btn-add-notification" class="trans ombre"></button>
        </main>


    <div id="app">
        @yield("wave")

        @yield("navbar")
        {{--
        @if((Route::currentRouteName() != 'login') || (Route::currentRouteName() != 'journal.index.detail'))
            @include('includes.navbar')
        @endif
        --}}



        <main class="mt-5">
            @yield('content')
        </main>
    </div>
</div>

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield("script")

<script>

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

        function hideNotifContainer() {

        }

        dom_closevolet.onclick= function(){

            console.log("console.log");
            removeClass(dom_body, 'notif-opened');
            removeClass(dom_containernotif, 'notif-opened');
            addClass(dom_containernotif, 'd-none');
        }

        dom_button.onclick = function() {
            showNotifContainer();
        }





</script>
</body>
</html>
