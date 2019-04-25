### Desafio FullStack Fang

![](https://i.ibb.co/DtgBmst/Screenshot-from-2019-04-24-16-49-17.png)
![](https://i.ibb.co/tL6k1yB/Screenshot-from-2019-04-24-16-49-21.png)
![](https://i.ibb.co/VDPq6bx/Screenshot-from-2019-04-24-16-49-57.png)
![](https://i.ibb.co/G2sGQSF/Screenshot-from-2019-04-24-16-50-10.png)

-----------------------------------------------------------------------
### Front-End (React + Bootstrap)

O front-End é composto por 3 paginas

- Cadastro (Usuario, Email, Senha)
- Login (Usuario, Senha, Token Authentication)

- Tabela (Tabela_Modal)

-----------------------------------------------------------------------
Após o Login, é recebido um Token. Ele está sendo enviado para todas as requisicoes da API

Ao carregar a pagina, é enviado um resquest post ao local /api/pedidos. O Token estando autenticado pelo servidor, é respondido o com o Json proposto do Desafio

É feito uma funcão para organizar o json para ser inseridos na tabela.

  
----------------------------------------------------------------------- 
### Back-End (Node.js + Express)

És composto por 3 rotas

/login
/cadastro
/api/pedidos

- Login
Verificacão de Usuario e Senha + Geracao do Token + Armazenamento do Token para os futuros resquests

- Cadastro

Verificacão de usuario existe + Armazenamento do novo usuario

- Pedidos
Verificacão do token + resposta com Json pro front-end

----------------------------------------------------------------------- 

Decidir fazer apenas fazendo 1 requisicão do Json ao Back-end pois se trata de uma local onde a carga do Json não és pesada
Com isso, acaba aliviando um pouco o custo do servidor do que ficar fazendo resquests a cada momento a API

Decidir utilizar um token junto ao request por motivos de seguranca


----------------------------------------------------------------------- 
npm install (dentro da pasta do servidor)
npm install && npm run build (dentro da pasta front)

node server.js (dentro da pasta do servidor)

