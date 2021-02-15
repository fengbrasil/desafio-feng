# Considerações

* Optei por utilizar o Laravel + Vue pois é stack que estou mais familiarizado. Infelizmente o tempo para enviar a projeto foi curto e eu atualmente trabalho em outra empresa.

* Começei a desenvolver autentificação Oath2 com o pacote [Laravel Passport](https://laravel.com/docs/5.7/passport) mas tive que priorizar os requisitos não opcionais do projeto.

* Na tabela de pedidos optei por utilizar uma coluna de tipo JSON para armazenar os itens e quantidades. Acredito que neste caso trabalhar com este formato é mais intuitivo do que utilizar relações, tabelas pivot...

* Utilizei o recurso [Laravel API Resourses](https://laravel.com/docs/5.7/eloquent-resources) para formatar a resposta JSON de acordo com o necessário no front-end. Dessa forma a lógica no front-end é simplificada.

* Utilizei paginação no servidor para evitar respostas muito grandes da API.

* Por estar utilizando paginação no servidor, optei por filtrar no back-end.
 
* Por estar utilizando paginação no servidor optei por incluir os detalhes de um pedido individual na resposta da coleção de pedidos. Achei desnecessário bater em um endpoint de pedido individual ao abrir o modal.

* Utilizei o framework [Materialize](https://materializecss.com/) que usa componentes do [Material Design](https://material.io/). Acho o design mais bonito que o [Bootstrap](https://getbootstrap.com/), apesar de achar que o último é melhor para programar (o fato da comunidade ser maior facilita bastante).