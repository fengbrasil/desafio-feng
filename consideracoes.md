* Na tabela de pedidos optei por utilizar uma coluna de tipo JSON para armazenar os itens e quantidades. Acredito que neste caso trabalhar com este formato é mais intuitivo do que utilizar relações, tabelas pivot...
* Utilizei o recurso do Laravel API Resourses para formatar a resposta JSON de acordo com o necessário no front-end. Dessa forma a lógica no front-end é simplificada.
* Utilizei paginação no servidor para evitar respostas muito grandes da API.
* Por estar utilizando paginação no servidor, optei por filtrar no back-end.
* Por estar utilizando paginação no servidor optei por incluir os detalhes de um pedido individual na resposta da coleção de pedidos. Achei desnecessário bater em um endpoint de pedido individual ao abrir o modal