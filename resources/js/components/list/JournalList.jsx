import JournalItem from "../item/JournalItem";
// import getJournalData from "../../datas/JournalsData";
import AddItem from "../item/AddItem";
function JournalList(){

    return(
        <div>
            <div className="grid sm:grid-cols-2 xl:grid-cols-3">
                <JournalItem />
                <JournalItem />
                <JournalItem />
                <JournalItem />
                <JournalItem />
                <JournalItem />
            </div>
        </div>
    )
}

export default JournalList
