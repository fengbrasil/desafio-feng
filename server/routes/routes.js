var db = require('../db/db.js')
var faker = require('faker')
var moment = require('moment')

var appRouter = function (app) {
    app.get('/', function (request, response) {
        response.status(200).send('Desafio FENG API')
    })

    app.get('/api/orders', db.getOrders)

    app.get('/api/test', function(request, response) {
        var data = JSON.parse('{"pedidos":[{"id":1,"value":35,"date":"2018-10-10 18:32:06","items":[{"name":"Combo 01","description":"Cachorro Quente + Refrigerante","quantity":3,"value":15},{"name":"Combo 02","description":"Hamburguer + Fritas","quantity":2,"value":20}],"client":{"id":1,"name":"João da Silva","email":"joao.silva@email.com","phone":"(21)9999-9999"}},{"id":2,"value":150,"date":"2018-10-12 17:15:32","items":[{"name":"Combo 01","description":"Cachorro Quente + Refrigerante","quantity":10,"value":150}],"client":{"id":7,"name":"Matheus Andrade","email":"matheus@email.com","phone":"(21)7890-1234"}},{"id":3,"value":22,"date":"2018-10-12 19:00:10","items":[{"name":"Refrigerante 350ml","description":"Latinha de refrigerante 350ml","quantity":2,"value":10},{"name":"Pipoca Grade","description":"Balde de pipoca amanteigada","quantity":1,"value":12}],"client":{"id":10,"name":"Marco Moraes","email":"marco@email.com","phone":"(21)3245-7609"}}]}')

        response.status(200).send(data)
    })

    app.get('/api/faker', function(request, response) {
        let pedidosSequence = Array.from(Array(Math.floor(Math.random() * Math.floor(10)) + 1).keys())
        
        let pedidos = pedidosSequence.map(i => {
            let itemsSequence = Array.from(Array(Math.floor(Math.random() * Math.floor(10)) + 1).keys())

            return {
                id: i + 1,
                value: 0,
                date: moment(faker.date.past(1, new Date)).format('YYYY-MM-DD HH:mm:ss'),
                items: itemsSequence.map(i => {
                    return {
                        name: faker.commerce.productName(),
                        description: faker.lorem.slug(),
                        quantity: Math.floor(Math.random() * Math.floor(10)) + 1,
                        value: Math.floor(Math.random() * Math.floor(1000)),
                    }
                }),
                client: {
                    id: faker.random.uuid(),
                    name: faker.internet.userName(),
                    email: faker.internet.exampleEmail(),
                    phone: faker.helpers.replaceSymbolWithNumber('(##)####-####'),
                }
            }
        }).map(pedido => {
            return {
                ...pedido,
                value: pedido.items.reduce((accumulator, currentValue) => {
                    return accumulator + (currentValue.quantity * currentValue.value)
                }, 0),
            }
        })

        response.status(200).send({
            pedidos: pedidos
        })
    })
}

module.exports = appRouter