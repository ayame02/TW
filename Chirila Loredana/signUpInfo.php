	<html>
		<head>
			<meta http-equiv = "refresh" content = "2; url = Home.html">
			<link rel="stylesheet" type="text/css" href="css/style.css" />
		</head>
		<body>
			<div id="redirecting_content">	
			<h2>
			<?php
				session_start();
				include ('databaseConn.php');
				$db = new Database();
				$firstName = $_POST["firstName"];
				$lastName = $_POST["lastName"];
				$DOBDay = $_POST["day"];
				$DOBMonth = $_POST["month"];
				$DOBYear = $_POST["birthyear"];
				$DOBConcat = $DOBDay.'-'.$DOBMonth.'-'.$DOBYear;
				$DOBDate = new DateTime("$DOBConcat");
				$DOB = $DOBDate->format('Y-m-d');
				
				$usernm = $_POST["usernm"];
				$pwd = $_POST["pwd"];
				
				$sqlID = "select max(id) from users";
				$IDResult = $db->query($sqlID);
				while ($row = $IDResult->fetch_assoc()){
					$id = $row['max(id)'] + 1;
				}
				$sql = "INSERT INTO users(id, username, password) VALUES ($id, '$usernm', '$pwd')";
				$result1 = $db->query($sql);
				
				$usersInfo = "INSERT INTO usersInfo(user_id, name, first_name, date_of_birth) VALUES ($id, '$lastName','$firstName', '$DOB')";
				$result2 = $db->query($usersInfo);
				
				if (!$result1 or !$result2) { 
					echo ("Cannot complete action. Please try again later."); 
					header ('Refresh: 2; URL=Home.html');
					die();
				}
				else{
					echo("Success! Redirecting to main page.");
					header ('Refresh: 2; URL=Home.html');
				}	
			?>
			</h2>
			</div>
		</body>
	</html>