<?php
#	include_once 'app/controllers/URL_Controller.php';
#	$url = new URL();
#	echo $url->shorten('https://www.brainbell.com/tutorials/php/php7-oop-beginners.html');

	function customError($errno, $errstr) {
  		echo "<b>Error:</b> [$errno] $errstr";
	}

	//set error handler
	set_error_handler("customError");

	$filepath = __DIR__."/app/storage/database.txt";
	$data = 'HWINXP0=circlepanda.io'.PHP_EOL;
	$fp = fopen($filepath, 'a');
	fwrite($fp, $data);