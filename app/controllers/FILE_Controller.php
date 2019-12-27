<?php
	/**
	 * 
	 */
	class FileHandler
	{
		private $filepath = __DIR__."/../storage/database.txt";
		public function fileReader()
		{
			$filepath = $this->filepath;
			$textDatabase = fopen($filepath, "r") or die("Unable to open file!");
			return fgets($textDatabase);
			fclose($textDatabase);
		}
		public function fileAuthor($data)
		{
			$filepath = $this->filepath;
			$fp = fopen($filepath, 'a');
			return fwrite($fp, $data);
			fclose($fp);
		}
		public function fileSearcher($search)
		{
			$filepath = $this->filepath;
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