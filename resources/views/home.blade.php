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


<div class="border border-dark rounded m-2 p-2">
    <p>JOURNALS</p>
    <div>
        @forelse($journals as $journal)
            <a class="p-1" id={{ $journal->id }} href="#">
                {{ $journal->name }}
            </a>
        @empty

            <p>Aucun Journal</p>
        @endforelse
    </div>
</div>

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
</script>
 @endsection
