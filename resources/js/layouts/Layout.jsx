import React from "react"
import Sidebar from "../components/Sidebar";
import Navbar from "../components/Navbar";
import { Outlet } from "react-router-dom"


class Layout extends React.Component{

    render(){
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
}

export default Layout;
