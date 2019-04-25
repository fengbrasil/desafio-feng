import React, { Component } from "react";
import { Link, withRouter } from "react-router-dom";
import axios from "axios";

import Logo from "../../assets/logo.png";

import { Form, Container } from "./styles";

class SignUp extends Component {
  state = {
    username: "",
    email: "",
    password: "",
    error: ""
  };

  handleSignUp = async e => {
    e.preventDefault();
    const { username, email, password } = this.state;
    if (!username || !email || !password) {
      this.setState({ error: "Preencha todos os dados para se cadastrar :D" });
    } else {
      axios({
        method: "post",
        url: "/cadastro",
        headers: { "Content-type": "application/json" },
        data: { username, email, password }
      })
        .then(response => {
          if (response.data[0]) {
            this.props.history.push("/");
          } else {
            this.setState({ error: response.data[1] });
          }
        })
        .catch(error => {
          console.log("erro", error);
          this.setState({ error: "Ocorreu um erro ao registrar sua conta :(" });
        });
    }
  };

  render() {
    return (
      <Container>
        <Form onSubmit={this.handleSignUp}>
          <img src={Logo} alt="logo" />
          {this.state.error && <p>{this.state.error}</p>}
          <input
            type="text"
            placeholder="Nome de usuário"
            onChange={e => this.setState({ username: e.target.value })}
          />
          <input
            type="email"
            placeholder="Endereço de e-mail"
            onChange={e => this.setState({ email: e.target.value })}
          />
          <input
            type="password"
            placeholder="Senha"
            onChange={e => this.setState({ password: e.target.value })}
          />
          <button type="submit">Cadastrar</button>
          <hr />
          <Link to="/">Fazer login</Link>
        </Form>
      </Container>
    );
  }
}

export default withRouter(SignUp);
