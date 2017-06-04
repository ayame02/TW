<?php
	
	header("Access-Control-Allow-Origin: *");

	define("__HOST__", "localhost");
	define("__USER__", "root");
	define("__PASS__", "");
	define("__BASE__", "database");

	date_default_timezone_set("Europe/Athens");

	class DB {
		private $con = false;
		private $data = array();


			// set up database connection
			public function __construct() {
				$this->con = new mysqli(__HOST__, __USER__, __PASS__, __BASE__);
				mysqli_set_charset($this->con,"utf8");
				if(mysqli_connect_errno()) {
					die("DB connection failed:" . mysqli_connect_error());
				}
			}

			public function getFriends() {
				$sql = "SELECT user_id,id,name,image FROM `friends` ORDER BY `name`";
				$qry = $this->con->query($sql);
				if($qry->num_rows > 0) {
					while($row = $qry->fetch_object()) {
						$this->data[] = $row;
					}
				} else {
					 $this->data[] = null;
				}

				$this->con->close();

				return $this->data;
			}

			public function getFriend($id) {
				$sql = "SELECT * FROM `friends` WHERE id=$id";
				$qry = $this->con->query($sql);
				if($qry->num_rows > 0) {
					while($row = $qry->fetch_object()) {
						$this->data[] = $row;
					}
				} else {
					 $this->data[] = null;
				}

				$this->con->close();

				return $this->data;
			}

		}