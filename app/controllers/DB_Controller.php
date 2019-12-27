<?php
	/**
	 * 
	 */
	class Database
	{
		public $conn;
		public function __construct($conn)
		{
			$this->conn = $conn;
		}
		public function getValues($data = '')
		{
			$conn = $this->conn;
			$values = array();
			foreach($data as $dt => $d) {
			    $values[] = mysqli_real_escape_string($conn, $d);
			}
			$x = (string)json_encode($values);
			$x = str_replace("\"", "'", $x);
			return trim($x, '[]');
		}
		public function getRows($data = '')
		{
			$conn = $this->conn;
			$rows = array();
			foreach($data as $dt => $d) {
			    $rows[] = mysqli_real_escape_string($conn, $dt);
			}
			$x = (string)json_encode($rows);
			$x = str_replace("\"", "`", $x);
			return trim($x, '[]');
		}
		public function insert($table = '', $data)
		{
			$insert = "INSERT INTO $table (". $this->getRows($data) .") VALUES (". $this->getValues($data) .")";
			return ($this->query($insert)) ? 200 : $this->error() ;
		}
		public function select($query = '', $json = false, $fetchAll = false)
		{
			if ($req = $this->query($query)) {
				if ($fetchAll == true) {
					return ($json == true) ? json_encode($this->fetchAll($req)) : $this->fetchAll($req);
				} else {
					return ($json == true) ? json_encode($this->fetch($req)) : $this->fetch($req);
				}
			} else {
				return $this->error();
			}
		}
		public function update($query = '')
		{
			return ($this->query($query)) ? 200 : $this->error() ;
		}
		public function delete($query = '')
		{
			return ($this->query($query)) ? 200 : $this->error() ;
		}
		public function query($query = '')
		{
			$conn = $this->conn;
			return mysqli_query($conn, $query);
		}
		public function lastID()
		{
			$conn = $this->conn;
			return mysqli_insert_id($conn);
		}
		public function numRow($query = '')
		{
			return mysqli_num_row($query);
		}
		public function fetch($query = '')
		{
			return mysqli_fetch_assoc($query);
		}
		public function fetchAll($query = '')
		{
			return mysqli_fetch_all($query);
		}
		public function error()
		{
			$conn = $this->conn;
			return mysqli_error($conn);
		}
		public function count($query = '', $row = '', $json = false)
		{
			$res = $this->select($query, false);
			return ($res[$row] == NULL || $res[$row] == "") ? 0 : $res[$row] ;
		}
		public function sum($value='')
		{
			$res = $this->select($query, false);
			return ($res[$row] == NULL || $res[$row] == "") ? 0 : $res[$row] ;
		}
	}