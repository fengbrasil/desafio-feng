# Desafio FENG

** Para mockar o backend eu utilizei o json-server, é necessario rodar um json-server --watch pedidos.json para popular a grid.

* Optei por utilizar a librarie do KendoUI Grid, por ser robusta e entregar o necessário de forma ágil e dinâmica.
* Os filtros eu escolhi deixar fazer parte da grid, pois pareceu mais amigavél a visualização.
* Utilizei o bootstrap 4 e alguns inputs do Material também.

*Mesmo que você não consiga concluir o desafio, não deixe de criar o pull-request.*

## Requerimentos

* É necessário descrever sua solução e o que te levou a tomar as decisões
* O sistema deve ser responsivo
* A página é composta pelos elementos abaixo:
   * Seção de filtros (Datas de início e fim, valor e nome do cliente).
   * Lista dos pedidos filtrados
   * Modal exibindo as informações do pedido e dados do cliente
![UI](https://feng.devteam.rocks/wireframe-dev.png)
* As informações de clientes são:
   * id
   * nome
   * e-mail
   * telefone
* As informações dos itens são:
   * id
   * nome
   * descrição
   * valor unitário
* As informações dos pedidos são:
   * id
   * data
   * itens
   * cliente

## Dicas

* Controle de acesso (login) não é obrigatório mas desejável
* É permito o uso dos frameworks visuais Bootstrap e Material. Uma interface customizada será bem vista.

## Stack desejável

*Back-end*
* PHP
  * Frameworks Slim ou Laravel
* NodeJS
  * Framework Express.js
* Banco de dados:
   * MySQL
   * PostgreSQL
   * Redis

*Front-end*
* HTML5
* CSS / SASS
* Javascript
  * Angular 6 / Ionic 3

