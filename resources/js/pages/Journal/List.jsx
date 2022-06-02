import Item from "./Item";
import AddItem from "../../components/AddItem";

function List(){

    return(
        <div>
            <div className="grid sm:grid-cols-2 xl:grid-cols-3 gap-2">
                <Item />
                <Item />
                <Item />
                <Item />
                <Item />
                <AddItem />
            </div>
        </div>
    )
}

export default List
