<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="stylesheet" type="text/css" href="style/style.css"/>
	<title>Request Software</title>
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
					echo '<a class="navRight">View Approval Requests</a>';
				}
				
				//If the user is an analyst, give them the ability to vet tickets
				if($_SESSION['isAnalyst'])
				{
					echo '<a class="navRight">Vet Tickets</a>';
				}
			}
    ?>
	</nav>
	
	<form action="" method="post" enctype="multipart/form-data">
		<fieldset class="request">
			<table>
				<tr>
					<td class="alignRight">Name:</td>
          <td class="alignLeft"><input type="text" name="name" id="name" size="28"</td>
				</tr>
        <tr>
					<td class="alignRight">Email:</td>
					<td class="alignLeft"><input type="text" name="email" id="email" size="28"/></td>
				</tr>
        <tr>
					<td class="alignRight">Location:</td>
          <td>
            <input list="location" size="28">
              <datalist id="location">
                <option value="British Columbia">
                <option value="Alberta">
             </datalist> 
          </td>
				</tr>
        <tr>
					<td class="alignRight">Desired Tool:</td>
          <td>
            <input list="desiredTool" size="28">
              <datalist id="desiredTool">
                <option value="Operating Map of Gastropathy">
                <option value="Limited Operating Liability">
             </datalist> 
          </td>
				</tr>
        <tr>
					<td class="alignRight">Reasoning:</td>
          <td><textarea cols="30" rows="10"></textarea></td>
				</tr>
        <tr>
					<td class="alignCenter" colspan="2">
            <input class="smallButton" type="reset" value="Clear" name="clear" id="clear"/>
						<input class="smallButton" type="submit" value="Submit" name="submit" id="submit"/>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>