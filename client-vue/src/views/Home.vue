<template>
  <div>
    <OrdersTable></OrdersTable>
    <OrderModal></OrderModal>
  </div>
</template>

<script>
import OrdersTable from '@/components/OrdersTable.vue'
import OrderModal from '@/components/OrderModal.vue'

export default {
  name: 'home',
  components: {
    OrdersTable,
    OrderModal,
  }
}
</script>
