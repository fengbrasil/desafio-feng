<?php

//
session_start();


// Home page
$app->get('/', function ($request, $response, $args) {
	return $this->view->render($response, "home", $args);
});


// Login page
$app->get('/login', function($request, $response, $args){
	if (isset($_SESSION['user'])) // if user is already logged
		return $response->withHeader('Location', '/');
	return $this->view->render($response, "login", $args);
});


/*
 * Process login submission
 * (yet a hardcoded implementation)
 */
$app->post('/login', function ($request, $response, $args) {
	$_user = $_POST['user'];
	if ($_user['username'] == 'admin' && $_user['password'] == 'admin') { 
		$_SESSION['user'] = array(
			'name' => 'Admin', 'username' => 'admin', 'role' => 'admin'
		);
		$this->flash->addMessage('success', "Logado!");
		return $response->withHeader('Location', '/administration');
	} else {
		$this->flash->addMessage('error', "Usuário ou senha inválidos");
		return $response->withHeader('Location', '/login');
	}
});


// Logout action
$app->get('/logout', function($request, $response, $args){
	unset($_SESSION['user']);
	return $response->withHeader('Location', '/login');
});


// Administration routes
require_once "admin/main.php";


/*
 * Manages the "not found" page
 */
$container['notFoundHandler'] = function ($c) {
	return function ($request, $response) use ($c) {
		return $c->view->render($response->withStatus(404), "notfound");
	};
};

/*
 * Process flash messages
 */
$app->add(function ($request, $response, $next) {
	$this->view->set('flash_messages', $this->flash->getMessages());
	$response = $next($request, $response);
	return $response;
});

