import CompteItem from "./CompteItem";
import getCompteData from "../datas/ComptesData";

const CompteList = () => {

    return(
        <div>
            <div>Liste des comptes</div>
            <div className="grid sm:grid-cols-2 xl:grid-cols-3">
                <CompteItem />
                <CompteItem />
                <CompteItem />
            </div>
        </div>
    )
}

export default CompteList
