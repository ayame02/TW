<?php
	header("Access-Control-Allow-Origin: *");
	
	define("username", "root");
	define("password" , "-");
	define("host", "localhost");
	define("database_name", "tw");
	
	class Database {
		private $mysql_con = false;
		private $data = array(); // datele ce vor fi preluate din DB
		private $Error;
		private $Row;
		private $user_data = array(); // datele despre user si parola
			
			public function __construct(){ 
				$this->result = 0;
				$this->Errno = 0;
				$this->Row = -1;
				$this->Error = '';
				$this->mysql_con = new mysqli(host, username, password, database_name);
				if(mysqli_connect_errno()) {
					die("Database error:" . mysqli_connect_error()); // a survenit o eroare la conexiunea cu baza de date
				}
			}
			
			public function __destruct () {
				if ($this->mysql_con) {
					mysqli_close ($this->mysql_con); // inchidem conexiunea
				}  
			}

			public function query ($q) {     
				$this->result = mysqli_query ($this->mysql_con, $q);     
				$this->Row = 0; 
				$this->Errno = mysqli_errno($this->mysql_con); 
				$this->Error = mysqli_error($this->mysql_con);     
				if (!$this->result) { 
					echo ("Bad SQL query: " . $q); 
					echo ($this->Error);
				}	
				return $this->result; 
			}

			public function next_record() { 
				$this->data = mysqli_fetch_array ($this->result); 
				$this->Row++;
				$this->Errno = mysqli_errno($this->mysql_con); 
				$this->Error = mysqli_error($this->mysql_con); 
				$stat = is_array ($this->data); // returnam inregistrarea gasita 
				if (!$stat) { // nu mai exista o alta inregistrare 
					mysqli_free_result ($this->result);
					$this->result = 0; 
				} 
				return $stat; 
			}
			
			public function users_check($id, $username){
				$sql = "select id, username from users where id = $id and username = $username";
				$result = mysqli_query($this->mysql_con, $sql);
				$user_data = mysqli_fetch_assoc ($result);
				echo $result;
				if ($user_data["id"] == $id and $user_data["username"] == $username)
					return 1;
				return 0;
			}
			
			public function username_check($username){
				$sql = "select username from users where username = $username";
				$result = mysqli_query($this->mysql_con, $sql);
				$user_data = mysqli_fetch_assoc ($result);
				echo $result;
				if ($user_data["username"] == $username)
					return 1;
				return 0;
			}
	}
?>
