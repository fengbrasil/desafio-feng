## Tecnologias
Para codar o desafio foi usado o Laravel (5.7.13) no backend. J� no front bootstrap (que j� vem junto ao Laravel) com jquery. No banco de dados o banco MySQL foi e o escolhido.

## Como funciona?
O sistema � um controle de fluxo de pedidos de um restaurante, podendo o usu�rio criar pedidos e ver detalhes do mesmo.

## O que faltou?
1. Infelizmente me toquei tarde demais que n�o tiha feito um sistema de cadastro de cliente, e adicionei apenas 2 para ficar testando o sistema.

2. A quest�o da quantidade por cada item eu a primeira vista fiz mas com uma analise mais profunda achei gambiarrenta (a quantidade estava junto na tabela do relacionamento n:n pedido_produto) e ent�o resolvi tirar essa implementa��o e n�o deu tempo de rever essa quest�o.

## Conclus�o
Temos um sistema de cadastro e controle de pedidos, responsivo, exige usu�rio e senha para que possa mexer no sistema.
Se tivesse mais tempo faria o cadastro de clientes, adicionaria a quantidade para cada item(tomando cuidado para que o c�digo ficasse o mais sem�ntico poss�vel). Gostaria tamb�m de fazer um sistema de cadastro de pedidos para os clientes, com um card�pio virtual, podendo escolher pelo seu celular. Mas ao pensar nisso surgiu alguns problemas (Se um engra�adinho fizesse um pedido pelo wifi do restaurante apenas por brincadeira?) que precisariam ser bem trabalhados.