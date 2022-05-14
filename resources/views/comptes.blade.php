
@extends('layouts.user_type.auth')

@section('content')
    <div>
        <h1>Créer un nouveau compte</h1>
        <div class="mb-2" style="border-bottom: 1px solid #dee2e6">
            <form action="POST" id="create-account">
                <div class="grid grid-cols-4">
                    <div class="mx-2">
                        <input type="text" class="border rounded-sm" name="nom" id="nom_compte" placeholder="nom"/>
                    </div>

                    <div class="mx-2">
                        <input type="text" class="border rounded-sm" name="description" id="description_compte" placeholder="description"/>
                    </div>
                    <div class="mx-2">
                        <input type="text" class="border rounded-sm" name="description" id="code_compte" placeholder="code"/>
                    </div>

                    <div class="mx-2">
                        <button type="submit" class="btn-secondary border w-32 rounded-sm hover:bg-teal hover:text-white">ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="list-account" class="grid grid-cols-4"></div>
@endsection

@section("script")
    <script scr="{{ url(asset("assets/js/functions/compte.js")) }}"></script>
@endsection
