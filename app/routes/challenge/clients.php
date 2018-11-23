<?php

use \Challenger\Page;
use \Challenger\models\User;
use \Challenger\models\Client;

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