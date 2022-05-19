import { useNavigate } from "react-router-dom";
import { useEffect, useState } from "react";
import CompteList from "../components/CompteList";


/* gestion jwt */



/**********************************/
const Compte = ({token}) => {

    const redirect = useNavigate();

    useEffect(() => {
        if(token == null){
            redirect("/login");
        }

    }, []);



    const [nom, setNom] = useState("");
    const [code, setCode] = useState("");
    const [description, setDescription] = useState("");

    console.log(token);

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



        const promise= fetch(url, init).then(function(promise){ return promise.json()});

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
        <div className="lg:flex md:flex-row m-6">
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
                            <input type="password" placeholder="code" value={code} className="border rounded h-10" onChange={(event) => setCode(event.target.value)} />
                        </div>

                        <label>Description</label>
                        <div className="mb-3">
                            <input type="password" placeholder="description" value={description} className="border rounded h-10" onChange={(event) => setDescription(event.target.value)} />
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
