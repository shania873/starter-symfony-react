// ./assets/js/components/Home.js
    
import React, {Component} from 'react';
import {Routes, Route, Switch,Navigate, Link, withRouter} from 'react-router-dom';

import Posts from './Posts';

class Users extends Component {
    
    render() {
        return (
           <div>
               <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
                   <Link className={"navbar-brand"} to={"/"}> Symfony React Project </Link>
                   <div className="collapse navbar-collapse" id="navbarText">
                       <ul className="navbar-nav mr-auto">
                           <li className="nav-item">
                               <Link className={"nav-link"} to={"/posts"}> Postsfdsfdsfsd </Link>
                           </li>
    
                           <li className="nav-item">
                               <Link className={"nav-link"} to={"/users"}> Users </Link>
                           </li>
                       </ul>
                   </div>
               </nav>
              
           </div>
        )
    }
}
    
export default Users;
