var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
define(["require", "exports", "vue"], function (require, exports, vue_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    vue_1 = __importDefault(vue_1);
    var normVname = function (model) {
        var name = model.split('.');
        name[1] = (typeof name[1] == undefined) ? '' : "[" + name[1] + "]";
        return " v-model=\"" + model + "\" name=\"" + (name[0] + name[1]) + "\" ";
    };
    var orderRequest = function (id) { return new Request("/administration/api/order/" + id, { method: 'GET' }); };
    /**
     */
    vue_1.default.component('order-form', {
        props: ['action', 'edit'],
        data: function () {
            return {
                order: {
                    id: 0,
                    date: '',
                },
                client: {
                    name: null, email: null, phone: null,
                },
                items: Array(),
            };
        },
        created: function () {
            if (this.edit)
                this.loadOrder(this.edit);
            else
                this.addItem();
        },
        methods: {
            processSubmit: function (ev) {
                ev.preventDefault();
            },
            loadOrder: function (id) {
                var _this = this;
                fetch(orderRequest(id)).then(function (response) { return response.json(); })
                    .then(function (data) {
                    _this.order.id = data.id;
                    _this.client = data.Client;
                    // suppress TypeScript "error TS2533": Object undefined
                    _this.order.date = (function (el) { return el.$options.filters.dateNormalize(data.date); })(_this);
                    for (var _i = 0, _a = data.Items; _i < _a.length; _i++) {
                        var item = _a[_i];
                        _this.addItem(item);
                    }
                });
            },
            addItem: function (item) {
                if (item === void 0) { item = {
                    id: Date.now(),
                    name: '',
                    description: '',
                    value: '',
                    quantity: 1,
                }; }
                this.items.push(item);
            },
            remItem: function (id) {
                this.items = this.items.filter(function (it) { return it.id != id; });
            },
            normFloat: function (ev) {
                ev.target.value = ev.target.value.replace(',', '.').replace(/(?!^[\-\d\.])[^\d\.]/g, '');
            },
        },
        template: "\n\t\t<form :action=\"action\" v-on:submit=\"processSubmit\" class=\"order-form\">\n\t\t\t<table class=\"table\">\n\t\t\t\t<tr>\n\t\t\t\t\t<td>\n\t"
            // campos de dados do cliente
            + ("\n\t\t<strong> Dados do cliente </strong>\n\t\t<label>\n\t\t\t<b>Nome:</b> <input " + normVname('client.name') + " type=\"text\" style=\"width: 17.5rem\">\n\t\t</label><br>\n\t\t<label>\n\t\t\t<b>Telefone:</b> <input " + normVname('client.phone') + " type=\"text\" style=\"width: 12rem\">\n\t\t</label>\n\t\t<label>\n\t\t\t<b>E-mail:</b> <input " + normVname('client.email') + " type=\"email\" style=\"width: 12rem\">\n\t\t</label>\n\t\t<hr>\n\t\t<strong> Dados do Pedido </strong>\n\t\t<label>\n\t\t\t<b>Id:</b> <input " + normVname('order.id') + " type=\"number\" placeholder=\"034\" style=\"width: 7rem\">\n\t\t</label>\n\t\t<label>\n\t\t\t<b>Data:</b> <input " + normVname('order.date') + " type=\"text\" placeholder=\"01/12/2019\" style=\"width: 12rem\">\n\t\t</label>\n\t") // Fim dos campos de dados do cliente
            + "\n\t\t\t\t\t\t</td>\n\t\t\t\t\t</tr>\n\t\t\t\t\t<tr>\n\t\t\t\t\t\t<td>\n\t\t\t\t\t\t<hr>\n\t\t\t\t\t\t\t<h4 style=\"text-align: center\">Itens do pedido</h4>\n\t\t\t\t\t\t\t<table class=\"table\">\n\t\t\t\t\t\t\t\t<tr v-for=\"item in items\" class=\"jumbotron\">\n\t\t\t\t\t\t\t\t\t<td>\n\t"
            // Campos de item
            + ("\n\t<table style=\"width: 100%\">\n\t\t<tr>\n\t\t\t<td colspan=\"3\">\n\t\t\t\t<b>Nome:</b> <input " + normVname('item.name') + " type=\"text\" style=\"width: 29rem\">\n\t\t\t\t<button v-on:click=\"remItem(item.id)\" style=\"float: right\">remover</button>\n\t\t\t</td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<td colspan=\"3\">\n\t\t\t\t<b>Descri\u00E7\u00E3o:</b><br> <textarea " + normVname('item.description') + " style=\"width: 100%\"></textarea>\n\t\t\t</td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<td>\n\t\t\t\t<b>Valor:</b> <input " + normVname('item.value') + " v-on:keyup=\"normFloat\" type=\"text\" style=\"width: 9rem\">\n\t\t\t</td>\n\t\t\t<td>\n\t\t\t\t<b>Quantidade:</b> <input " + normVname('item.quantity') + " type=\"number\" style=\"width: 6rem\">\n\t\t\t</td>\n\t\t\t<td>\n\t\t\t\t<b>Valor total: </b> {{item.value*item.quantity | priceNormalize}}\n\t\t\t</td>\n\t\t</tr>\n\t</table>\n\t") // Fim dos campos de item
            + "\n\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t<td style=\"text-align: center\">\n\t\t\t\t\t\t\t\t\t<button v-on:click=\"addItem()\">Adicionar item</button>\n\t\t\t\t\t\t\t\t</td>\n\t\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t</table>\n\t\t\t\t\t</td>\n\t\t\t\t</tr>\n\t\t\t</table>\n\t\t</form>\n\t",
    });
});
