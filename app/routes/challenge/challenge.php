<?php
use \Challenger\Page;
use \Challenger\models\User;
use \Challenger\models\Client;
use \Challenger\models\Product;

$app->get("/", function() {

    User::verifyLogin();

    $page = new Page();
    $page->setTpl("index");

});

$app->get("/login", function() {

    $page = new Page([
        "header"=>false,
        "footer"=>false
    ]);
    $page->setTpl("login");

});

$app->post("/login", function() {

    User::login($_POST["login"], $_POST["password"]);
    
    header("Location: /");
    exit;
});

$app->get('/logout', function() {
    
    User::logout();

    header("Location: /login");
    exit;

});

$app->get("/produtos", function() {

    User::verifyLogin();

    $products = Product::listAll();

    $page = new Page();
    $page->setTpl("products", [
        'products' => $products
    ]);

});

$app->get("/produtos/novo", function() {

    User::verifyLogin();

    $page = new Page();
    $page->setTpl("products-create");

});

$app->post("/produtos/novo", function() {

    User::verifyLogin();

    $product = new Product;
    $product->setData($_POST);
    $product->save();

    echo 
    "<script>
        alert('Cadastro Realizado com Sucesso!');
        document.location=('/produtos');
    </script>";

    exit;

});

$app->get("/produtos/:idproduct", function($idproduct) {

    User::verifyLogin();

    $product = Product::get((int)$idproduct);

    $page = new Page();
    $page->setTpl("products-update", [
        'product' => $product
    ]);

});

$app->post("/produtos/:idproduct", function($idproduct) {

    User::verifyLogin();

    $product = new Product;
    $product->setidproduct((int)$idproduct);
    $product->setData($_POST);
    $product->update();

    echo 
    "<script>
        alert('Cadastro Atualizado com Sucesso!');
        document.location=('/produtos');
    </script>";

    exit;

});

$app->get("/produtos/apagar/:idproduct", function($idproduct) {

    User::verifyLogin();
    Product::delete((int)$idproduct);

    echo 
    "<script>
        alert('Cadastro Excluído com Sucesso!');
        document.location=('/produtos');
    </script>";

    exit;
});

$app->get("/clientes", function() {

    User::verifyLogin();

    $clients = Client::listAll();

    $page = new Page();
    $page->setTpl("clients", [
        'clients' => $clients
    ]);

});

$app->get("/clientes/novo", function() {

    User::verifyLogin();

    $page = new Page();
    $page->setTpl("clients-create");

});

$app->post("/clientes/novo", function() {

    User::verifyLogin();

    $client = new Client;
    $client->setData($_POST);
    $client->save();

    echo 
    "<script>
        alert('Cadastro Realizado com Sucesso!');
        document.location=('/clientes');
    </script>";

    exit;

});

$app->get("/clientes/:idclient", function($idclient) {

    User::verifyLogin();

    $client = Client::get((int)$idclient);

    $page = new Page();
    $page->setTpl("clients-update", [
        'client' => $client
    ]);

});

$app->post("/clientes/:idclient", function($idclient) {

    User::verifyLogin();

    $client = new Client;
    $client->setidclient((int)$idclient);
    $client->setData($_POST);
    $client->update();

    echo 
    "<script>
        alert('Cadastro Atualizado com Sucesso!');
        document.location=('/clientes');
    </script>";

    exit;

});

$app->get("/clientes/apagar/:idclient", function($idclient) {

    User::verifyLogin();
    Client::delete((int)$idclient);

    echo 
    "<script>
        alert('Cadastro Excluído com Sucesso!');
        document.location=('/clientes');
    </script>";

    exit;
});

$app->get("/pedidos", function() {

    User::verifyLogin();

    $page = new Page();
    $page->setTpl("requests");

});