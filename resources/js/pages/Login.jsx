import React, { useState, useEffect } from "react"
import { useNavigate } from "react-router-dom"
import Anime from 'react-anime';

const Login = ({ token, setToken }) => {
    const redirect = useNavigate();

    // se redireger vers le dashboard si l'utilisateur est déjà authentifié
    useEffect(() => {

        if(token != ""){
            redirect("/dashboard");
        }
    }, []);


    const [prenomUsuel, setPrenomUsuel] = useState("");
    const [password, setPassword] = useState("");

    const handleSubmit = (event) => {
        event.preventDefault();
        authenticate()
    }

    const authenticate = () => {

        const body = new URLSearchParams();
        body.append("prenom_usuel", prenomUsuel);
        body.append("password", password);
        const url = "http://localhost:8000/api/auth/login";

        const init = {
            method: "POST",
            headers: {
                "Content-type": "application/x-www-form-urlencoded"
            },
            body: body
        }

        const promise = fetch(url, init)
            .then(function (promise) {
                return promise.json();
            });

        promise.then(function (response) {
            sessionStorage.setItem("_token", response.access_token);
            redirect("/dashboard");

        })
            .catch(function (error) {

                console.log(error);
            });

        setToken(sessionStorage.getItem("_token"));


    }

    return (
        <>
            <Anime
                easing='easeOutElastic(1, .4)'
                loop={true}
                duration={1000}
                translateY='1rem'>
                <div className="relative">
                    <div className="title">
                        <p className="text-8xl">Gestion Budget</p>
                    </div>
                </div>
            </Anime>
            <div className="flex justify-end mt-3.5">
                <div className="flex border shadow-md rounded mr-8">
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
                </div>
            </div>
        </>
    )
}


export default Login;
