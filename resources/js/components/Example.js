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
            users: undefined,
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
        if (this.state.users.length > 0) {
            return (
                <ul>
                    {this.state.users.map((user) => {
                        <li>{`${user.name} - ${user.email}`}</li>;
                    })}
                </ul>
            );
        }

        console.log("hola");
        console.log(this.state.users);
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
