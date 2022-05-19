import React from "react"

const Navbar = () => {

    return(
        <header>
            <div>
                <div className="flex align-center">
                    <div className="relative">
                        <span className="absolute top-0 right-0">
                            <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input type="text" className="border-2 h-14 rounded-md" placeholder="rechercher..." />
                    </div>
                </div>

                <ul className="navbar-nav  justify-content-end">
                    <li className="nav-item d-flex align-items-center">
                        <a href="" className="nav-link text-body font-weight-bold px-0">
                            <span className="d-sm-inline d-none">
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li className="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a className="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div className="sidenav-toggler-inner">
                                <i className="sidenav-toggler-line" />
                                <i className="sidenav-toggler-line" />
                                <i className="sidenav-toggler-line" />
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </header>
    )
}

export default Navbar
