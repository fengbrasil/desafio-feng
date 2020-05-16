var filter = new Vue({
    el: '#appFilter',
    created(){
        this.getList();
    },
    data: {
        requestList: [],
        requestDB: null,
        dateStart: null,
        dateEnd: null,
        clientName: '',
        minValue: 0.00
    },
    methods:{
       
        getList()
        {
            let list = [];
            this.$http.get('/requests/getAll')
                .then(res => {
                    res.body.forEach(e => {
                        list.push({
                            idrequest: e.idrequest,
                            dt_request: e.dt_request,
                            desclient: e.desclient,
                            vltotal: e.vltotal,
                            vlfilter: parseFloat(e.vltotal.replace('.','').replace(',','.'))
                        });
                    });
                this.requestList = list;
                this.requestDB = list.slice(0);
            }, res => {
            });
        },
        showModal(id)
        {
            $('.modalResult').remove();

            let link = 'request/';

            $.ajax({
                url: '/' + link + id,
                cache: false,
                success: function(data){
                    $('.modal-content').append('<div class="modalResult">' + data + '</div>');
                }
            });
            
            $('#generalModal').modal('show');
        },
        filterDate()
        {
            if (this.dateStart != null && this.dateEnd != null)
            {
                let startDate = new Date(this.dateStart);
                let endDate = new Date(this.dateEnd);

                if (startDate < endDate)
                {
                    this.requestList = this.requestDB.filter(a=>{
                        a.dt_request = a.dt_request.split(' ');
                        a.dt_request = a.dt_request[0];
                        let date = new Date(a.dt_request);
                        return (date >= startDate && date <= endDate);
                    });
                } else {
                    alert('A Data de Término deve ser menor que a Data de Início')
                }
            } else {
                return false;
            }
        },
        filterName()
        {
            let val = this.clientName;

            if (val && val.trim() != '') {
                
                let filter = this.requestList.filter(a=>{
                    return (a.desclient.toLowerCase().indexOf(val.toLowerCase()) > -1);
                });

                if (filter.length > 0)
                {
                    this.requestList = filter;
                } else {
                    alert('Nenhum Pedido Encontrado');
                }
            } else {
                this.requestList = this.requestDB.slice(0);
                this.filterDate();
            }
        },
        filterMinValue()
        {
            let val = parseFloat(this.minValue);

            if (val > 0)
            {
                let filter = this.requestList.filter(a=>{
                    return (a.vlfilter >= val && val <= a.vlfilter);
                });
                if (filter.length > 0)
                {
                    this.requestList = filter;
                } else {
                    alert('Nenhum Pedido Encontrado');
                }
            } else {
                this.requestList = this.requestDB.slice(0);
                this.filterDate();
                this.filterName();
            }
        }
       
    },
    computed: {
        
        
    },
    filters: 
    {
        formatPrice: function (value){
            return parseFloat(value).toLocaleString('pt-BR',{
                minimumFractionDigits: 2,  
                maximumFractionDigits: 2
            });
        },
        formatDate: function (value) {
            if (value) {
                let date = value.split(' ');
                date = new Date(date[0]);
                return date.toLocaleDateString('pt-BR', {timeZone: 'UTC'});
            } 
        },
        formatId: function (value) {
            if (value) {
                return `#${("000" + value).slice(-3)}`;
            }
        },
    }
    });