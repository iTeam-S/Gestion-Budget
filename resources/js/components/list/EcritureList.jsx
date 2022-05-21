import EcritureItem from "../item/EcritureItem"
import AddItem from "../item/AddItem"

function EcritureList(){

    return(
        <div>
        <EcritureItem title="titre 1" content="content 1"/>
        <EcritureItem title="titre 2" content="content 2"/>
        <AddItem/>
        </div>
    )
}

export default EcritureList