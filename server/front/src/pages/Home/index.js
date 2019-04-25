import React, { Component } from "react";
import { withRouter } from "react-router-dom";
import "./assets/style.css";
import Tabela_Principal from "./assets/tabela_principal";

//Todas as funcoes referente a tabela estao sendo executadas no script: tabela_principal.js

class Home extends Component {
  render() {
    return (
      <div id="page-top">
        <div id="wrapper">
          <div id="content-wrapper" className="d-flex flex-column">
            <div id="content">
              <div
                className="row justify-content-center"
                style={{ marginTop: "5%" }}
              >
                <Tabela_Principal />
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default withRouter(Home);
