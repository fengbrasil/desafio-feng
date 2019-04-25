const express = require("express");
const bodyParser = require("body-parser");
const _login = require("./login.js");
const _cadastro = require("./cadastro.js");
const _query_sql = require("./query_sql.js");
const path = require("path");

/*const mysql      = require('mysql');
const connection = mysql.createConnection({
  host     : 'algum_host_que_nao_caia',
  port     : '8080',
  user     : 'algum_usuario_legal',
  password : 'alguma_senha_forte',
  database : 'db_pedidos'
});*/

let bd_temporario_usuarios = [];
let tokens_autorizados = [];

class HandlerGerenciador {
  call_pedidos(req, res) {
    console.log("Ping pedidos ");
    let query_sql = new _query_sql();
    let sql = query_sql.query_sql_pedidos(req, res);
    res.send(sql);
  }

  call_login(req, res) {
    console.log("ping login");
    let login = new _login();
    let resp = login.check_login(req, res);
    res.json({ token: resp });
  }

  call_cadastro(req, res) {
    console.log("ping cadastro");
    let cadastro = new _cadastro();
    let resp = cadastro.make_cadastro(req, res);
    console.log("msg ", resp);
    res.send(resp);
  }
}

// Inicia o servidor
function main() {
  let app = express();
  const port = process.env.PORT || 8000;
  let handlers = new HandlerGerenciador();

  app.use(bodyParser.json());

  /*connection.connect(function(err){
  if(err) return console.log(err);
  console.log('conectou!');
})*/

  // Rotas
  if (process.env.NODE_ENV === "production") {
    app.use(express.static(path.join(__dirname, "/build")));
    app.get("/*", function(req, res) {
      res.sendFile(path.join(__dirname, "/build", "index.html"));
    });
  }

  app.post("/login", handlers.call_login);
  app.post("/cadastro", handlers.call_cadastro);
  app.post("/api/pedidos", handlers.call_pedidos);
  app.listen(port, () => console.log(`Server is listening on port: ${port}`));
}

main();

exports.bd_temporario_usuarios = bd_temporario_usuarios;
exports.tokens_autorizados = tokens_autorizados;
