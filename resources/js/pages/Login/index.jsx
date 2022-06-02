import React, { useEffect, useContext } from "react"
import { Link, useNavigate } from "react-router-dom"
import Anime from 'react-anime';
import { TokenContext } from "../../utils/context";
import Form from "./Form";
import Presentations, { reveal } from "./Presentations";
import styled from "styled-components";

const Login = () => {

    const redirect = useNavigate();
    const { _token, setToken } = useContext(TokenContext);

    // se redireger vers le dashboard si l'utilisateur est déjà authentifié
    useEffect(() => {
        // si le token est expirée
        if(_token !== null) redirect("/dashboard")

        // configurer l'animation des items on scroll
        window.addEventListener("scroll", reveal);

        }, []);

    const SocialNetwork = styled(Link)`
    background-color: red;
    `;

    return (
        <>
            <div className="h-screen w-screen overflow-hidden grid items-center relative before:content['*']
            before:absolute
            before:bg-[url('http://localhost:8000/storage/images/login-background-up.svg')] 
            before:bg-[length:100vw]
            before:opacity-50
            before:top-0
            before:left-0
            before:w-screen
            before:h-screen
            before:z-0">
                <div className="flex flex-row opacity-100 z-10">
                    <div className="flex-auto">
                        <Anime
                            easing='linear'
                            loop={true}
                            duration={2000}
                            translateY="3rem"
                            direction="alternate">
                                <div className="title font-['Anton']">
                                    <p className="text-8xl text-center">Gestion Budget</p>
                                </div>
                        </Anime>
                        <div class="w-[500px] m-auto" style={{transform: "translateY(150px)"}}>
                            <h1 className="mx-4">iTeam-$ Community</h1>
                        <SocialNetwork to="#">facebook</SocialNetwork>
                        <SocialNetwork to="#">linkedin</SocialNetwork>
                        <SocialNetwork to="#">github</SocialNetwork>

                        </div>
                    </div>

                    <div className="flex-none justify-end mx-2 md:mx-4">
                        <div className="flex border shadow-md rounded mr-8">
                            <Form setToken={setToken}/>
                        </div>
                    </div>
                </div>
            </div>

            <div className="w-screen relative before:content['*']
            before:absolute
            before:bg-[url('http://localhost:8000/storage/images/login-background-down.svg')] 
            before:bg-[length:100vw]
            before:opacity-50
            before:top-0
            before:left-0
            before:w-screen
            before:h-screen
            before:z-0">
                {
                    <Presentations/>
                }
            </div>
            
        </>
    )
}


export default Login;
