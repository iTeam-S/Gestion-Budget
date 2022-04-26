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


<body>
    <div id="app">
        @yield("wave")

        @yield("navbar")
        {{--
        @if((Route::currentRouteName() != 'login') || (Route::currentRouteName() != 'journal.index.detail'))
            @include('includes.navbar')
        @endif
        --}}

        @yield("journals")

        <main class="mt-5">
            @yield('content')
            {{-- Si un composant livewire se rend dans cette fichier --}}
            @php
                if(isset($slot)):
                    echo $slot;
                endif;
            @endphp

        </main>
    </div>

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

function lightboxing(id){

    var identif= "#lightbox-"+id; // exemple #lightbox-1

    if($(identif).length > 0){
        $(identif).show();
        $(lightbox).fadeOut();

    }
    else{
        var lightbox =
            '<div id="lightbox-'+id+'" onclick="hideo('+id+')">' +
                '<button class="btn btn-danger mx-2">editer</button>' +
                '<button class="btn btn-success mx-2">details</button>' +
            '</div>';
        $('#'+id).css("position", "relative");

        $("#"+id).append(lightbox);
        $(lightbox).fadeOut();
    }
}

function hideo(id){
    $("body").on("click", "#lightbox-"+id, function(){
        $("#lightbox-"+id).fadeOut();
    })
}

$(function() {
  function slideMenu() {
    var activeState = $("#menu-container .menu-list").hasClass("active");
    $("#menu-container .menu-list").animate({left: activeState ? "0%" : "-100%"}, 400);
  }
  $("#menu-wrapper").click(function(event) {
    event.stopPropagation();
    $("#hamburger-menu").toggleClass("open");
    $("#menu-container .menu-list").toggleClass("active");
    slideMenu();

    $("body").toggleClass("overflow-hidden");
  });

  $(".menu-list").find(".accordion-toggle").click(function() {
    $(this).next().toggleClass("open").slideToggle("fast");
    $(this).toggleClass("active-tab").find(".menu-link").toggleClass("active");

    $(".menu-list .accordion-content").not($(this).next()).slideUp("fast").removeClass("open");
    $(".menu-list .accordion-toggle").not(jQuery(this)).removeClass("active-tab").find(".menu-link").removeClass("active");
  });
}); // jQuery load

</script>


    @yield("script")
</body>
</html>
