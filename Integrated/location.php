<?php 

	$address=$_GET['location'];

	function getCoordinatesLat($address){
		$address = str_replace(" ", "+", $address);
		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyDaJ8qJ6Pk7VrtnUjqT6iI-q6VpJDu-cRw";
		$response = file_get_contents($url);
		$json = json_decode($response,TRUE); //generate an array of object from the response of web
		return ($json['results'][0]['geometry']['location']['lat']);
	}

    
       	
    

	function getCoordinatesLng($address){
		$address = str_replace(" ", "+", $address);
		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyDaJ8qJ6Pk7VrtnUjqT6iI-q6VpJDu-cRw";
		$response = file_get_contents($url);
		$json = json_decode($response,TRUE); //generate an array of object from the response of web
		return ($json['results'][0]['geometry']['location']['lng']);
	}

    if (isset($_GET['location'])) {
		$lat= getCoordinatesLat($_GET['location']);
		$lng= getCoordinatesLng($_GET['location']);
		$data[0]=$lat;
		$data[1]=$lng;
		echo json_encode($data);
	}


 ?>