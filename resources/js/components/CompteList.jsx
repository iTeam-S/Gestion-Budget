import CompteItem from "./CompteItem";
import getCompteData from "../datas/ComptesData";
import AddItem from "./AddItem";
const CompteList = () => {

    return(
        <div>
            <div className="grid sm:grid-cols-2 xl:grid-cols-3">
                <CompteItem />
                <CompteItem />
                <CompteItem />
                <AddItem />
            </div>
        </div>
    )
}

export default CompteList
