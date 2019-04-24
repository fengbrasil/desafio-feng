import React from "react";
import "react-bootstrap-table-next/dist/react-bootstrap-table2.min.css";
import BootstrapTable from "react-bootstrap-table-next";
import Tabela_modal from "./tabela_modal.js";
import { CSVLink } from "react-csv";

const Tabela = props => {
  const data = props.data; //pega data do tabela_principal.js

  const columns = [
    //display colunas da tabela
    {
      dataField: "id",
      text: "Identificacão"
    },

    {
      dataField: "date",
      text: "Data do Pedido"
    },

    {
      dataField: "value",
      text: "Valor"
    },

    {
      dataField: "name",
      text: "Cliente"
    }
  ];

  const rowEvents = {
    //evento ao clicar nas linhas da tabela
    onClick: (e, row, rowIndex) => {
      const x = props.data_detalhes[parseInt(row.id) - 1];

      props.detalhes_pedidos(true, x);
    }
  };

  if (!props.isModal) {
    return (
      <div className="col-xl-11">
        <div className="card shadow mb-4">
          <div className="card-header align-items-center">
            <h2 className="text-center">Pedidos</h2>
            <br />
            <div className="row justify-content-center align-self-center">
              <div className="col-sm-3">
                <input //input data inicio
                  type="date"
                  className="form-control"
                  onChange={props.search_client}
                />
              </div>
              <div className="col-sm-3">
                <input //input data termino
                  type="date"
                  className="form-control"
                  onChange={props.search_client}
                />
              </div>
              <div className="col-sm-3">
                <input //input nome cliente e chama funcao search_client na tabela_principal.js
                  type="text"
                  className="form-control"
                  placeholder="Nome do Cliente"
                  onChange={props.search_client}
                />
              </div>

              <div className="col-sm-3">
                <input //input valor minimo e chama funcao search_minimo na tabela_principal.js
                  type="number"
                  className="form-control"
                  placeholder="Valor Minimo"
                  onChange={props.search_minimo}
                />
              </div>
            </div>
          </div>
          <BootstrapTable
            keyField="id"
            data={data}
            columns={columns}
            rowEvents={rowEvents}
          />
          <div
            className="row justify-content-center align-self-center"
            style={{ marginBottom: "1rem" }}
          >
            <CSVLink className="btn btn-success " data={data}>
              Exportar CSV
            </CSVLink>
          </div>
        </div>
      </div>
    );
  } else {
    const pedidos = props.pedidos;

    return (
      <Tabela_modal
        data={pedidos.items}
        pedidos_id={pedidos.id}
        value_total={pedidos.value_total}
        client_name={pedidos.client_name}
        client_phone={pedidos.client_phone}
        client_email={pedidos.client_email}
        voltar_tabela={props.voltar_tabela}
      />
    );
  }
};

export default Tabela;
