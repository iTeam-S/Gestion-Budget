import CompteItem from "../item/CompteItem";
import getCompteData from "../../datas/ComptesData";
import AddItem from "../item/AddItem";
const CompteList = () => {

    return(
        <div>
            <div className="grid sm:grid-cols-2 xl:grid-cols-3">
                <CompteItem />
                <CompteItem />
                <CompteItem />
                <CompteItem />
                <CompteItem />
                <CompteItem />
            </div>
        </div>
    )
}

export default CompteList
