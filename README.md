# Desafio FENG

   # Banco de Dados e Currículo na Pasta desafio-feng

Stack Utilizado

   *Back-end*
   * PHP
      * Frameworks Slim
      * RainTPL
      * MVC (Não cheguei a criar controllers em virtude do Vue.js);

   * Banco de dados:
      * MySQL
   
   *Front-end*
   * Material: Admin LTE
   * Javascript
      * JQUERY (Apenas para algumas requisições em AJAX, Filtros de Formulário)
      * Vue.js (Duas Aplicações)

   # Vue.js
      * Similaridade e Performance ao Angular;
      * Agilidade/Velocidade na Implementação dos Filtros de Data, Nome e Valor Mínimo na Área de Pedidos (requests.app.js);
      * Aplicação de geração de Pedidos dinâmica (resquests.modal.js);

   OBS.: Era possível ter feito o projeto inteiro em Angular e IONIC, mas optei em demonstrar conhecimentos em BackEnd (MVC, PHP7, Autenticação, CRUD);
   * Não implementado (Pois terei um compromisso hoje e só poderei retomar na Segunda):
      * Alterar Senha, Recuperar Senha, Alterar Perfil (dados e foto);
      * Remover Pedido, Editar Pedido;

   * DEIXEI UM BANCO DE DADOS RODANDO NO SERVIDOR E OS DADOS SALVOS NO PROJETO (NÃO É SEGURO FAZER ISSO MAS QUIS AGILIZAR OS TESTES).
      * Para Testar:
         * composer install
         * Na Raiz do Projeto: php -S localhost:8888 (Ou porta de preferência, PHP 7.0 ou Superior);
         * Usuário: admin / senha: 12348765
