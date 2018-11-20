<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/api/pedidos/',function(Request $request, Response $response){

    $pedidos = $response->withHeader('Content-type', 'application/json');
    $pedidos = $response->withHeader('Access-Control-Allow-Origin', '*');
    $nomeItens = [];
    $sql = "SELECT idPedido,data ,GROUP_CONCAT(produtos.nome SEPARATOR ', ' ) as itens,clientes.nome as clienteNome FROM `pedidos` 
            INNER JOIN produtos on FIND_IN_SET(idProduto, itens)
            INNER JOIN clientes on FIND_IN_SET(idCliente, cliente)";

        try{
            $db = new DB();
            $db = $db->connect();
            $pedido = $db->query($sql);
            $pedido = $pedido->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            //echo json_encode($pedido);
            $pedidos = $pedidos->withJson($pedido);
            return $pedidos;
        }catch(PDOException $e){
            echo'{"error": {"text": '. $e->getMessage().'}';
        }

            foreach($pedido as &$p)
            {
                $itens = $p->itens.split(',');
                
                foreach($itens as &$item){
                    echo $item;
                    $nomeItens.push($item);
                }
            }
        //echo json_encode($nomeItens);
        //echo json_last_error_msg();
    });

//Get a Product
$app->get('/api/pedidos/{id}',function(Request $request, Response $response){

    $id = $request->getAttribute('id');

    $response = $response->withHeader('Content-type', 'application/json');
    $response = $response->withHeader('Access-Control-Allow-Origin', '*');

    $sql = "SELECT produtos.nome as produtoNome, produtos.descricao as produtoDescricao, 
            COUNT(idProduto) as produtoQuantidade, produtos.valor as produtoValor
            FROM `pedidos`
            INNER JOIN produtos on FIND_IN_SET(idProduto, itens)
            WHERE idPedido = $id
            GROUP BY produtos.idProduto";

    $sqlCliente = "SELECT idPedido, clientes.nome as clienteNome, clientes.email as clienteEmail, clientes.telefone as clienteTelefone
                    FROM pedidos
                    INNER JOIN clientes on FIND_IN_SET(idCliente, cliente)
                    WHERE idPedido = $id";
        try{
            $db = new DB();
            $db = $db->connect();
            $pedidos = $db->query($sql);
            $pedidos = $pedidos->fetchAll(PDO::FETCH_OBJ);
            $db = null;
        }catch(PDOException $e){
            echo'{"error": {"text": '. $e->getMessage().'}';
        }

        try{
            $db = new DB();
            $db = $db->connect();
            $cliente = $db->query($sqlCliente);
            $cliente = $cliente->fetch(PDO::FETCH_OBJ);
            $db = null;
        }catch(PDOException $e){
            echo'{"error": {"text": '. $e->getMessage().'}';
        }
        
        $cliente->pedidos=$pedidos;
        $response = $response->withJson($cliente);
        return $response;
});