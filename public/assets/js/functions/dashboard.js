/**
 * renvoie le statistique du compta actuel
 */
 function get_stat(){

    let promise= null;
    const url= "http://localhost:8000/api/dashboard";
    const token= sessionStorage.getItem("_token");

    const init= {
        method: "GET",
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
            "Authorization": "Bearer "+token
        }
    }

    console.log(token);


    promise= fetch(url, init).then(function(promise){ return promise.json()});

    promise.then(function(statistique){

        document.getElementById("capital").innerHTML= statistique.capital;
        document.getElementById("nombre_ecriture").innerHTML= statistique.nombre_ecriture;
        document.getElementById("nombre_journal").innerHTML= statistique.nombre_journal;
    })
    .catch(function(error){

        console.log(error);
    });

}

window.onload = function(){

    let promise= null;
    const url= "http://localhost:8000/dashboard";
    const token= sessionStorage.getItem("_token");

    const init= {
        method: "GET",
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
            "Authorization": "Bearer "+token
        }
    }

    promise= fetch(url, init).then(function(promise){ return promise.text();});

    promise.then(function(response){

        document.body.innerHTML= response;
    });


};

