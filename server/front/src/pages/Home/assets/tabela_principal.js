import React, { Component } from "react";
import axios from "axios";
import Tabela from "./tabela.js";

// as informacoes estao sendo exibidas atraves do script: tabela.js tabela_modal.js
// tabela_principal.js faz as requisicoes e manipulacoes e tabela/tabela_modal as rendereizacoes

class Tabela_Principal extends Component {
  state = {
    data_detalhes: [],
    pedidos: [],
    data: [],
    isModal: false,
    Token_myStorage: null
  };

  //responsavel por organizar o json vindo da API
  get_data(res_data) {
    let data = [];
    let data_table_principal = [];
    let detalhes_tabela = [];

    if (res_data.length > 0) {
      data = res_data;

      for (let i = 0; i < data.length; i++) {
        data_table_principal.push({
          id: data[i].id,
          date: data[i].date,
          value: "R$ " + data[i].value.toLocaleString("pt-BR"),
          name: data[i].client.name
        });

        detalhes_tabela.push({
          id: data[i].id,
          value_total: "R$ " + data[i].value.toLocaleString("pt-BR"),
          client_id: data[i].client.id,
          client_name: data[i].client.name,
          client_email: data[i].client.email,
          client_phone: data[i].client.phone,
          items: data[i].items
        });
      }
      this.setState({
        data: data_table_principal, //array que será manipulado pelo filtro
        pedidos: data_table_principal, // array principal
        data_detalhes: detalhes_tabela // array dos detalhes dos pedidos
      });
    }
  }

  //faz post na API ao carregar a pagina
  componentDidMount() {
    this.setState({ Token_myStorage: window.localStorage });
    //faz um post enviando o token de acesso. Caso o servidor autorize, pega o json
    const token = window.localStorage.getItem("@Session_Token");
    axios({
      method: "post",
      url: "/api/pedidos",
      headers: { "Content-type": "application/json" },
      data: { token }
    })
      .then(response => {
        this.get_data(response.data["pedidos"]);
      })
      .catch(error => {
        console.log("erro", error);
      });
  }

  //funcao responsavel por mudar o estado do filtro
  filtro_data = filtro => {
    this.setState({ data: filtro });
  };

  render() {
    // Filtro procurar um cliente
    let search_client = e => {
      const data = this.state.pedidos;
      let input = e.target.value;
      let d = [];
      for (let i = 0; i < data.length; i++) {
        if (data[i].name === input) {
          console.log("achou");
          d.push(data[i]);
          this.filtro_data(d);
          return 0;
        } else {
          this.filtro_data(this.state.pedidos);
        }
      }
    };

    // Filtro de procurar pedidos de valor minimo
    let search_minimo = e => {
      const data = this.state.pedidos;
      let input = e.target.value;
      let d = [];
      for (let i = 0; i < data.length; i++) {
        if (parseFloat(data[i].value.replace("R$", "")) >= input) {
          d.push(data[i]);
          this.filtro_data(d);
        }
      }

      if (input == null) {
        this.filtro_data(this.state.pedidos);
      }
    };

    //responsavel por chamar o modal e setar a data no pedido no modal
    let detalhes_pedidos = (bool, pedidos) => {
      this.setState({ isModal: bool });
      this.setState({ pedidos: pedidos });
    };

    //voltar pra tabela principal {path: tabela -> tabela_modal}
    let voltar_tabela = () => {
      this.setState({ isModal: false });
      this.setState({ pedidos: [] });
    };

    return (
      <Tabela
        isModal={this.state.isModal}
        data={this.state.data}
        data_detalhes={this.state.data_detalhes}
        pedidos={this.state.pedidos}
        search_client={search_client}
        search_minimo={search_minimo}
        detalhes_pedidos={detalhes_pedidos}
        voltar_tabela={voltar_tabela}
      />
    );
  }
}
export default Tabela_Principal;
