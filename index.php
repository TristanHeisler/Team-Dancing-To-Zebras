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
				
				//If the user an an approver, give them the ability to approve tickets
				if($_SESSION['isApprover'])
				{
					echo '<a href="viewRequests.php" class="navRight">View Approval Requests</a>';
				}
				
				//If the user is an analyst, give them the ability to vet tickets
				if($_SESSION['isAnalyst'])
				{
					echo '<a class="navRight">Vet Tickets</a>';
				}
			}
			?>
  	</nav>
		
	<fieldset class="indexPageOptions">
		<table>
			<tr>
				<td><a href="requestSoftwareTool.php"><button class="largeButton" type="button">Request Software Tool Access</button></a></td>
			</tr>
			<tr>
				<td><a href="approverList.php"><button class="largeButton" type="button">View Approver List</button></a></td>
			</tr>
		</table>
	</fieldset>
</body>
</html>
