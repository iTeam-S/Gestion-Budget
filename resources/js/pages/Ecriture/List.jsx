import Item from "./Item"
import AddItem from "../../components/AddItem"

function List(){

    return(
        <div>
            <Item title="titre 1" content="content 1"/>
            <Item title="titre 2" content="content 2"/>
            <Item title="titre 3" content="content 3"/>
            <Item title="titre 4" content="content 4"/>
            <Item title="titre 5" content="content 5"/>
        </div>
    )
}

export default List