import React, {useState} from "react"
import { useNavigate } from "react-router-dom"


const Login = ({token, setToken}) => {
    const navigate = useNavigate();
    if(token != "") navigate("/dashboard");
    console.log(token);

    const [prenomUsuel, setPrenomUsuel] = useState("");
    const [password, setPassword] = useState("");



    const handleSubmit = (event) => {
        event.preventDefault();
        authenticate()
    }

    const authenticate = () => {

        const body= new URLSearchParams();
        body.append("prenom_usuel", prenomUsuel);
        body.append("password", password);
        const url = "http://localhost:8000/api/auth/login";

        const init= {
            method: "POST",
            headers: {
                "Content-type": "application/x-www-form-urlencoded"
            },
            body: body
        }

        const promise= fetch(url, init)
            .then(function(promise){
                return promise.json();
            });

        promise.then(function(response){
            sessionStorage.setItem("_token", response.access_token);
            setToken(sessionStorage.getItem("_token"));
            navigate("/dashboard");

        })
        .catch(function(error){

            console.log(error);
        });

    }

    return (
        <div className="flex justify-end mt-3.5">
            <div className="flex border-2 rounded-md">
                <form role="form" className="p-2" autoComplete="new-password" onSubmit={handleSubmit}>
                    <label>Identifiant</label>
                    <div className="mb-3">
                        <input type="text" className="border-2 h-14 rounded-md" placeholder="prenom usuel" onChange={(event) => setPrenomUsuel(event.target.value)}/>
                    </div>

                    <label>Mot de passe</label>
                    <div className="mb-3">
                        <input type="password" className="border-2 h-14 rounded-md" onChange={(event) => setPassword(event.target.value)}/>
                    </div>

                    <div className="flex flex-row">
                        <input className="border-2" type="checkbox" id="remember" value="remember" name="remember" />
                        <label className="pl-2" htmlFor="remember">Se souvenir</label>
                    </div>

                    <div>
                        <button type="submit" id="login-btn-submit" className="btn rounded">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    )
}


export default Login;
