# Desafio Feng

### Tecnologias

* Node.js 10.12.0
* Express 4.16.4
* PostgreSQL 11.2
* NPM 6.4.1
* Angular 7.3.3
* Bootstrap 4.3

### Funcionamento

Este projeto é separado em duas aplicações, um servidor Node.js na pasta `server` e um cliente Angular na pasta `client`. O servidor contém endpoints com respostas em JSON que são consumidas pelo cliente através de requisições HTTP.

### Instalação

#### Servidor

1. Instalar as dependências Node.js
`npm install`

1. Importar o banco de dados
> Criar um banco denomidado `desafio_feng` e importar o arquivo  `database/dumps/desafio_feng.sql`

2. Iniciar o servidor
`npm run start`
> Irá iniciar o servidor em `http://localhost:8080`

### Cliente

1. Servir a aplicação cliente
> A pasta `dist` contém os arquivos estáticos prontos para funcionar em qualquer servidor HTTP. Para fim de testes deste projeto recomento o [http-server](https://github.com/indexzero/http-server).