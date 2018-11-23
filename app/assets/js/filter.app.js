var filter = new Vue({
    el: '#appFilter',
    created(){

        this.getList();
        console.log(this.list, this.requestDB)
    },
    data: {
        requestList: [],
        requestDB: null
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
                            desclient: e.desclient
                        });
                    });
                console.log(list);
                    
                this.requestList = list;
                this.requestDB = list.slice(0);
            }, res => {
            });
            
        }
       
    },
    computed: {
        
        
    },
    filters: 
    {
        trataValor: function (valor){
            return parseFloat(valor).toLocaleString('pt-BR',{
                minimumFractionDigits: 2,  
                maximumFractionDigits: 2
            });
        },
        trataData: function (valor) {
            console.log(valor); return false;
            if (valor) {
                let date = new Date(valor[0]);
                return date.toLocaleDateString('pt-BR');
            } 
        }
    }
    });