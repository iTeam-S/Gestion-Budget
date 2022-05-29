import { useNavigate } from "react-router-dom";
import { useEffect, useState } from "react";
import CompteList from "../components/list/CompteList";


/* gestion jwt */



/**********************************/
const Compte = () => {

    const [nom, setNom] = useState("");
    const [code, setCode] = useState("");
    const [description, setDescription] = useState("");

    const storeCompte = () => {

        const token = localStorage.getItem("_token");
        const url = "http://localhost:8000/api/compte/store";

        const body = new URLSearchParams();
        body.append("nom", nom);
        body.append("description", description);
        body.append("code", code)

        const init= {
            method: "POST",
            headers: {
                "Content-type": "application/x-www-form-urlencoded",
                "Authorization": "Bearer "+ token
            },
            body: body
        }

        alert(token);


        const promise= fetch(url, init).then(function(promise){ return promise.json()});

        promise.then(function(response){

            alert(response);
            alert("store account success");
            //Réinitialisation des state

            setNom("");
            setCode("");
            setDescription("");

        })
        .catch(function(error){

            console.log(error);
        });

    }


    const handleSubmit = (event) => {

        event.preventDefault();

        storeCompte();
    }


    return(
        <div className="border-2 lg:flex md:flex-row m-6">
            <div className="lg:flex-auto">
                <CompteList/>
            </div>
            <div className="lg:flex-none ml-4">
                <div className="flex border shadow-md rounded">
                    <form className="p-2"  onSubmit={handleSubmit}>
                        <label>Nom</label>
                        <div className="mb-3">
                            <input type="text" id="nom" className="border h-10 rounded" value={nom} placeholder="nom" onChange={(event) => setNom(event.target.value)}/>
                        </div>

                        <label>Code</label>
                        <div className="mb-3">
                            <input type="number" placeholder="code" value={code} className="border rounded h-10" onChange={(event) => setCode(event.target.value)} />
                        </div>

                        <label>Description</label>
                        <div className="mb-3">
                            <input type="text" placeholder="description" value={description} className="border rounded h-10" onChange={(event) => setDescription(event.target.value)} />
                        </div>

                        <div>
                            <button type="submit" id="login-btn-submit" className="rounded btn">ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    )
}


export default Compte;
