var request = new Vue({
    el: '#request',
    created(){
        if (document.querySelector('#idrequest')) this.idrqt = document.querySelector('#idrequest').value;
        this.addProducts();
    },
    data: {
        rqtDB: [],
        rqtcart: [],
        rqtproducts: [],
        rqtproductsValt: [],
        productSearch: '',
        totalPedido: 0,
        idrqt: ''
    },
    methods:{
       
        saveRequest()
        {
           if (this.rqtcart.length > 0)
            {         
                let payload = {idrequest: this.idrqt, cart: JSON.stringify(this.rqtcart)};
                let url = `/requests/save`;   
                let form = document.createElement('form');
                form.style.visibility = 'hidden'; 
                form.method = 'POST';
                form.action = url;
                for (const key in payload) {
                    let input = document.createElement('input');
                    input.name = key;
                    input.type = 'text'
                    input.value = payload[key];
                    form.appendChild(input);
                }
                
                document.body.appendChild(form);
                form.submit();
           } else {
               alert("Selecione pelo menos um Produto para finalizar o pedido");
           }
        },
        
        addProducts(show = true, read = false)
        {
            if (this.rqtproducts.length == 0)
            {
                let products = [];
                this.$http.get('/products/getAll')
                    .then(res => {
                        res.body.forEach(e => {
                            products.push({
                                idproduct: e.idproduct,
                                product: e.product,
                                desproduct: e.desproduct,
                                vlprice: e.vlprice,
                                qtd: 1
                            });
                        });
                    
                        if (read)
                        {
                            this.rqtDB.forEach(e => {
                                products.forEach(i => {
                                    if (i.idproduct == e.idproduct)
                                    {
                                        i.qtd = e.nrqtd;
                                        this.addProduct(i);
                                    }
                            });
                            
                            });
                        }
                    this.rqtproducts = products;
                    this.rqtproductsValt = products.slice(0);
                }, res => {
                });
            }
            
        },
        addProduct(item)
        {
            if (this.rqtcart.length == 0)
            {
                this.rqtcart.push(item);
            } else {
                let filter = this.rqtcart.filter(i => {
                    return (i.idproduct.toLowerCase().indexOf(item.idproduct.toLowerCase()) > -1);
                });
                filter.length > 0 ? alert('Produto já adicionado ao pedido') : this.rqtcart.push(item);
            }
        },
        removeProduct(item)
        {
            let index = this.rqtcart.indexOf(item);
            var r = confirm("Tem certeza que deseja Remover esse Produto do Pedido?");
            if (r == true)  this.rqtcart.splice(index, 1);
        },
        searchProducts() {
            
            let val = this.productSearch;

            if (val && val.trim() != '') {
                this.rqtproducts = this.rqtproducts.filter((item) => {
                    let result = (item.product.toLowerCase().indexOf(val.toLowerCase()) > -1);
                    if (!result) {
                       let result = (item.desproduct.toLowerCase().indexOf(val.toLowerCase()) > -1);
                       return result;
                    } else {
                       return result;
                    }
                })

            } else {
                this.rqtproducts = [];
                this.rqtproductsValt.forEach(element => {
                    this.rqtproducts.push(element);
                });
            }
        },
        setQtd(item, type = true)
        {     
            if (type)
            {
                item.qtd++
            } else {
                if (item.qtd > 1) qtd = item.qtd--;
            }
        },
        subtotal: function(item, qtd)
        {
            return this.$options.filters.trataValor(item * qtd);
        },
       
    },
    computed: {
        
        calculaTotal()
        {
            this.totalPedido = 0;
            if (this.rqtcart.length > 0)
            {
                this.rqtcart.forEach(i => {
                    this.totalPedido = this.totalPedido + (parseFloat(i.vlprice) * parseInt(i.qtd));
                });
            }
            return this.totalPedido.toFixed(2);
        },
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
            if (valor) {
                let date = new Date(valor);
                return date.toLocaleDateString('pt-BR');
            } 
        }
    }
    });