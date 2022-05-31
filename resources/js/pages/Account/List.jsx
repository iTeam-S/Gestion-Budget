import { useState, useEffect } from "react";
import Item from "./Item";
import AddItem from "../../components/AddItem/";

const List = () => {

    const [accounts, setAccounts] = useState([]);

    useEffect(() => {

        // fetching all accounts
        let Promise = null;
        const url = "http://localhost:8000/api/compte/";
        const init = {
            method: "GET",
            header: {
                "Content-type": "application/x-www-form-urlencoded",
                "Authorization": "Bearer "// + token
            }
        }

        console.log(localStorage.getItem("_token"));

        Promise = fetch(url, init)
            .then((promise) => promise.json())

        Promise.then((response) => {console.log(response)})
    })

    return(
        <div>
            <div className="grid sm:grid-cols-2 xl:grid-cols-3">
                <Item/>
                <Item/>
                <Item/>
                <Item/>
                <Item/>
                <AddItem/>
            </div>
        </div>
    )
}

export default List
