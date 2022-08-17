// ./assets/js/components/Home.js
    
import React, {Component} from 'react';
import {Routes, Route, Switch,Navigate, Link, withRouter} from 'react-router-dom';
import Users from './component/Users';
import Posts from './component/Posts';
import Home from './component/Home';
class Index extends Component {
    
    render() {
        return (
            <div className="App">
                 <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
                   <Link className={"navbar-brand"} to={"/"}> Symfony React Project </Link>
                   <div className="collapse navbar-collapse" id="navbarText">
                       <ul className="navbar-nav mr-auto">
                           <li className="nav-item">
                               <Link className={"nav-link"} to={"/posts"}> Posts </Link>
                           </li>
    
                           <li className="nav-item">
                               <Link className={"nav-link"} to={"/home"}> Users gfdgdf</Link>
                           </li>
                       </ul>
                   </div>
               </nav>
               <Routes>
                   {/* <Navigate exact from="/" to="/users" /> */}
                   <Route path="/" element={<Index />} />
                   <Route path="/home" element={<Home />} />
                   <Route path="/posts" element={<Posts />} />
               </Routes>          
             </div>
        )
    }
}
    
export default Index;
