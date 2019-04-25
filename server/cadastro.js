const _server = require("./server.js");

class Cadastro {
  make_cadastro(req, res) {
    const username = req.body.username;
    const email = req.body.email;
    const password = req.body.password;

    if (_server.bd_temporario_usuarios.length > 0) {
      for (let i = 0; i < _server.bd_temporario_usuarios.length; i++) {
        if (username == _server.bd_temporario_usuarios[i].username) {
          return [false, "Conta já existe :("];
        }
      }

      const user = { username: username, email: email, password: password };
      _server.bd_temporario_usuarios.push(user);
      return [true, "cadastro ok"];
    } else {
      const user = { username: username, email: email, password: password };
      _server.bd_temporario_usuarios.push(user);
      return [true, "cadastro ok"];
    }
  }
}

module.exports = Cadastro;
