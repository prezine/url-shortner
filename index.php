<?php
	include_once 'app/controllers/FILE_Controller.php';
	include_once 'app/controllers/URL_Controller.php';
	$url = new URL();
	// shorten URL
	$shortened_url = $url->shorten('https://www.brainbell.com/tutorials/php/php7-oop-beginners.html');
	// retrieve URL
	//$main_url = $url->retrieveURL($shortened_url);

	echo $shortened_url.PHP_EOL;
	//echo $main_url.PHP_EOL;