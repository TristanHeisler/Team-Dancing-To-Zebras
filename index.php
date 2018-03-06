<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<title>Welcome!</title>
</head>
	
<body>
	<nav>
		<a href="index.php" class="title">Health & Environment Labs Limited</a>
		<?php
			//Include the current session
			session_start();

			//If nobody is logged in, display the login button
			if(!isset($_SESSION["loggedIn"]))
			{
				echo '<a href="login.php" class="navRight">Log In</a>';
			}

			else
			{	
				//If somebody is logged in, display their name, a welcome message and a logout button
					echo	'<label class="navLeft">
									Welcome, ' . $_SESSION["name"] . 
								'!</label>
								<a href="processing/userLogout.php" class="navRight">Log Out</a>';
				}
			?>
  	</nav>
</body>
</html>
