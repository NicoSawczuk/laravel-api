import React from 'react';
import ReactDOM from 'react-dom';

const Navbar = ({ transfers }) => (
    <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
        <div className="nav-item active text-white">
            <b>walletApp</b>
        </div>
    </nav>
)
//? significa entonces
//: significa sino
export default Navbar
if (document.getElementById('navbar')) {
    ReactDOM.render(<Navbar />, document.getElementById('navbar'));
}