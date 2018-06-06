<?php

define( 'WPINC', 'wp-includes' );
define( 'ABSPATH', __DIR__ . '/src/');

// register the Requests 
spl_autoload_register(function ($class) {
	// Check that the class starts with "Requests"
	if (strpos($class, 'Requests') !== 0) {
		return;
	}

	$file = str_replace('_', '/', $class);
	if (file_exists(ABSPATH . WPINC . '/' . $file . '.php')) {
		require_once(ABSPATH . WPINC . '/' . $file . '.php');
	}
});