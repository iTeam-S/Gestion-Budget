
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

    {{-- test data toggle --}}

@endsection

@section("script")
    <script>

        // fonction veut_modifier affiche une lightbox avec les informations à modifier

        // fonction veut_supprimer afficher un moda qui verifie la suppression oui ou non


        function render_account(compte){

            const element=""+
                "<div class='flex flex-column my-4 border h-56 w-71 mx-4 p-2 rounded'>"+
                    "<div>"+compte.nom+"</div>"+
                    "<div>"+compte.description+"</div>"+
                    "<div>"+compte.code+"</div>"+
                    "<div class='flex flex-row justify-end last-of-type:mt-auto'>"+
                        "<button type='button'>"+
                            "<svg xmlns='http://www.w3.org/2000/svg' style='width: 1rem; height: 1rem' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' />"+
                            "</svg>"+
                        "</button>"+
                        '<button transition duration-150 ease-in-out" data-bs-toggle="modal" data-bs-target="#compte-'+compte.id+'">'+
                            "<svg xmlns='http://www.w3.org/2000/svg' style='width: 1rem; height: 1rem' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'/>"+
                            "</svg>"+
                        "</button>"+
                    "</div>"+
                "</div>"+

                '<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="compte-'+compte.id+'" tabindex="-1" aria-labelledby="COmpte e" aria-modal="true" role="dialog">'+
                    '<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">'+
                        '<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">'+
                            '<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">'+
                                '<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">'+compte.nom+
                                '</h5>'+
                                '<button type="button"'+
                                    'class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"'+
                                    'data-bs-dismiss="modal" aria-label="Close"></button>'+
                                '</div>'+
                                '<div class="modal-body relative p-4">'+
                                    '<p>Voulez-vous vraiment supprimer ce compte ?</p>'+
                                '</div>'+
                                '<div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">'+
                                '<button type="button" class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-dismiss="modal">'+
                                    'supprimer'+
                                '</button>'+
                                '<button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">'+
                                    'annuler'+
                                '</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'






            document.getElementById("list-account").innerHTML+= element;

            console.log(compte);
        }

        function get_accounts(){
            let promise= null;
            const url= "http://localhost:8000/api/compte";
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

                for(compte of data){
                    render_account(compte);
                }

            })
            .catch(function(error){

                console.log(error);
            });
        }

        function store_account(nom, description, code){

            let promise= null;
            const url= "http://localhost:8000/api/compte/store";
            const token= sessionStorage.getItem("_token");

            let body= new URLSearchParams();
            body.append("nom", nom);
            body.append("description", description);
            body.append("code", code)

            const init= {
                method: "POST",
                headers: {
                    "Content-type": "application/x-www-form-urlencoded",
                    "Authorization": "Bearer "+token
                },
                body: body
            }

            promise= fetch(url, init).then(function(promise){ return promise.json()});

            promise.then(function(response){

                render_account(response.compte);

            })
            .catch(function(error){

                console.log(error);
            });


        }


        document.addEventListener("DOMContentLoaded", function(event) {

            get_accounts();


            create_account= document.getElementById("create-account");

            create_account.addEventListener("submit", (event)=> {

                if(!event.preventDefault()) {

                    const nom_compte= event.target.nom_compte.value.toString().trim();
                    const description_compte= event.target.description_compte.value.toString().trim();
                    const code_compte= event.target.code_compte.value;

                    store_account(nom_compte, description_compte, code_compte);
                    // annule la submittion

                    return false;
                }
            })
        });


    </script>
