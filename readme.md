# Desafio Feng

### Tecnologias

* PHP 7.2.11
* Laravel 5.7.27
* MySQL 5.7.23
* Node.js 10.12.0
* NPM 6.4.1
* Vue 2.6.6
* Materialize 1.0.0

### Funcionamento

Este projeto é separado em duas aplicações, um servidor Laravel na pasta `server` e um cliente Vue.js na pasta `client-vue`. O servidor contém endpoints com respostas em JSON que são consumidas pelo cliente através de requisições HTTP.

### Instalação

#### Servidor

1. Instalar as dependências PHP
`composer install`

2. Dar permissão de leitura e escrita nas pastas `storage` e `bootstrap/cache`

3. Popular o banco de dados com dados aleatórios
`php artisan migrate --seed`

4. Iniciar o servidor
`php artisan serve`
> Por padrão a porta utilizada será 8000 mas é possível customizar com o argumento `--port`.

### Cliente

1. Inserir o URL do servidor no arquivo `.env.production` propriedade `VUE_APP_API_URL`
> Ex: Se o seu servidor está rodando em http://127.0.0.1:8000 utilizar no `.env.production` `VUE_APP_API_BASE_URL="http://127.0.0.1:8000"`

2. Servir a aplicação cliente
> A pasta `dist` contém os arquivos estáticos prontos para funcionar em qualquer servidor HTTP. Para fim de testes deste projeto recomento o  [http-server](https://github.com/indexzero/http-server).