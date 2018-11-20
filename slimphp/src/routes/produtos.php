<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/api/produtos/',function(Request $request, Response $response){

    $produtos = $response->withHeader('Content-type', 'application/json');
    $produtos = $response->withHeader('Access-Control-Allow-Origin', '*');
    
    $sql = "SELECT * FROM produtos";

        try{
            $db = new DB();
            $db = $db->connect();
            $produto = $db->query($sql);
            $produto = $produto->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            
            $produtos = $produtos->withJson($produto);
            return $produtos;
        }catch(PDOException $e){
            echo'{"error": {"text": '. $e->getMessage().'}';
        }
});

//Get a Product
$app->get('/api/produtos/{id}',function(Request $request, Response $response){
    
    $id = $request->getAttribute('id');
    
    $produtos = $response->withHeader('Content-type', 'application/json');
    $produtos = $response->withHeader('Access-Control-Allow-Origin', '*');

    $sql = "SELECT * FROM produtos WHERE idProduto = $id";

        try{
            $db = new DB();
            $db = $db->connect();
            $produto = $db->query($sql);
            $produto = $produto->fetchAll(PDO::FETCH_OBJ);
            $db = null; 
            $produtos = $response->withJson($produto);
            return $produtos;
        }catch(PDOException $e){
            echo'{"error": {"text": '. $e->getMessage().'}';
        }
});

$app->post('/api/produtos/add',function(Request $request, Response $response){
    
    $produto = $response->withHeader('Content-type', 'application/json');
    $nome = $request->getParam('nome');
    $descricao = $request->getParam('descricao');
    $preco = $request->getParam('valor');

    $sql = "INSERT INTO `produtos` 
            (`idProduto`, `nome`, `descricao`, `valor`)
            VALUES ('null',:nome,:descricao,:valor)";   

     
        try{
            $db = new DB();
            $db = $db->connect();

            $stmt = $db->prepare($sql);

            $stmt-> bindParam(':nome',$nome);
            $stmt-> bindParam(':descricao',$descricao);
            $stmt-> bindParam(':valor',$preco);

            $stmt->execute();
            $produto = $response->getBody()->write('Produto cadastrado');
            return $produto;

        }catch(PDOException $e){
            echo'{"error": {"text": '. $e->getMessage().'}';
        }
});

//Edit a Product 
$app->post('/api/produtos/edit/{id}',function(Request $request, Response $response){
   
    $id = $request->getAttribute('id');
    $nome = $request->getParam('nome');
    $descricao = $request->getParam('descricao');
    $preco = $request->getParam('valor');

    $sql = "UPDATE `produtos` SET nome=:nome, descricao = :descricao, valor=:valor WHERE idProduto=:id";
        try{
            $db = new DB();
            $db = $db->connect();

            $stmt = $db->prepare($sql);
            $stmt-> bindParam(':id',$id);
            $stmt-> bindParam(':nome',$nome);
            $stmt-> bindParam(':descricao',$descricao);
            $stmt-> bindParam(':valor',$preco);
            $stmt->execute();
            $produto = $response->getBody()->write('Produto editado');
            return $produto;

        }catch(PDOException $e){
            echo'{"error": {"text": '. $e->getMessage().'}';
        }
});
$app->post('/api/produtos/delete/{id}',function(Request $request, Response $response){
   
    $id = $request->getAttribute('id');

    $sql = "DELETE FROM `produtos`WHERE idProduto=:id";
        try{
            $db = new DB();
            $db = $db->connect();

            $stmt = $db->prepare($sql);
            $stmt-> bindParam(':id',$id);
            $stmt->execute();
            $produto = $response->getBody()->write('Produto deletado');
            return $produto;    

        }catch(PDOException $e){
            echo'{"error": {"text": '. $e->getMessage().'}';
        }
});
