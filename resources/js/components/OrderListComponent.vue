<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Identificação</th>
                <th scope="col">Data do Pedido</th>
                <th scope="col">Valor</th>
                <th scope="col">Cliente</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="order in getOrders" @click="showInfo(order.id)">
                <th scope="row">#{{ order.id }}</th>
                <td>{{ order.dt_order }}</td>
                <td>{{ order.vlTotal  }}</td>
                <td>{{ order.client.name }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    import store from './../store';

    export default {
        props: ['orders'],
        data() {
          return {
          }
        },
        mounted() {
            let orders = this.orders;
            orders = orders.map((i) => {
                i.vlTotal = i.items.reduce( (total,item) => total + (item.vl_unitary * item.pivot.amount)
                    ,0).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

                i.items.map( (item) => {
                    item.vlTotal = (item.vl_unitary * item.pivot.amount).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                })

                let dtOrder = new Date(i.dt_order);
                i.dt_order = dtOrder.toLocaleString('pt-BR',{day:'numeric',month:'numeric',year:'numeric'});
                return i;
            })

            store.commit('set-orders',orders,{ root: true });
        },
        computed: {
            getOrders() {
                return store.state.order.orders;
            }
        },
        methods: {
            showInfo(id) {
                store.state.order.orders.map((order) => {
                    if(order.id == id) {
                        store.commit('set-modal',order,{root: true});
                    }
                });
                $('#orderModal').modal('show')
            }
        },
    }
</script>