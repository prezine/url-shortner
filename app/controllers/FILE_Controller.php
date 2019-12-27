<?php
	/**
	 * 
	 */
	class FileHandler
	{
		public $filepath;
		public function __construct($filepath = __DIR__."/../storage/database.txt")
		{
			$this->filepath = $filepath;
		}
		public function fileReader()
		{
			$filepath = $this->filepath;
			$textDatabase = fopen($filepath, "r") or die("Unable to open file!");
			return fgets($textDatabase);
			fclose($textDatabase);
		}
		public function fileAuthor($shortcrypt, $url)
		{
			$filepath = $this->filepath;
			$data = $shortcrypt.'='.$url.PHP_EOL;
			$fp = fopen($filepath, 'a');
			fwrite($fp, $data);
		}
		public function fileSearcher($url)
		{
			$filepath = $this->filepath;
			$search = 'XgS0s09DI';
			$lines = file($filepath);
			foreach($lines as $line)
			{
				if(strpos($line, $search) !== false)
					return $line;
				else 
					return 404;
			}
		}
	}