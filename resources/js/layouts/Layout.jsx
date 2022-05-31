import React, { useEffect } from "react"
import Sidebar from "../sections/Sidebar";
import Navbar from "../sections/Navbar";
import { Outlet, useNavigate } from "react-router-dom"


const Layout = () => {

    const redirect = useNavigate();

    const token = localStorage.getItem("_token") ;

    useEffect(() => {
        
        if(token === null) redirect("/login");

        console.log(token);


    }, []);

    return(
        <React.Fragment>
                <div className="flex">
                    <Sidebar/>
                    <div className="flex-auto">
                        <Navbar/>
                        <div className="mt-4 overflow-x-hidden overflow-y-auto">
                            <Outlet/>
                        </div>
                    </div>
                </div>
        </React.Fragment>
    )
}


export default Layout;
