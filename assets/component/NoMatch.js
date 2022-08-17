// ./assets/js/components/Home.js
    
import React, {Component} from 'react';
import {Routes, Route, Switch,Navigate, Link, withRouter} from 'react-router-dom';
import Users from './Users.js';
import Posts from './Posts';
import Index from '../index.js'
    
class NoMatch extends Component {
    
    render() {
        return (
           <div>
             No Match
           </div>
        )
    }
}
    
export default NoMatch;
