const { Pool } = require('pg')

const pool = new Pool({
    host: 'db',
    database: 'desafio_feng',
    user: 'root',
    password: 'root',
    port: 5432,
})

const getOrders = (request, response) => {
    pool.query('SELECT * FROM orders ORDER BY id ASC', (error, results) => {
        if (error) {
            throw error
        }

        let res = {
            pedidos: results.rows.map(item => {
               return item.data
            })
        }

        response.status(200).json(res)
    })
}

const getOrder = (request, response) => {
    const id = parseInt(request.params.id)

    pool.query('SELECT * FROM orders WHERE id = $1', [id], (error, results) => {
        if (error) {
            throw error
        }

        response.status(200).json(results.rows)
    })
}

module.exports = {
    getOrders,
    getOrder,
}