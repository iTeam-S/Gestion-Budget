@extends('layouts.user_type.auth')

@section('content')

    <div class="kanban">
{{--}}
            @foreach($unreadNotifications as $notification)
                @if(Auth::user()->group()->get(["name"])[0]->name == "administrateur")
                    @include("components.notification", ["group"=> "administrateur", "notification"=> $notification])
                @elseif(Auth::user()->group()->get(["name"])[0]->name == "lead")

                    @include("components.notification", ["group"=> "lead", "notification"=> $notification])
                @endif
            @endforeach--}}
    </div>


  @endsection
