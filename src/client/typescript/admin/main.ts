/**
 * Administration
 */

//
import Vue from 'vue';

//
import 'filters';

// Components
import 'OrderForm';


// Orders' API request address
const ordersRequest = new Request('/administration/api/orders', {method: 'GET'});

// main app
var app = new Vue({
	el: '#app',
	data:{
		orders: [],
		order_form: false, // display form
	},

	//
	created() {
		this.loadOrders();
	},

	methods: {
		//
		displayItems: function (order:any) {
			if (typeof order['displayItems'] == 'undefined')
				order.displayItems = false;
			order.displayItems = !order['displayItems'];
		},

		// load orders from the API
		loadOrders: function () {
			fetch(ordersRequest).then((response) => response.json())
			.then((data) =>{
				for (let i in data) {
					data[i].displayItems = false;
					data[i].displayForm = false;
				}
				this.orders = data
			});
		},
	}
});
