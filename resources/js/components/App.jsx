import React, { useEffect, useState } from "react";
import {BrowserRouter, Routes, Route } from "react-router-dom";

import Layout from "../layouts/Layout";

import Login from '../pages/Login';
import Dashboard from "../pages/Dashboard";
import Compte from "../pages/Compte";
import { identity } from "lodash";

const App = () => {


    const historyToken = localStorage.getItem("_token") || "";
    const [token, setToken] = useState(historyToken);


    return(
        <BrowserRouter>
        <Routes>
          <Route path="/" element={<Layout />}>
              <Route index path="dashboard" element={<Dashboard token={token}/>} />
              <Route index path="comptes" element={<Compte token={token} />} />

          </Route>
          <Route path="login" element={<Login token={token} setToken={setToken} />} />
          <Route path="*" element="login" />
        </Routes>
      </BrowserRouter>
      )
}




export default App
