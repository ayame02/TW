<?php
	header("Access-Control-Allow-Origin: *");
	
	define("username", "root");
	define("password" , "-");
	define("host", "localhost");
	define("database_name", "tw");
	
	class Database {
		private $mysql_con = false;
		private $data = array();
			
			public function __construct(){
				$this->mysql_con = new mysqli(host, username, password, database_name);
				if(mysqli_connect_errno()) {
					die("Database error:" . mysqli_connect_error());
				}
			}
	}
?>
