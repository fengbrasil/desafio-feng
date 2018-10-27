export default {
    state: {
        orders: [],
        infoOrder: "",
    },
    mutations: {
        'set-orders'(state, orders) {
            state.orders = orders;
        },
        'set-modal'(state,order) {
            state.infoOrder = order;
        }
    },
    actions: {  },
    getters: {  }
}