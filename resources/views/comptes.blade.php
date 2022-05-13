
@extends('layouts.user_type.auth')

@section('content')


    <div id="create-account">
        <form>
            <div class="grid grid-cols-4">
                <div class="mx-2">
                    <input type="text" class="border rounded-sm" name="nom" id="compte_nom" placeholder="nom"/>
                </div>

                <div class="mx-2">
                    <input type="text" class="border rounded-sm" name="description" id="compte_description" placeholder="description"/>
                </div>
                <div class="mx-2">
                    <input type="text" class="border rounded-sm" name="description" id="compte_code" placeholder="code"/>
                </div>

                <div class="mx-2">
                    <button type="submit" class="btn-secondary border w-32 rounded-sm hover:bg-teal hover:text-white">ajouter</button>
                </div>
            </div>
        </form>
    </div>

    <div id="list-account" class="grid grid-cols-4"></div>
@endsection

@section("script")

    <script>

        function get_accounts(){
            let promise= null;
            const url= "http://localhost:8000/api/accounts";
            const token= sessionStorage.getItem("_token");

            const init= {
                method: "GET",
                headers: {
                    "Content-type": "application/x-www-form-urlencoded",
                    "Authorization": "Bearer "+token
                }
            }

            promise= fetch(url, init).then(function(promise){ return promise.json()});

            promise.then(function(data){

                console.log(data);
            })
            .catch(function(error){

                console.log(error);
            })
        }

        document.addEventListener("DOMContentLoaded", function(event){

            console.log("mande");
            get_accounts();
        });
    </script>
@endsection

