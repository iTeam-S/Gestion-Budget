import React from 'react';
import { NavLink } from 'react-router-dom';

const Sidebar = () => {
    return (
        <React.Fragment>
            <aside className="flex-none">
                <nav className="border shadow-md rounded p-2 m-4">
                        <div className="my-2">
                            <NavLink to="dashboard" className={({ isActive }) => (
                                    isActive ? "bg-teal text-white rounded p-px flex flex-row" : "flex -row"
                                )}>
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                </svg>
                                <span className="nav-link-text ms-1">Dashboard</span>
                            </NavLink>
                        </div>
                        <div className="my-2">
                            <NavLink to="journal" className={({ isActive }) => (
                                    isActive ? "bg-teal text-white rounded p-px flex flex-row" : "flex -row"
                                )}>
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <span className="nav-link-text ms-1">Journals</span>
                            </NavLink>
                        </div>
                        <div className="my-2">
                            <NavLink to="ecriture" className={({ isActive }) => (
                                    isActive ? "bg-teal text-white rounded p-px flex flex-row" : "flex -row"
                                )}>
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                <span className="nav-link-text ms-1">Ecritures</span>
                            </NavLink>
                        </div>
                        <div className="my-2">
                            <NavLink to="compte" className={({ isActive }) => (
                                    isActive ? "bg-teal text-white rounded p-px flex flex-row" : "flex -row"
                                )}>
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                <path fillRule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clipRule="evenodd" />
                                </svg>
                                <span className="nav-link-text ms-1">Comptes</span>
                            </NavLink>
                        </div>
                        <div className="my-2">
                            <NavLink to="nouvelles" className={({ isActive }) => (
                                    isActive ? "bg-teal text-white rounded p-px flex flex-row" : "flex -row"
                                )}>
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <span className="nav-link-text ms-1">Nouvelles</span>
                            </NavLink>
                        </div>
                        <div className="my-2">
                            iTeam-$ community
                        </div>
                </nav>
            </aside>
        </React.Fragment>
    );
}

export default Sidebar
