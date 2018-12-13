var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
define(["require", "exports", "vue", "filters", "order-form"], function (require, exports, vue_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    vue_1 = __importDefault(vue_1);
    var ordersRequest = new Request('/administration/api/orders', { method: 'GET' });
    var app = new vue_1.default({
        el: '#app',
        data: {
            orders: [],
            order_form: false,
        },
        created: function () {
            this.loadOrders();
        },
        methods: {
            displayItems: function (order) {
                if (typeof order['displayItems'] == 'undefined')
                    order.displayItems = false;
                order.displayItems = !order['displayItems'];
            },
            loadOrders: function () {
                var _this = this;
                fetch(ordersRequest).then(function (response) { return response.json(); })
                    .then(function (data) {
                    for (var i in data) {
                        data[i].displayItems = false;
                        data[i].displayForm = false;
                    }
                    _this.orders = data;
                });
            },
        }
    });
});
