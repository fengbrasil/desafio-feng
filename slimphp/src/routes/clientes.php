<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app->get('/api/clientes/',function(Request $request, Response $response){
    
    $sql = "SELECT * FROM clientes";

        try{
            $db = new DB();
            $db = $db->connect();
            $rada = $db->query($sql);
            $product = $rada->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            echo json_encode($product);
        }catch(PDOException $e){
            echo'{"error": {"text": '. $e->getMessage().'}';
        }
});