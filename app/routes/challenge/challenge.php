<?php
use \Challenger\Page;
use \Challenger\models\User;

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

require_once ('products.php');
require_once ('clients.php');
require_once ('requests.php');