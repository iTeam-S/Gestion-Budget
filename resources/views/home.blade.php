@extends('layouts.app')


@section("navbar")
    @include("includes.navbar")
@endsection


@section('content')



<p>TABLEAU DE BORD</p>


<div class="border border-dark rounded p-2 m-2">
    <p>CAPITAL</p>
    <p>{{ number_format($capital, 2, ",", " ") }} Ariary</p>
</div>

<div class="m-5 search__container">
    <div class="search position-relative">
        <div class="container">
            <input type="text" placeholder="ecriture">
            <div class="search"></div>
        </div>
    </div>
</div>

<h1>JOURNALS</h1>
<div id="listeJournals" class="my-5"></div>

<h1>ECRITURE</h1>
<div id="writing-view" class="my-5"></div>
@endsection

@section("script")
<script>

    $(document).on("click", "#9",function(event){
        event.preventDefault();

        $.get("http://localhost:8000/journal/9", function(data){

        $("#app").html(data)
        window.history.pushState({}, '' , "/journal/9")
        })
    });


    $.get("http://localhost:8000/journals", function(data){

        $("#listeJournals").html(data);
    })

    $.get("http://localhost:8000/writings", function(data){

        $("#writing-view").html(data);
    })


    $(document).ready(function(){
        $(document).on("click", "#detail-8", function(){

            // avoir la page details
            $.get("http://localhost:8000/journal/detail/8", function(data){

                $(".writings.writings--r").html(data);
                window.history.pushState({}, '' , "/journal/detail/8")

            })
        })
    });

</script>
 @endsection
