<template>
    <div class="modal" tabindex="-1" role="dialog" id="orderModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center text-monospace">Detalhes do pedido #{{ getOrder.id }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid d-flex justify-content-between mt-5">
                        <div class="d-inline"><p><strong>Nome:</strong> {{ getOrder ? getOrder.client.name : '' }}</p></div>
                        <div class="d-inline"><p><strong>E-mail:</strong> {{ getOrder ? getOrder.client.email : '' }}</p></div>
                        <div class="d-inline"><p><strong>Telefone:</strong> {{ getOrder ? getOrder.client.phone : '' }}</p></div>

                    </div>
                    <table class="table table-hover my-3">
                        <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Valor</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in getOrder.items">
                            <th scope="row">{{ item.name }}</th>
                            <td>{{ item.description }}</td>
                            <td>{{ item.pivot.amount }}</td>
                            <td>{{ item.vlTotal }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <div>Total: {{ getOrder.vlTotal }}</div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import store from './../store';
    export default {
        computed: {
            getOrder() {
                return store.state.order.infoOrder;
            },
        }
    }
</script>