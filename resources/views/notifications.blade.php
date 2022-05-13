@extends('layouts.user_type.auth')

@section('content')
<section>
<a class="nav-link {{ (Request::is('notifications') ? 'active' : '') }}" href="{{ url('notifications') }}" style="color:#008080; font-size:25px; font-weight:bolder;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="nav-link-text ms-1">Notifications</span>
                </a>
                <div class="kanban">

@foreach($unreadNotifications as $notification)
    @if(Auth::user()->group()->get(["name"])[0]->name == "administrateur")
        @include("components.notification", ["group"=> "administrateur", "notification"=> $notification])
    @elseif(Auth::user()->group()->get(["name"])[0]->name == "lead")

        @include("components.notification", ["group"=> "lead", "notification"=> $notification])
    @endif
@endforeach
</div>


@endsection

</section>

    