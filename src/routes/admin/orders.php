<?php

// Orders page
$this->get('/orders', function($request, $response, $args){
	$orders = $this->orders->select([]);
	$this->view->set('orders', $orders);
	return $this->view->render($response, "orders", $args);
});

// Orders list API
$this->get('/api/orders', function($request, $response, $args){
	$orders = array();
	foreach (($this->orders->select([]))() as $order)
		$orders[] = $order;
	return $this->response->withJson($orders);
});

// Single order request API
$this->get('/api/order/{id}', function($request, $response, $args){
	$order = $this->orders->get($args['id']);
	return $this->response->withJson($order);
});

