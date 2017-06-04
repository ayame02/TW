<?php
	
	header("Access-Control-Allow-Origin: *");

	$id=$_GET['id'];

	

	include('config.php');

	
	
	$db = new DB();

	$data = $db->getFriend($id);

	echo json_encode($data);