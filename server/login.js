let jwt = require("jsonwebtoken");
let config = require("./config");
const _server = require("./server.js");

class Login {
  check_login(req, res) {
    let username = req.body.username;
    let password = req.body.password;
    if (username.length <= 255 && password.length <= 255) {
      if (_server.bd_temporario_usuarios.length > 0) {
        for (let i = 0; i < _server.bd_temporario_usuarios.length; i++) {
          if (
            username === _server.bd_temporario_usuarios[i].username &&
            password === _server.bd_temporario_usuarios[i].password
          ) {
            const token = "token super seguro :D do usuario " + username;
            _server.tokens_autorizados.push(token);

            return [true, "token super seguro :D do usuario " + username];
          }
        }
      } else {
        return [false, ""];
      }
    } else {
      console.log("username muito grande");

      return [false, ""];
    }
  }
}

module.exports = Login;
