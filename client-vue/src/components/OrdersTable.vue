<template>
  <div class="container p-5">
    <div class="row">
      <div class="input-field col s12 l3">
        <datepicker v-model="date_start" @input="setDate" name="date_start" format="dd/MM/yyyy" placeholder="Data de Início"></datepicker>
      </div>
      <div class="input-field col s12 l3">
        <datepicker v-model="date_end" @input="setDate" name="date_end" format="dd/MM/yyyy" placeholder="Data de Término"></datepicker>
      </div>
      <div class="input-field col s12 l3">
        <input v-model="client_name" @keyup.enter="submit" id="client_name" type="text" name="client_name">
        <label for="client_name">Nome do Cliente</label>
      </div>
      <div class="input-field col s12 l3">
        <input v-model="minimum_value" @keyup.enter="submit" id="minimum_value" type="number" name="minimum_value">
        <label for="minimum_value">Valor Mínimo</label>
      </div>
    </div>
    <div v-if="error" class="row text-red">
      {{ error }}
    </div>
    <table class="striped centered">
      <thead>
        <tr>
          <th>Identificação</th>
          <th>Data do Pedido</th>
          <th>Valor</th>
          <th>Cliente</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(order, index) in orders" :key="index" class="cursor-pointer" @click="showModal(index)">
          <td>{{ order.id }}</td>
          <td>{{ order.date }}</td>
          <td>{{ order.total }}</td>
          <td>{{ order.user.name }}</td>
        </tr>
      </tbody>
    </table>
    <div class="row p-5">
      <div class="col s12 flex items-center justify-between">
        <div>
          <span class="font-bold">{{ this.from }}</span> - <span class="font-bold">{{ this.to }}</span> de <span class="font-bold">{{ this.total }}</span>
        </div>
        <ul class="pagination">
          <li v-if="has_previous_page">
            <a @click.prevent="previousPage" href="#">
              <font-awesome-icon icon="chevron-left"/>
            </a>
          </li>
          <li class="active mx-3">
            <a href="#">{{ this.page }}</a>
          </li>
          <li v-if="has_next_page">
            <a @click.prevent="nextPage" href="#">
              <font-awesome-icon icon="chevron-right"/>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment'

export default {
  name: 'OrdersTable',
  components: {
    Datepicker
  },
  data() {
    return {
      api_url: null,
      orders: [],
      date_start: '',
      date_end: '',
      client_name: '',
      minimum_value: '',
      page: 1,
      has_previous_page: null,
      has_next_page: null,
      from: null,
      to: null,
      total: null,
      error: null,
    }
  },
  created() {
    this.api_url = process.env.VUE_APP_API_BASE_URL + '/api/orders'

    this.callApi({})
  },
  methods: {
    callApi(params) {
      axios({
        method:'get',
        params: params,
        url: this.api_url,
      })
      .then((res) => {
        // // console.log(res)
        this.orders = []
        
        this.page = res.data.meta.current_page
        this.has_previous_page = res.data.links.prev
        this.has_next_page = res.data.links.next
        this.from = res.data.meta.from
        this.to = res.data.meta.to
        this.total = res.data.meta.total

        let response = res.data.data

        response.forEach(item => {
          let data = {
            'id': item.id,
            'date': item.date,
            'total': item.total,
            'user': item.user,
            'items': item.items,
          }

          this.orders.push(data)
        })
      })
    },
    submit() {
      let params = {
        date_start: this.date_start,
        date_end: this.date_end,
        client_name: this.client_name,
        minimum_value: this.minimum_value,
      }

      this.callApi(params)
    },
    setDate() {
      let date_start = this.date_start ? moment(this.date_start).format('DD/MM/YYYY') : ''
      let date_end = this.date_end ? moment(this.date_end).format('DD/MM/YYYY') : ''

      if(date_start != '' && date_end != '' && date_start > date_end) {
        this.error = 'Intervalo de datas inválido'

        return false
      } else {
        this.error = null
      }

      let params = {
        date_start: date_start,
        date_end: date_end,
        client_name: this.client_name,
        minimum_value: this.minimum_value,
      }

      this.callApi(params)
    },
    previousPage() {
      let params = {
        page: (this.page - 1),
        date_start: this.date_start,
        date_end: this.date_end,
        client_name: this.client_name,
        minimum_value: this.minimum_value,
      }

      this.callApi(params)
    },
    nextPage() {
      let params = {
        page: (this.page + 1),
        date_start: this.date_start,
        date_end: this.date_end,
        client_name: this.client_name,
        minimum_value: this.minimum_value,
      }

      this.callApi(params)
    },
    showModal(index) {
      this.$modal.show('order-modal', { order: this.orders[index] })
    }
  }
}
</script>