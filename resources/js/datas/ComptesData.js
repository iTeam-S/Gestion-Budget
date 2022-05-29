
const getCompteData = () => {

    var allCompte = [];

    const url= "http://localhost:8000/api/compte";
    const token= sessionStorage.getItem("_token");

    const init= {
        method: "GET",
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
            "Authorization": "Bearer "+ token
        }
    }

    const promise= fetch(url, init).then(function(promise){ return promise.json()});

    promise.then(function(data){

        data.map((compte) => (<div>a</div>))

    })
    .catch(function(error){

        console.log(error);
    });

}



export default getCompteData
