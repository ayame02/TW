<?php
	$username = 'sql11177351';
	$password = '7guNN2hJY4';
	$connection_string = 'sql11.freemysqlhosting.net';
	$database_name = ' 	sql11177351';
	try{
		$connection = new PDO( 'mysql:host=sql11.freemysqlhosting.net', 'sql11177351', '7guNN2hJY4');
		echo 'Conn ok';
	}catch (PDOException $e) {
		echo "Error: " . $e->getMessage(); 
	}
?>