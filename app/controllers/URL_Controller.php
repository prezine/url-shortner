<?php
	/**
	 * 
	 */
	class URL extends FileHandler
	{
		// public $conn;
		public $baseurl; // e.g bit.ly
		public function __construct($conn = "", $baseurl = "http://127.0.0.1/url-shortner/")
		{
			// $this->conn = $conn;
			$this->baseurl = $baseurl;
		}
		public function generator($len) {
		    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $randString = '';
		    for ($i = 0; $i < $len; $i++) {
		        $randString .= $char[rand(0, strlen($char) - 1)];
		    }
		    return $randString;
		}
		public function shorten($url)
		{
			$generated = $this->generator(8);
			$formated_for_storage = $generated.'='.$url.PHP_EOL;
			if ($this->fileAuthor($formated_for_storage) > 0) {
				return $this->baseurl . $generated;
			} else {
				return "Ooops! Something went wrong, url cannot be shortened at the moment...";
			}
		}
		public function retrieveURL($search)
		{
			$min = substr($search, strrpos($search, '-') + 1);
			list($qwerty, $key) = explode("/", $min);
			$result = $this->fileSearcher(trim($key));
			list($crypt, $url) = explode("=", $result);
			return $result;
		}
	}