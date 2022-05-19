import { useNavigate } from "react-router-dom";
import { useState } from "react";

const Compte = ({token}) => {

    /* gestion jwt */
        const navigate = useNavigate();
        if(token == "") navigate("/login");
    /**********************************/


    const [nom, setNom] = useState("");
    const [code, setCode] = useState("");
    const [description, setDescription] = useState("");

    const storeCompte = () => {

        const url= "http://localhost:8000/api/compte/store";

        const body= new URLSearchParams();
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

        const promise= fetch(url, init).then(function(promise){ return promise});

        promise.then(function(response){

            // render account
            console.log(response);
            alert("store account success");

        })
        .catch(function(error){

            console.log(error);
        });

    }


    const handleSubmit = (event) => {

        event.preventDefault();

        storeCompte();

        //Réinitialisation des state
        setNom("");
        setCode("");
        setDescription("");
    }






    return(
        <div className="flex flex-row m-6">
            <div className="flex-auto border">
                <CompteList/>
            </div>
            <div className="flex-none ml-4 w-[300px] border rounded justify-center">
                <form onSubmit={handleSubmit}>
                    <div>
                        <label htmlFor="nom">Nom</label><br/>
                        <input type="text" id="nom" className="border h-10 rounded" value={nom} placeholder="..." onChange={(event) => setNom(event.target.value)}/>
                    </div>

                    <div>
                        <label htmlFor="code">code</label><br/>
                        <input type="text" id="code" className="border h-10 rounded" value={code} placeholder="..." onChange={(event) => setCode(event.target.value)}/>
                    </div>

                    <div>
                        <label htmlFor="desc">Description</label><br/>
                        <input type="text" id="desc" className="border h-10 rounded" value={description} placeholder="..." onChange={(event) => setDescription(event.target.value)}/>
                    </div>

                    <button className="btn" type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    )
}


export default Compte;
