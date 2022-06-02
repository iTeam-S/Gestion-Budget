import { description } from "./data";
import Anime from "react-anime";

/**
 * permet de faire une animation de montée fondu d'un element
 */
export const reveal = () => {
    let reveal = document.querySelectorAll(".reveal");

    // pour tous les elements ayant la classe reveal
    for(let i = 0; i < reveal.length; i++){
        let windowHeight = window.innerHeight;
        let distanceFromTop = reveal[i].getBoundingClientRect().top;
        let intervalVisible = 100;

        /* le propriété classList d'un DOMElement renvoie une chaine de caractere qui est la nom de tous les classes de 
        l'element separés les uns des autres par des espaces, en fait mi-renvoie instance de type Set izy en gros */
        distanceFromTop < windowHeight - intervalVisible ? (
            reveal[i].classList.add("active")
        ):(
            reveal[i].classList.remove("active")
        );
    }
}

function Presentations(){
    return(
        <>
            {
                description.map(({order, title, subtitle, picture, pictureAlt}) => (
                    <div key={order} className="h-[50vh] reveal grid items-center justify-center">
                        <div className="grid grid-cols-2">
                            <div className="text-center w-[200px] h-[200px]">
                                <img src={picture} alt={pictureAlt} className="w-full m-auto"/>
                            </div>
                            <div>
                                <h1 className="font-['Anton'] text-4xl my-2">{title}</h1>
                                <p className="pl-4">{subtitle}</p>
                            </div>
                        </div>
                    </div>
                ))
            }
        </>
    )
}

export default Presentations;