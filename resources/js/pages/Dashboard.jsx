import { useNavigate } from "react-router-dom";

const Dashboard = ({token}) => {
    const navigate = useNavigate();
    if(token == "") navigate("/login");


    return (
        <div>Dashboard</div>
    )
}

export default Dashboard;
