import React, { Component } from "react";
import { Link, withRouter } from "react-router-dom";
import axios from "axios";
import Logo from "../../assets/logo.png";
import { login } from "../../services/auth";
import { Form, Container } from "./styles";

class SignIn extends Component {
  state = {
    username: "",
    password: "",
    error: ""
  };

  handleSignIn = async e => {
    e.preventDefault();
    const { username, password } = this.state;

    //Verifica usuario e senha se é nulo ou um menor que 255.
    if (
      (!username && username.length <= 255) ||
      (!password && password.length <= 255)
    ) {
      this.setState({ error: "Preencha usuario e senha para continuar!" });
    } else {
      axios({
        method: "post",
        url: "/login",
        headers: { "Content-type": "application/json" },
        data: { username, password }
      })
        .then(response => {
          console.log(response.data.token);
          if (response.data.token[0]) {
            login(response.data.token[1]);
            this.props.history.push("/app");
          } else {
            this.setState({
              error:
                "Houve um problema com o login, verifique suas credenciais."
            });
          }
        })
        .catch(error => {
          console.log("erro", error);
          this.setState({
            error: "Houve um problema com o login, verifique suas credenciais."
          });
        });
    }
  };

  render() {
    return (
      <Container>
        <Form onSubmit={this.handleSignIn}>
          <img src={Logo} alt="logo" />
          {this.state.error && <p>{this.state.error}</p>}
          <input
            type="text"
            placeholder="Usuario"
            onChange={e => this.setState({ username: e.target.value })}
          />
          <input
            type="password"
            placeholder="Senha"
            onChange={e => this.setState({ password: e.target.value })}
          />
          <button type="submit">Entrar</button>
          <hr />
          <Link to="/cadastro">Se cadastrar :D</Link>
        </Form>
      </Container>
    );
  }
}

export default withRouter(SignIn);
