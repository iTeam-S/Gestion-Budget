import { useContext } from "react";
import { useNavigate } from "react-router-dom";
import Graph from "../../components/Chart";
import { TokenContext } from "../../utils/context";


const Dashboard = ({token}) => {

    const redirect = useNavigate();

    const { _token } = useContext(TokenContext);

    if(_token !== null) redirect("/login");


    return (
        <>
            <div>Dashboard</div>
            <Graph/>
        </>
    )
}

export default Dashboard;
