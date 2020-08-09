import React from "react";
import ReactDOM from "react-dom";
import User from "./User.js";

function Example() {

    const users = [
        {name: "Pedro", lastname: "Perez"},
        {name: "Jose", lastname: "Perez"},
        {name: "Antonio", lastname: "Perez"}
    ]

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>
                        {
                         users.map(({name,lastname}) => {
                            return <User name={name} lastname={lastname} />
                         })   
                        }
                        <div className="card-body">REACT component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById("example")) {
    ReactDOM.render(<Example />, document.getElementById("example"));
}
