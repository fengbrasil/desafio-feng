const _server = require("./server.js");

class query_sql {
  query_sql_pedidos(req, res) {
    const token = req.body.token;
    console.log("token que recebe " + token);

    let pedidos = {
      pedidos: [
        {
          id: 1,
          value: 35.0,
          date: "2018-10-10 18:32:06",
          items: [
            {
              name: "Combo 01",
              description: "Cachorro Quente + Refrigerante",
              quantity: 3,
              value: 15.0
            },
            {
              name: "Combo 02",
              description: "Hamburguer + Fritas",
              quantity: 2,
              value: 20.0
            }
          ],
          client: {
            id: 1,
            name: "João da Silva",
            email: "joao.silva@email.com",
            phone: "(21)9999-9999"
          }
        },
        {
          id: 2,
          value: 150.0,
          date: "2018-10-12 17:15:32",
          items: [
            {
              name: "Combo 01",
              description: "Cachorro Quente + Refrigerante",
              quantity: 10,
              value: 150.0
            }
          ],
          client: {
            id: 7,
            name: "Matheus Andrade",
            email: "matheus@email.com",
            phone: "(21)7890-1234"
          }
        },
        {
          id: 3,
          value: 22.0,
          date: "2018-10-12 19:00:10",
          items: [
            {
              name: "Refrigerante 350ml",
              description: "Latinha de refrigerante 350ml",
              quantity: 2,
              value: 10.0
            },
            {
              name: "Pipoca Grade",
              description: "Balde de pipoca amanteigada",
              quantity: 1,
              value: 12.0
            }
          ],
          client: {
            id: 10,
            name: "Marco Moraes",
            email: "marco@email.com",
            phone: "(21)3245-7609"
          }
        }
      ]
    };

    if (_server.tokens_autorizados.length > 0) {
      for (let i = 0; i < _server.tokens_autorizados.length; i++) {
        console.log("tokens " + _server.tokens_autorizados[i]);
        if (token === _server.tokens_autorizados[i]) {
          return pedidos;
        }
      }
    }
  }
}

module.exports = query_sql;
