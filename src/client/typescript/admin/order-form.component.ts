
import Vue from 'vue';

var normVname = (model:string) => {
	var name = model.split('.');
	name[1] = (typeof name[1] == undefined)? '' : `[${name[1]}]`;
	return ` v-model="${model}" name="${name[0] + name[1]}" `;
};

var orderRequest = (id:number) => new Request(`/administration/api/order/${id}`, {method: 'GET'});

/**
 */
Vue.component('order-form', {
	props: ['action', 'edit'],
	data () {
		return {
			order: {
				id: 0,
				date: '',
			},
			client:{
				name: null, email: null, phone: null,
			},
			items: Array(),
		}
	},
	created() {
		if (this.edit)
			this.loadOrder(this.edit);
		else
			this.addItem();
	},
	methods: {
		processSubmit: function (ev:any) {
			ev.preventDefault();
		},
		loadOrder: function (id:number) {
			fetch(orderRequest(id)).then((response) => response.json())
			.then((data) =>{
				this.order.id = data.id;
				this.client = data.Client;

				// suppress TypeScript "error TS2533": Object undefined
				this.order.date = ((el:any) => el.$options.filters.dateNormalize(data.date))(this);

				for (let item of data.Items)
					this.addItem(item);
			});
		},
		addItem: function (item:object = {
			id: Date.now(),
			name: '',
			description: '',
			value: '',
			quantity: 1,
		}) {
			this.items.push(item);
		},
		remItem: function (id:number) {
			this.items = this.items.filter((it) => it.id != id);
		},
		normFloat: function (ev:any) {
			ev.target.value = ev.target.value.replace(',', '.').replace(/(?!^[\-\d\.])[^\d\.]/g, '');
		},
	},
	template: `
		<form :action="action" v-on:submit="processSubmit" class="order-form">
			<table class="table">
				<tr>
					<td>
	`

	// campos de dados do cliente
	+ (`
		<strong> Dados do cliente </strong>
		<label>
			<b>Nome:</b> <input ${normVname('client.name')} type="text" style="width: 17.5rem">
		</label><br>
		<label>
			<b>Telefone:</b> <input ${normVname('client.phone')} type="text" style="width: 12rem">
		</label>
		<label>
			<b>E-mail:</b> <input ${normVname('client.email')} type="email" style="width: 12rem">
		</label>
		<hr>
		<strong> Dados do Pedido </strong>
		<label>
			<b>Id:</b> <input ${normVname('order.id')} type="number" placeholder="034" style="width: 7rem">
		</label>
		<label>
			<b>Data:</b> <input ${normVname('order.date')} type="text" placeholder="01/12/2019" style="width: 12rem">
		</label>
	`) // Fim dos campos de dados do cliente

	+ `
						</td>
					</tr>
					<tr>
						<td>
						<hr>
							<h4 style="text-align: center">Itens do pedido</h4>
							<table class="table">
								<tr v-for="item in items" class="jumbotron">
									<td>
	`

	// Campos de item
	+ (`
	<table style="width: 100%">
		<tr>
			<td colspan="3">
				<b>Nome:</b> <input ${normVname('item.name')} type="text" style="width: 29rem">
				<button v-on:click="remItem(item.id)" style="float: right">remover</button>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<b>Descrição:</b><br> <textarea ${normVname('item.description')} style="width: 100%"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<b>Valor:</b> <input ${normVname('item.value')} v-on:keyup="normFloat" type="text" style="width: 9rem">
			</td>
			<td>
				<b>Quantidade:</b> <input ${normVname('item.quantity')} type="number" style="width: 6rem">
			</td>
			<td>
				<b>Valor total: </b> {{item.value*item.quantity | priceNormalize}}
			</td>
		</tr>
	</table>
	`) // Fim dos campos de item

	+ `
								</td>
							</tr>
							<tr>
								<td style="text-align: center">
									<button v-on:click="addItem()">Adicionar item</button>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</form>
	`,
});

