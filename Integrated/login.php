<html>
	<head>
		<meta http-equiv = "refresh" content = "2; url = NaturalHome.html">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<div id="redirecting_content">	
		<h2>
		<?php
			session_start();
			session_id('home');
			include ('databaseConn.php');
			$_SESSION['user'] = $_POST['user'];
			$db = new Database();
			if (isset($_POST["user"]) and isset($_POST["pass"])){
				if ($db->users_check($_POST["user"], $_POST["pass"]) === 1){
					echo ("Login success...Redirecting.");
				}
				else {
					echo ("Could not login, please try again later.");
					header('Refresh: 2; URL=Home.html');
					die();
				}
			}
			else {
				echo ("Invalid user and/or password. Redirecting.");
				header ('Refresh: 2; URL=Home.html');
				die();
			}
		?>
		</h2>
		</div>
	</body>
</html>