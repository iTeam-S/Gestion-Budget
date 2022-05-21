import React, { useEffect, useState } from "react";
import {BrowserRouter, Routes, Route } from "react-router-dom";

import Layout from "../layouts/Layout";

import Login from '../pages/Login';
import Dashboard from "../pages/Dashboard";
import Compte from "../pages/Compte";
import Journal from "../pages/Journal";
import Ecriture from "../pages/Ecriture";


const App = () => {

    return(
        <BrowserRouter>
        <Routes>
          <Route path="/" element={<Layout/>}>
              <Route index path="dashboard" element={<Dashboard/>} />
              <Route index path="compte" element={<Compte/>} />
              <Route index path="journal" element={<Journal/>} />
              <Route index path="ecriture" element={<Ecriture/>} />
          </Route>
          <Route path="login" element={<Login/>} />
          <Route path="*" element="login" />
        </Routes>
      </BrowserRouter>
      )
}




export default App
