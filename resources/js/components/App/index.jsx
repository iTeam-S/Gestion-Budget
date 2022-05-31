import React, { useEffect, useState } from "react";
import {BrowserRouter, Routes, Route } from "react-router-dom";

import Layout from "../../layouts/Layout";

import { TokenProvider } from "../../utils/context";

import Login from '../../pages/Login';
import Dashboard from "../../pages/Dashboard";
import Account from "../../pages/Account";
import Journal from "../../pages/Journal";
import Ecriture from "../../pages/Ecriture";
import Error from "../Error/";


const App = () => {

    return(
        <BrowserRouter>
            <TokenProvider>
                <Routes>
                    <Route path="/" element={<Layout/>}>
                        <Route index path="dashboard" element={<Dashboard/>} />
                        <Route index path="compte" element={<Account/>} />
                        <Route index path="journal" element={<Journal/>} />
                        <Route index path="ecriture" element={<Ecriture/>} />
                    </Route>
                    <Route path="login" element={<Login/>} />
                    <Route path="*" element={<Error />} />
                </Routes>
            </TokenProvider>
      </BrowserRouter>
      )
}

export default App
