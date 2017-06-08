<?php
	
	header("Access-Control-Allow-Origin: *");

	

	

	include('config.php');

	
	
	$db = new DB();

	$data = $db->getFriends();

	echo json_encode($data);
?>