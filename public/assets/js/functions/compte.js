

function render_account(compte){

    const element=""+
        "<div id='compte-"+compte.id+"' class='flex flex-column my-4 border h-56 w-71 mx-4 p-2 rounded'>"+
            "<div>"+compte.nom+"</div>"+
            "<div>"+compte.description+"</div>"+
            "<div>"+compte.code+"</div>"+
            "<div class='flex flex-row justify-end last-of-type:mt-auto'>"+
                "<button type='button' class='transition duration-150 ease-in-out' data-bs-toggle='modal' data-bs-target='#modal-edit-compte-"+compte.id+"'>"+
                    "<svg xmlns='http://www.w3.org/2000/svg' style='width: 1rem; height: 1rem' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' />"+
                    "</svg>"+
                "</button>"+
                '<button class="transition duration-150 ease-in-out" data-bs-toggle="modal" data-bs-target="#modal-remove-compte-'+compte.id+'">'+
                    "<svg xmlns='http://www.w3.org/2000/svg' style='width: 1rem; height: 1rem' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'/>"+
                    "</svg>"+
                "</button>"+
            "</div>"+
        "</div>"+

        '<div class="modal hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modal-edit-compte-'+compte.id+'" tabindex="-1" aria-labelledby="suppr-compte '+compte.nom.toLowerCase()+'" aria-modal="true" role="dialog">'+
            '<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">'+
                '<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">'+
                    '<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">'+
                        '<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">compte '+compte.nom.toLowerCase()+'</h5>'+
                        '<button type="button"'+
                            'class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"'+
                            'data-bs-dismiss="modal" aria-label="Close">'+
                        '</button>'+
                    '</div>'+
                    '<div class="modal-body relative p-4">'+
                        '<form id="modify-account" onsubmit="return update_account('+compte.id+')">'+
                            '<div class="mx-2">'+
                                '<label>Créer un compte</label>'+
                                '<input type="text" class="border rounded-sm" name="nom" id="nom" placeholder="nom"/>'+
                            '</div>'+

                            '<div class="mx-2">'+
                                '<input type="text" class="border rounded-sm" name="description" id="description" placeholder="description"/>'+
                            '</div>'+

                            '<div class="mx-2">'+
                                '<input type="text" class="border rounded-sm" name="code" id="code" placeholder="code"/>'+
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

        '<div class="modal hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modal-remove-compte-'+compte.id+'" tabindex="-1" aria-labelledby="suppr-compte '+compte.nom.toLowerCase()+'" aria-modal="true" role="dialog">'+
            '<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">'+
                '<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">'+
                    '<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">'+
                        '<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">compte '+compte.nom.toLowerCase()+'</h5>'+
                        '<button type="button"'+
                            'class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"'+
                            'data-bs-dismiss="modal" aria-label="Close">'+
                        '</button>'+
                    '</div>'+
                    '<div class="modal-body relative p-4">'+
                        '<p>Voulez-vous vraiment supprimer ce compte ?</p>'+
                    '</div>'+
                    '<div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">'+
                        '<button type="button" class="btn rounded-sm transition duration-150 ease-in-out" onclick="remove_account('+compte.id+')" data-bs-dismiss="modal">'+
                            'supprimer'+
                        '</button>'+
                        '<button type="button" class="btn rounded-sm transition-duration-150 ease-in-out" data-bs-dismiss="modal">'+
                            'annuler'+
                        '</button>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'

    document.getElementById("list-account").innerHTML+= element;
}

function render_adding_account(){
    const element= ''+
    "<div class='flex flex-column justify-center items-center my-4 border h-56 w-71 mx-4 p-2 rounded'>"+
        "<button class='btn' data-bs-toggle='modal' data-bs-target='#modal-remove-compte'>ajouter un compte</button>"+
    "</div>"+
    '<div class="modal hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modal-create-compte" tabindex="-1" aria-labelledby="create-compte '+compte.nom.toLowerCase()+'" aria-modal="true" role="dialog">'+
            '<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">'+
                '<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">'+
                    '<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">'+
                        '<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">compte</h5>'+
                        '<button type="button"'+
                            'class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"'+
                            'data-bs-dismiss="modal" aria-label="Close">'+
                        '</button>'+
                    '</div>'+
                    '<div class="modal-body relative p-4">'+
                        '<form id="modal-create-account" onsubmit="return store_by_modal()">'+
                            '<div class="mx-2">'+
                                '<label>Créer un compte</label>'+
                                '<input type="text" class="border rounded-sm" name="nom" id="nom" placeholder="nouveau nom"/>'+
                            '</div>'+

                            '<div class="mx-2">'+
                                '<input type="text" class="border rounded-sm" name="description" id="description" placeholder="nouveau description"/>'+
                            '</div>'+

                            '<div class="mx-2">'+
                                '<input type="text" class="border rounded-sm" name="description" id="code" placeholder="nouveau code"/>'+
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
        '</div>';

    document.getElementById("list-account").innerHTML+= element;
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

        if(data.length !== 0){
        for(compte of data){

            render_account(compte);
        }
    }

    if(data.length < 6){

        render_adding_account();
    }

    })
    .catch(function(error){

        console.log(error);
    });
}

const store_by_modal= ()=> {


    console.log("ajouté");

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

function render_updating_accounts(compte){

    document.getElementById("compte-"+compte.id).remove();

    render_account(compte);
}

const update_account = (id) => {
    modify_account= document.getElementById("modify-account");
    const token= sessionStorage.getItem("_token");
    let body= new URLSearchParams();
    let promise= null;

    const nom= modify_account.elements.new_nom_compte.value;
    const description= modify_account.elements.new_description_compte.value;
    const code= modify_account.elements.new_code_compte.value;


    const url= "http://localhost:8000/api/compte/update/"+id;

    console.log(nom);
    console.log(description);
    console.log(code);
    if(nom !=""){body.append("nom", nom);}
    if(description != ""){body.append("description", description);}
    if(code != ""){body.append("code", code);}

    console.log(body);


    const init= {
        method: "PUT",
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
            "Authorization": "Bearer "+token
        },
        body: body
    }

    promise= fetch(url, init).then(function(promise){return promise.json()});

    promise.then(function(compte){

        render_updating_accounts(compte);
    })
    .catch(function(error){

        console.log(error);
    });


    return false;
};

function remove_account(id){

    let promise= null;
    const url= "http://localhost:8000/api/compte/remove/"+id;
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

        document.getElementById("compte-"+id).remove();
    })
    .catch(function(errror){

        console.log(error);

    });
}


document.addEventListener("DOMContentLoaded", function(event){

    let promise= null;
    const url= "http://localhost:8000/comptes";
    const token= sessionStorage.getItem("_token");

    if(!token){window.location.href= "http://localhost:8000/login"}else{console.log(token)};

    const init= {
        method: "GET",
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
            "Authorization": "Bearer "+token
        }
    }

    promise= fetch(url, init).then(function(promise){ return promise.text();});

    promise.then(function(response){

        console.log(response);
        document.body.innerHTML= response;
    })
    .catch(function(error){

        console.log(error);
    });


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
