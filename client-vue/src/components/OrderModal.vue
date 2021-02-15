<template>
  <modal name="order-modal" @before-open="beforeOpen" @opened="opened" :adaptive="true" height="auto" width="100%" :scrollable="true">
    <div v-if="order" class="modal-wrapper">
      <div class="close text-center p-2" @click="$modal.hide('order-modal')">
        <font-awesome-icon icon="times-circle" size="3x"/>
      </div>
      <div class="text-lg text-center">
        Detalhes do pedido <span class="font-bold">{{ order.id }}</span>
      </div>
      <div class="flex items-center justify-between my-5">
        <div>
          <span class="font-bold">Nome: </span> {{ order.user.name }}
        </div>
        <div>
          <span class="font-bold">Telefone: </span> {{ order.user.telephone }}
        </div>
        <div>
          <span class="font-bold">E-mail: </span> {{ order.user.email }}
        </div>
      </div>
      <table class="responsive-table striped centered">
        <thead>
          <tr>
            <th>Item</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in order.items" :key="index">
            <td>{{ item.name }}</td>
            <td>{{ item.description.substring(0, 50) + ' ...' }}</td>
            <td>{{ item.quantity }}</td>
            <td>{{ item.total }}</td>
          </tr>
        </tbody>
      </table>
      <div class="text-right mt-3">
        <span class="font-bold">Total: </span>{{ order.total }}
      </div>
    </div>
  </modal>
</template>

<script>
export default {
  name: 'OrderModal',
  data() {
    return {
      order: null,
    }
  },
  methods: {
    beforeOpen(event) {
      this.order = event.params.order
      // console.log(this.order)
    },
    opened() {
      this.handleResize()
      window.addEventListener('resize', this.handleResize)
    },
    handleResize() {
      if(window.innerWidth < 425) {
        let modals = document.getElementsByClassName('v--modal')
        let modalsOverlay = document.getElementsByClassName('v--modal-overlay')

        if(modals.length > 0) {
          let modal = modals[0]
          let modalOverlay = modalsOverlay[0]

          modal.style.width = modalOverlay.clientWidth + 'px'
        }
      }
    }
  }
}
</script>

<style lang="scss" scoped>
  .modal-wrapper {
    padding: 20px;
  }
  .close {
    position: fixed;
    top: 0;
    right: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.7);
    color: gray;
    z-index: 999;
    transition: 0.3s;
    &:hover {
      cursor: pointer;
      color: tomato;
      transition: 0.3s;
    }
  }
</style>