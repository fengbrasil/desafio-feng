<?php
/**
 * index file
 * All http requests must be redirected to this script file, in order to be properly routed
 */

// directory separator shortcut
if (!defined('DS'))
	define('DS', DIRECTORY_SEPARATOR);

// APP DIR
if (!defined('__LOCAL__'))
	define('__LOCAL__', dirname(__DIR__).DS);

// VAR DIR
if (!defined('__VAR__'))
	define('__VAR__', __LOCAL__.'var'.DS);

// define the default temp folder
if (!defined('__TEMP__'))
	define('__TEMP__', __VAR__.'temp'.DS, true);
	//define('__TEMP__', sys_get_temp_dir().DS, true);


//
ini_set('log_errors', 1);
ini_set('error_log', __VAR__.'error.log');

//
require_once __LOCAL__.'vendor/autoload.php';

//
require_once __LOCAL__.'src/app.php';




