import React, { useState } from "react";
import {BrowserRouter, Routes, Route } from "react-router-dom";

import Layout from "../layouts/Layout";

import Login from '../pages/Login';
import Dashboard from "../pages/Dashboard";
import Compte from "../pages/Compte";


class App extends React.Component{

  constructor(props){
    super(props)
    this.state= {token: null}
    this.setToken = this.setToken.bind(this)
  }

  setToken(tokenValue){

    this.setState({token: tokenValue})
  }


  render(){
    return(
      <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout />}>
            <Route index path="dashboard" element={<Dashboard token={this.state.token}/>} />
            <Route index path="comptes" element={<Compte token={this.state.token}/>} />

        </Route>
        <Route path="login" element={<Login token={this.state.token} setToken={this.setToken} />} />
        <Route path="*" element="login" />
      </Routes>
    </BrowserRouter>
    )
  }
}

export default App
