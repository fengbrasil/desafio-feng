# Desafio FENG
 Este é um protótipo incompleto, feito apenas com o intuito de apresentação para a vaga de desenvolvedor,<br>
 o login é hardcoded, registros não são inseridos no banco e o gerenciamento não é o ideal.<br>
 Porém, é possível navegar em algumas telas e interagir nos formulários.<br>
 Tentei fazer o código bem "cru", o mais simples possível, com bibliotecas básicas, apenas para mostrar minha abordagem de código e padrões de projeto,
 as decisões tomadas não são viáveis para produção.<br>

#### Observações
 A aplicação foi desenvolvida contando com os recursos do PHP 7.2,
 a base de dados é SQLite, criada dinamicamente durante a execução.<br>
 Desenvolvi/depurei a aplicação com o servidor interno do PHP, porém, Apache também é suportado.<br>
 Para a parte de front-end, utilizei Typescript e Less para gerar os arquivos js e css finais.<br>
 A implementação do framework Vue.js foi apenas um incremento que achei ser interessante incluir ao projeto,
 sei que foi sugerido Angular, mas os conceitos podem ser portados.<br>

 Sobre o projeto, "base" da aplicação fica organizada no diretório `/src/`, tanto o front quanto o back-end.<br>
 Os arquivos fonte para o front-end, ficam em `src/client/` e são compilados para a pasta `/web/`,<br>
 a compilação é feita pelo Gulp, as dependências npm(package.js) são necessárias.<br>

 O banco de dados é gerado durante a primeira execução pelo script em `/web/setup.php`, sendo armazenado na pasta `/var/`.

#### Execução recomendada
No terminal, no diretório da aplicação, executar o comando: `php -S localhost:8080 -t web/`<br>

## Requerimentos
* PHP 7.2 ou superior 
* Caso use Apache, o mod_rewrite precisa estar ativado
* Caso use o servidor interno do PHP, o diretório raiz deve ser `/web/`
* O diretório `/var/` precisa ter as permissões de escrita liberadas
* As bibliotecas/dependências no composer.json são requeridas
* A aplicação presume que está localizada no endereço raiz (url base)

## Stack utilizado
* Back-end
	* PHP 7.2
	* Slim
	* Medoo
	* phpSimpleView *(biblioteca própria)*
* Front-end
	* HTML5
	* Require.js
	* Vue
	* Bootstrap3
* Build *(não necessários para a executar o app final)*
	* TypeScript
	* Less
	* Gulp



