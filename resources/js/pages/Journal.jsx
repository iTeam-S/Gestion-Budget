import { useNavigate } from "react-router-dom";
import { useEffect, useState } from "react";
import JournalList from "../components/list/JournalList";


/* gestion jwt */



/**********************************/
const Journal = () => {

    const [nom, setNom] = useState("");

    const storeJournal = () => {

        const token = localStorage.getItem("_token");
        const url = "http://localhost:8000/api/journal/store";

        const body = new URLSearchParams();
        body.append("nom", nom);

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

        })
        .catch(function(error){

            console.log(error);
        });

    }


    const handleSubmit = (event) => {

        event.preventDefault();

        storeJournal();
    }


    return(
        <div className="lg:flex md:flex-row m-6">
            <div className="lg:flex-auto">
                <JournalList/>
            </div>
            <div className="lg:flex-none ml-4">
                <div className="flex border shadow-md rounded">
                    <form className="p-2"  onSubmit={handleSubmit}>
                        <label>Nom</label>
                        <div className="mb-3">
                            <input type="text" id="nom" className="border h-10 rounded" value={nom} placeholder="nom" onChange={(event) => setNom(event.target.value)}/>
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


export default Journal;
