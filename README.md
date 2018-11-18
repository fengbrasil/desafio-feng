## Tecnologias
Para codar o desafio foi usado o Laravel (5.7.13) no backend. Já no front bootstrap (que já vem junto ao Laravel) com jquery. No banco de dados o banco MySQL foi e o escolhido.

## Como funciona?
O sistema é um controle de fluxo de pedidos de um restaurante, podendo o usuário criar pedidos e ver detalhes do mesmo.

## O que faltou?
1. Infelizmente me toquei tarde demais que não tiha feito um sistema de cadastro de cliente, e adicionei apenas 2 para ficar testando o sistema.

2. A questão da quantidade por cada item eu a primeira vista fiz mas com uma analise mais profunda achei gambiarrenta (a quantidade estava junto na tabela do relacionamento n:n pedido_produto) e então resolvi tirar essa implementação e não deu tempo de rever essa questão.

## Conclusão
Temos um sistema de cadastro e controle de pedidos, responsivo, exige usuário e senha para que possa mexer no sistema.
Se tivesse mais tempo faria o cadastro de clientes, adicionaria a quantidade para cada item(tomando cuidado para que o código ficasse o mais semântico possível). Gostaria também de fazer um sistema de cadastro de pedidos para os clientes, com um cardápio virtual, podendo escolher pelo seu celular. Mas ao pensar nisso surgiu alguns problemas (Se um engraçadinho fizesse um pedido pelo wifi do restaurante apenas por brincadeira?) que precisariam ser bem trabalhados.