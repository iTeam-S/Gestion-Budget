@extends('layouts.app')

@section("wave")
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
@endsection


@section('content')
<div class="login">
    <form id="form">
    	<input type="text" name="u" id="user" placeholder="iteams username" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">se connecter</button>
    </form>
</div>
@endsection

@section("script")
<script>
    $(document).on('submit', '#form', function(event){
        event.preventDefault();

        user= $("#user").val()

    // verify if from community
        $.get( "https://api.iteam-s.mg/api/membre/get/"+user, function( data ) {

            function redirect(parent, uri){
                $.get("http://localhost:8000/"+uri, function(data){

                    $(parent).html(data)
                    window.history.pushState({}, '' , "/"+uri)
                })
            }
         // redirection dashboard
            redirect("#app", "home");
        });
    });
</script>
@endsection
