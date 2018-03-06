<?php
    //Include the current session
    session_start();

	//If somebody is logged in, redirect the user to subscriptions.php
	if(isset($_SESSION["loggedIn"]))
	{
		header("location: index.php");	
	}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="stylesheet" type="text/css" href="style/style.css"/>
  <script type="text/javascript" src="javascript/validateLogin.js"></script>
	<title>Log In</title>
</head>
  
<body>
	<nav>
		<a href="index.php" class="title">Health & Environment Labs Limited</a>
	</nav>
	
	<form action="processing/userLogin.php" method="post" enctype="multipart/form-data">
		<fieldset class="login">
			<table>
        <?php
          //If a login attempt just failed, inform the user
          if(isset($_GET['l']) && $_GET['l'] == 'f')
          {
            echo '<tr><td colspan="2" class="alignCenter"><label class="showError">Invalid login credentials.</label></td></tr>';
          }
				?>
				<tr>
					<td></td>
					<td class="alignLeft"><label class="hideError" id="usernameWarning"></label></td>
				</tr>
				<tr>
					<td class="alignRight">Username:</td>
					<td class="alignLeft"><input type="text" name="username" id="username"/></td>
				</tr>
				<tr>
					<td></td>
					<td class="alignLeft"><label class="hideError" id="passwordWarning"></label></td>
				</tr>
				<tr>
					<td class="alignRight">Password:</td>
					<td class="alignLeft"><input type="password" name="password" id="password"/></td>
				</tr>
				<tr>
					<td class="alignCenter" colspan="2">
            <input class="smallButton" type="reset" value="Clear" name="clear" id="clear"/>
						<input class="smallButton" type="submit" value="Log In" name="login" id="login"/>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
  
  <script type="text/javascript" src="javascript/validateLogin_r.js"></script>
</body>
</html>

