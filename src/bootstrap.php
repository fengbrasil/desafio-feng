<?php

/*
 * dependencies configuration
 */
$container = $app->getContainer();

$container['database'] = function () {
	return new \Medoo\Medoo([
			    'database_type' => 'sqlite',
				'database_file' => __LOCAL__.'var/database.db',
				'charset'       => 'UTF-8',
				'logging'       => true,
			]);
};

$container['flash'] = function () { // Register flash messages
	return new \Slim\Flash\Messages();
};

$container['view'] = function ($c) { // Project's psr view handler 
	return new \SimpleView\SimpleView([
			'folder'   => __LOCAL__.'src/views',
			'base_url' => '/',
			'assets'   => [
				'js'        => ['/js/', '?curr='.uniqid()],
				'css'       => ['/css/', '?curr='.uniqid()],
				'vendor'    => '/assets/',
				'image'     => '/images/',
			],
		]);
};


/*
 *  Register providers
 */
$container['orders'] = function ($c) {
	return new \lib\Orders($c->database);
};
$container['items'] = function ($c) {
	return new \lib\Items($c->database);
};
$container['clients'] = function ($c) {
	return new \lib\Clients($c->database);
};

