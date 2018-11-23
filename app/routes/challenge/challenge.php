<?php
use \Challenger\Page;
use \Challenger\models\User;
use \Challenger\models\Client;
use \Challenger\models\Product;
use \Challenger\models\Request;

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

    $requests = Request::listAll();

    echo json_encode($requests);

    exit;

});

$app->get("/products/getAll", function() {

    $products = Product::listAll();

    echo json_encode($products);

    exit;

});

