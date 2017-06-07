<html>
	<head>
		<meta http-equiv = "refresh" content = "2; url = NaturalHome.html">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<div id="redirecting_content">	
		<h2>
		<?php
			include ('code.php');
			
			$db = new Database();

			if ($db->users_check($_POST["user"], $_POST["pass"]) === 1){
				
				echo ("Login success...Redirecting.");
				
			}
			else {
				header('Location: ReturnHome.html');
				die();
			}
		?>
		</h2>
		</div>
	</body>
</html>
