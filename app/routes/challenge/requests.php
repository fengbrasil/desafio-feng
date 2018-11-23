<?php

use \Challenger\Page;
use \Challenger\models\User;
use \Challenger\models\Client;
use \Challenger\models\Product;
use \Challenger\models\Request;

$app->get("/pedidos", function() {

    User::verifyLogin();
    $requests = Request::listAll();

    $page = new Page();
    $page->setTpl("requests",[
        'requests' => $requests
    ]);

});

$app->get("/pedidos/novo", function() {

    User::verifyLogin();

    $idclient = (int)$_GET['id'];

    $request = Request::start($idclient);

    $client = Client::get($idclient);
    $products = Product::listAll();

    $page = new Page();
    $page->setTpl("requests-create", [
        'idrequest' => $request,
        'client' => $client,
        'products' => $products
    ]);

});

$app->get("/request/new", function() {

    User::verifyLogin();

    $clients = Client::listAll();

    $page = new Page([
        'header' => false,
        'footer' => false
    ]);
    $page->setTpl("request-start",[
        'clients' => $clients
    ]);

});

$app->get("/request/:idrequest", function($idrequest) {

    User::verifyLogin();

    $request = Request::get((int)$idrequest);

    $page = new Page([
        'header' => false,
        'footer' => false
    ]);
    $page->setTpl("request-view",[
        'request' => $request
    ]);

});

$app->post("/requests/save", function() {

    User::verifyLogin();
    $request = new Request;
    $request->setData($_POST);
    $request->save();

    echo 
    "<script>
        alert('Pedido Efetuado com Sucesso!');
        document.location=('/pedidos');
    </script>";

    exit;

});

$app->get("/requests/getAll", function() {

    User::verifyLogin();

    $requests = Request::listAll();

    echo json_encode($requests);

    exit;

});