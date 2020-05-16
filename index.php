<?php
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;

$app = new Slim;

$app->config('debug', true);

$path = "app/routes/";

require_once($path."challenge/challenge.php");

$app->run();

?>