<?php
/**
 * Project functions
 */



/**
 * For debugging
 * wrapp a debug valeu around "pre" tags
 */
function _pre ($val, $die=true)
{
	echo "<pre>\n", print_r($val, true), "\n</pre>";
	if ($die) die();
}




