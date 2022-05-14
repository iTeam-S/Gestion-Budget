
function to_dashboard(){
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

    promise= fetch(url, init).then(function(promise){ return promise.text()});

    promise.then(function(html){

        window.location.href= "http://localhost:8000/dashboard/";
    })
    .catch(function(error){

        console.log(error);
    })
}

function authenticate(prenom_usuel, password){

    let promise= null;
    let body= new URLSearchParams();
    body.append("prenom_usuel", prenom_usuel);
    body.append("password", password);
    const url= "http://localhost:8000/api/auth/login";

    const init= {
        method: "POST",
        headers: {
            "Content-type": "application/x-www-form-urlencoded"
        },
        body: body
    }


    promise= fetch(url, init).then(function(promise){ return promise.json()});

    promise.then(function(response){

        sessionStorage.setItem("_token", response.access_token);
        to_dashboard();

    })
    .catch(function(error){

        console.log(error);
    });

}

const loginForm= document.getElementById("login-auth");

loginForm.addEventListener("submit", (event)=> {

    if(!event.preventDefault()) {


        let prenom_usuel= event.target.prenom_usuel.value.toString().trim();
        let password= event.target.password.value.toString().trim();

        authenticate(prenom_usuel, password);

        // annule la submittion
        return false;
    }

})

