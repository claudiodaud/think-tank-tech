import React, { Component } from "react";
import ReactDOM from "react-dom";
import User from "./User.js";
import axios from "axios";
// import Home from "./pages/Home.js"
// import NotFound from "./pages/NotFound.js"

import { BrowserRouter, Route, Switch } from "react-router-dom";

function Home(props) {
    console.log("hola");
    return <h1>Soy el home</h1>;
}

class Users extends Component {
    constructor(props) {
        super(props);

        this.state = {
            loading: true,
            error: null,
            users: [],
        };
    }

    componentDidMount() {
        axios.get("api/users").then((response) => {
            this.setState({
                users: response.data,
            });
        });
    }

    render() {

        console.log("users: ", this.state.users);
        if (this.state.users.length > 1) {
            console.log("entreee")
            return (
                <ul>
                    {this.state.users.map((user) => {
                        <li>{`${user.name} - ${user.email}`}</li>;
                    })}
                </ul>
            );
        }
        return <h1>Somos los usuarios</h1>;
    }
}

function App(props) {
    return (
        <BrowserRouter>
            <Switch>
                <Route exact path="/" component={Home} />
                <Route exact path="/users" component={Users} />
            </Switch>
        </BrowserRouter>
    );
}

export default App;

if (document.getElementById("example")) {
    ReactDOM.render(<App />, document.getElementById("example"));
}
