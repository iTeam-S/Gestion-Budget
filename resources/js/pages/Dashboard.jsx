import { useNavigate } from "react-router-dom";
import ChartJs from "../components/ChartJs";

const Dashboard = ({token}) => {
    const navigate = useNavigate();
    if(token == "") navigate("/login");


    return (
        <>
            <div>Dashboard</div>
            <ChartJs/>
        </>
    )
}

export default Dashboard;
