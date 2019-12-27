<?php
	/**
	 * 
	 */
	class Troubleshooter
	{
		public function checkPermission($dir)
		{
			return decoct(fileperms($dir) & 0777);
		}
	}