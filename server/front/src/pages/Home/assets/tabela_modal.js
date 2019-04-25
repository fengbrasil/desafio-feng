import React from "react";
import "react-bootstrap-table-next/dist/react-bootstrap-table2.min.css";
import BootstrapTable from "react-bootstrap-table-next";

const Tabela_modal = props => {
  const columns = [
    //display colunas da tabela
    {
      dataField: "name",
      text: "Items"
    },

    {
      dataField: "description",
      text: "Descricao"
    },

    {
      dataField: "quantity",
      text: "Quantidade"
    },

    {
      dataField: "value",
      text: "Valor"
    }
  ];

  return (
    <div className="col-xl-11">
      <div className="card shadow mb-4">
        <div className="card-header align-items-center">
          <h2 className="text-center">Detalhes do Pedido {props.pedidos_id}</h2>
          <br />
          <div className="d-flex justify-content-between">
            <a>Nome: {props.client_name}</a>
            <div>
              <a>Telefone: {props.client_phone}</a>
            </div>
            <a>Email: {props.client_email}</a>
          </div>
        </div>
        <BootstrapTable //tabela
          keyField="id"
          columns={columns}
          data={props.data}
        />
        <div className="d-flex justify-content-between">
          <div />
          <h5 style={{ "margin-right": "2rem" }}>Total: {props.value_total}</h5>
        </div>

        <div
          className="row justify-content-center align-self-center"
          style={{ "margin-bottom": "1rem" }}
        >
          <button className="btn btn-success " onClick={props.voltar_tabela}>
            Voltar
          </button>
        </div>
      </div>
    </div>
  );
};

export default Tabela_modal;
