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
		public function fuse($url)
		{
			$baseurl = $this->baseurl;
			return $baseurl . $url ;
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
			// return $this->generator(8);
			//return $this->fuse($url);
			return $this->fileReader(__DIR__."/../storage/database.txt"); 
		}
	}