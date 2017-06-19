<html>
	<head>
		<meta http-equiv = "refresh" content = "2; URL=NaturalHome.html">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<div id="redirecting_content">	
		<h2>
		<?php
			session_start();
			include ('databaseConn.php');
			$_SESSION['user_id'] = $_POST['user_id'];
			$db = new Database();
			$value = $_POST['user_id'];
			$user = $_POST['username'];
			if (isset($_POST['user_id']) and isset($_POST['username'])){
				if ($db->users_check($value, $user) === 1){
					echo ("Login success...Redirecting.");
					header ('Refresh: 2; URL=NaturalHome.html');
				}
				else {
					if( $value > 100000 or $value < 999999 and $db->username_check($user) === 0) {
						$new_user = "insert into users(user_id, username) values($value, '$user')";
						$result = $db->query($new_user);
						if (!$result) { 
							echo ("Cannot complete action. Please try again later."); 
							header ('Refresh: 2; URL=Home.html');
						}
						else{
							echo("Success! Redirecting to main page.");
							header ('Refresh: 2; URL=NaturalHome.html');
						}
					}
					else {
						echo ("Invalid id. Redirecting."); 
						header ('Refresh: 2; URL=Home.html');
					}
				}
			}
			else {
				echo ("Invalid id. Redirecting.");
				header ('Refresh: 2; URL=Home.html');
				
			}
			
		?>
		</h2>
		</div>
	</body>
</html>
