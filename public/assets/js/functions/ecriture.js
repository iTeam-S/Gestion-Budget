
    function render_ecriture(ecriture){

        const type_ecriture= ecriture.type? "entrant": "sortant";
        const etat_ecriture= ecriture.etat? "validé": "indexé";
        const element=""+
            "<div id='ecriture-"+ecriture.id+"' class='flex flex-column my-4 border h-56 w-71 mx-4 p-2 rounded'>"+
                "<div>"+ecriture.montant+"</div>"+
                "<div>"+ecriture.motif+"</div>"+
                "<div>"+ecriture.piece_jointe+"</div>"+
                "<div>"+ecriture.compte_id+"</div>"+
                "<div>"+ecriture.journal_id+"</div>"+
                "<div>"+type_ecriture+"</div>"+
                "<div>"+etat_ecriture+"</div>"+
                "<div class='flex flex-row justify-end last-of-type:mt-auto'>"+
                    "<button type='button' class='transition duration-150 ease-in-out' data-bs-toggle='modal' data-bs-target='#modal-edit-ecriture-"+ecriture.id+"'>"+
                        "<svg xmlns='http://www.w3.org/2000/svg' style='width: 1rem; height: 1rem' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                            "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' />"+
                        "</svg>"+
                    "</button>"+
                    '<button class="transition duration-150 ease-in-out" data-bs-toggle="modal" data-bs-target="#modal-remove-ecriture-'+ecriture.id+'">'+
                        "<svg xmlns='http://www.w3.org/2000/svg' style='width: 1rem; height: 1rem' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                            "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'/>"+
                        "</svg>"+
                    "</button>"+
                "</div>"+
            "</div>"+

            '<div class="modal hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modal-edit-ecriture-'+ecriture.id+'" tabindex="-1" aria-labelledby="suppr-ecriture '+ecriture.id+'" aria-modal="true" role="dialog">'+
                '<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">'+
                    '<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">'+
                        '<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">'+
                            '<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">ecriture '+ecriture.id+'</h5>'+
                            '<button type="button"'+
                                'class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"'+
                                'data-bs-dismiss="modal" aria-label="Close">'+
                            '</button>'+
                        '</div>'+
                        '<div class="modal-body relative p-4">'+
                            '<form id="modify-ecriture" onsubmit="return update_ecriture('+ecriture.id+')">'+
                                '<div class="mx-2">'+
                                    '<label>Renommer</label>'+
                                    '<input type="text" disabled class="border rounded-sm" name="nom" value="'+ecriture.id+'"/>'+
                                    '<input type="text" class="border rounded-sm" name="nom" id="new_nom_ecriture" placeholder="nouveau nom"/>'+
                                '</div>'+

                                '<div class="mx-2">'+
                                    '<input type="text" disabled class="border rounded-sm" name="description" value="'+ecriture.motif+'"/>'+
                                    '<input type="text" class="border rounded-sm" name="description" id="new_description_ecriture" placeholder="nouveau description"/>'+
                                '</div>'+

                                '<div class="mx-2">'+
                                    '<input type="text" disabled class="border rounded-sm" name="description" value="'+ecriture.piece_jointe+'"/>'+
                                    '<input type="text" class="border rounded-sm" name="description" id="new_code_ecriture" placeholder="nouveau code"/>'+
                                '</div>'+

                                '<div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">'+
                                    '<button type="submit" class="btn rounded-sm transition duration-150 ease-in-out" data-bs-dismiss="modal">'+
                                        'valider'+
                                    '</button>'+
                                    '<button type="button" class="btn rounded-sm transition-duration-150 ease-in-out" data-bs-dismiss="modal">'+
                                        'annuler'+
                                    '</button>'+
                                '</div>'+
                            '</form>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+

            '<div class="modal hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modal-remove-ecriture-'+ecriture.id+'" tabindex="-1" aria-labelledby="suppr-ecriture '+ecriture.id+'" aria-modal="true" role="dialog">'+
                '<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">'+
                    '<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">'+
                        '<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">'+
                            '<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">ecriture '+ecriture.id+'</h5>'+
                            '<button type="button"'+
                                'class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"'+
                                'data-bs-dismiss="modal" aria-label="Close">'+
                            '</button>'+
                        '</div>'+
                        '<div class="modal-body relative p-4">'+
                            '<p>Voulez-vous vraiment supprimer ce ecriture ?</p>'+
                        '</div>'+
                        '<div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">'+
                            '<button type="button" class="btn rounded-sm transition duration-150 ease-in-out" onclick="remove_ecriture('+ecriture.id+')" data-bs-dismiss="modal">'+
                                'supprimer'+
                            '</button>'+
                            '<button type="button" class="btn rounded-sm transition-duration-150 ease-in-out" data-bs-dismiss="modal">'+
                                'annuler'+
                            '</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'

        document.getElementById("list-ecritures").innerHTML+= element;
    }

    function render_adding_ecriture(){
        const element= ''+
        "<div class='flex flex-column justify-center items-center my-4 border h-56 w-71 mx-4 p-2 rounded'>"+
            "<button class=\"btn\">ajouter une ecriture</button>"+
        "</div>";

        document.getElementById("list-ecritures").innerHTML+= element;
    }


    function get_ecritures(){
        let promise= null;
        const url= "http://localhost:8000/api/ecriture";
        const token= sessionStorage.getItem("_token");

        const init={
            method: "GET",
            headers: {
                "Content-type": "application/x-www-form-urlencoded",
                "Authorization": "Bearer "+token
            }
        }

        promise= fetch(url, init).then(function(promise){ return promise.json()});

        promise.then(function(data){

            if(data.length !== 0){
                for(ecriture of data){

                    render_ecriture(ecriture);
                }
            }

            if(data.length < 6){

                render_adding_ecriture();
            }
        })
        .catch(function(error){

            console.log(error);
        });
    }

    function store_ecriture(nom, description, code){

        let promise= null;
        const url= "http://localhost:8000/api/ecriture/store";
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

            render_ecriture(response.ecriture);

        })
        .catch(function(error){

            console.log(error);
        });


    }

    function render_updating_ecritures(ecriture){

        document.getElementById("ecriture-"+ecriture.id).remove();

        render_ecriture(ecriture);
    }

    const update_ecriture = (id) => {
        modify_ecriture= document.getElementById("modify-ecriture");
        const token= sessionStorage.getItem("_token");
        let body= new URLSearchParams();
        let promise= null;

        const nom= modify_ecriture.elements.new_nom_ecriture.value;
        const description= modify_ecriture.elements.new_description_ecriture.value;
        const code= modify_ecriture.elements.new_code_ecriture.value;


        const url= "http://localhost:8000/api/ecriture/update/"+id;

        console.log(nom);
        console.log(description);
        console.log(code);
        if(nom !=""){body.append("nom", nom);}
        if(description != ""){body.append("description", description);}
        if(code != ""){body.append("code", code);}

        if(Object.keys(body).length === 0){return {"erreur": "formulaire vide"}}

        const init= {
            method: "PUT",
            headers: {
                "Content-type": "application/x-www-form-urlencoded",
                "Authorization": "Bearer "+token
            },
            body: body
        }

        promise= fetch(url, init).then(function(promise){return promise.json()});

        promise.then(function(ecriture){

            render_updating_ecritures(ecriture);
        })
        .catch(function(error){

            console.log(error);
        });


        return false;
    };

    function remove_ecriture(id){

        let promise= null;
        const url= "http://localhost:8000/api/ecriture/remove/"+id;
        const token= sessionStorage.getItem("_token");

        const init= {
            method: "DELETE",
            headers: {
                "Content-type": "application/x-www-form-urlencoded",
                "Authorization": "Bearer "+token
            }
        }

        promise= fetch(url, init).then(function(promise){ return promise.json()});

        promise.then(function(response){

            document.getElementById("ecriture-"+id).remove();
        })
        .catch(function(errror){

            console.log(error);

        });
    }

    document.addEventListener("DOMContentLoaded", function(event) {

        get_stat();
    });
