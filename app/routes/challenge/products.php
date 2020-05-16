<?php

use \Challenger\Page;
use \Challenger\models\User;
use \Challenger\models\Product;

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

$app->get("/products/getAll", function() {

    $products = Product::listAll();

    echo json_encode($products);

    exit;

});