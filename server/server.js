var express = require("express")
var routes = require("./routes/routes.js")
var cors = require('cors')
var app = express()

app.use(cors())

routes(app)

var server = app.listen(8080, function () {
    console.log("Server running on port.", server.address().port)
})