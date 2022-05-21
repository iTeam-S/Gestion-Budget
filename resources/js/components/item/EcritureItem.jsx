import {useState, useRef} from "react";
import Chevron from "../Chevron";

function EcritureItem({title, content}){
  
    const [active, setActive] = useState("");
    const [height, setHeight] = useState("0px");
    const [rotate, setRotate] = useState("accordion__icon");
    
    const contenu = useRef(null);
    
    const toggleAccordion = () => {

        setActive(active === "" ? "active": "");
        setHeight(active === "active" ? "0px": `${contenu.current.scrollHeight}px`);
        setRotate(active === "active" ? "accordion__icon": "accordion__icon rotate");
      
        console.log(contenu.current.scrollHeight);
    }
    
    return(
        <div className="accordion__section flex flex-column">
            <button className= {`accordion ${active} border-b border-teal cursor-pointer 
            p-[18px] flex items-center outline-none transition-[background-color] 
            duration-[600ms] ease-in-out`} onClick={toggleAccordion}>
                <p className="accordion__title font-semibold text-sm">{title}</p>
                <Chevron className={`${rotate}`} width={10} height={10} fill="#777" />
            </button>
    
            <div ref={contenu} style={{maxHeight: `${height}`}} className="accordion__content bg-white overflow-hidden transition-[max-height] duration-[600ms] ease-in-out">
                <div className="accordion__text font-normal text-sm p-[18px]" dangerouslySetInnerHTML={{ __html: content}} />
            </div>
        </div>
    )
  }

export default EcritureItem