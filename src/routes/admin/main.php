<?php

/*
 * namespace for administration routes 
 */
$app->group('/administration', function(){
	// Index / Dashboard
	$this->get('[/]', function($request, $response, $args){
		return $this->view->render($response, "dashboard", $args);
	});

	//
	require "orders.php";
})
->add(function ($request, $response, $next) {

	// setup admin's views folder
	$this->view->config('folder', $this->view->config('folder').'/admin');

	/*
	 * ensures that only authenticated users have access to the admin area 
	 */
	if (!isset($_SESSION['user'])){
		$this->flash->addMessage('error', 'Acesso negado!');
		return $response->withHeader('Location', '/login');
	}

	return $next($request, $response);
});



