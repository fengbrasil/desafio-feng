<?php

/* Instantiate the app with defined settings */
$app = new \Slim\App(['settings' => array(
		'displayErrorDetails' => true, // set to false in production
		'addContentLengthHeader' => false, // Allow the web server to send the content-length header
	)]);

/* functions */
require_once "functions.php";

/* */
require_once "bootstrap.php";

/* Route files */
require_once "routes/main.php";

//
require_once __LOCAL__.'web/setup.php';

// Run app
$app->run();
