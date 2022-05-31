import EcritureList from "./List"
import DragAndDrop from "../../components/DragAndDrop"

function Ecriture(){

    return(
        <div className="lg:flex md:flex-row m-6">
            <div className="lg:flex-auto">
                <EcritureList/>
            </div>
            <div className="lg:flex-none ml-4">
                <div className="flex border shadow-md rounded">
                    <form className="p-2">
                        <label>Montant</label>
                        <div className="mb-3">
                            <input type="number" className="border h-10 rounded" placeholder="montant en Ariary"/>
                        </div>

                        <label>Type</label>
                        <div className="mb-3">
                            <input type="text" placeholder="type" className="border rounded h-10" />
                        </div>

                        <div>
                            <DragAndDrop/>
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

export default Ecriture