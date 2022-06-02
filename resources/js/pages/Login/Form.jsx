import { useState } from "react";
import { useNavigate } from "react-router-dom"

function Form({setToken}){

    const redirect = useNavigate();
    const [ prenomUsuel, setPrenomUsuel ] = useState(new String());
    const [ password, setPassword ] = useState(new String());

    const handleSubmit = (event) => {
        event.preventDefault();
        authenticate();
    }

    const authenticate = () => {

        var body = new URLSearchParams();
        body.append("prenom_usuel", prenomUsuel);
        body.append("password", password);

        const init = {
            method: "POST",
            headers: {"Content-type": "application/x-www-form-urlencoded"},
            body: body
        }

        fetch("http://localhost:8000/api/auth/login", init)
            .then((promise) => promise.json())
            .then(function (response) {

                // si l'authentification est réussie, stocker le token dans un variable contexte et se rediriger vers dashboard
                setToken(response.access_token);
                redirect("/dashboard");
            })
            .catch(function (error) {console.log(error);});
    }

    return(
        <form role="form" className="p-2" autoComplete="new-password" onSubmit={handleSubmit}>
            <label>Identifiant</label>
            <div className="mb-3">
                <input type="text" className="border rounded h-10" placeholder="prenom usuel" onChange={(event) => setPrenomUsuel(event.target.value)} />
            </div>

            <label>Mot de passe</label>
            <div className="mb-3">
                <input type="password" placeholder="secrete" className="border rounded h-10" onChange={(event) => setPassword(event.target.value)} />
            </div>

            <div>
                <button type="submit" id="login-btn-submit" className="rounded btn">Se connecter</button>
            </div>
        </form>
    )
}

export default Form;