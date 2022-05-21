import EcritureList from "../components/list/EcritureList"

function Ecriture(){

    return(
        <div className="lg:flex md:flex-row m-6">
            <div className="lg:flex-auto">
                <EcritureList/>
            </div>
            <div className="lg:flex-none ml-4">
                
            </div>
        </div>
    )
}

export default Ecriture