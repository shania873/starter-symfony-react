import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import './styles/app.css';
import Index from './index';
    
ReactDOM.render(<BrowserRouter><Index /></BrowserRouter>, document.getElementById('root'));
