<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="stylesheet" type="text/css" href="style/style.css"/>
	<script type="text/javascript" src="javascript/validateRequestForm.js"></script>
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
	
	<form action="processing/submitRequest.php" method="post" enctype="multipart/form-data" id="submitRequest">
		<fieldset class="request">
			<table>
				<?php
					//If an request was just submitted, inform the user
					if(isset($_GET['r']) && $_GET['r'] == 's')
					{
						echo '<tr><td colspan="2" class="alignCenter"><label class="showError">Your request has been submitted!</label></td></tr>';
						echo '<tr><td colspan="2" class="alignCenter"><label class="showError">You will be emailed when your ticket has been processed.</label></td></tr>';
					}
				?>
				<tr>
					<td></td>
					<td class="alignLeft"><label class="hideError" id="nameWarning"></label></td>
				</tr>
				<tr>
					<td class="alignRight">Name:</td>
          <td class="alignLeft"><input class="requestHideError" type="text" name="name" id="name" size="28"</td>
				</tr>
				<tr>
					<td></td>
					<td class="alignLeft"><label class="hideError" id="emailWarning"></label></td>
				</tr>
        <tr>
					<td class="alignRight">Email:</td>
					<td class="alignLeft"><input class="requestHideError" type="text" name="email" id="email" size="28"/></td>
				</tr>
				<tr>
					<td></td>
					<td class="alignLeft"><label class="hideError" id="locationWarning"></label></td>
				</tr>
        <tr>
					<td class="alignRight">Location:</td>
          <td>
						<select class="requestHideError" name="location" id="location">
							<option/>
							<option value="Alberta">Alberta</option>
							<option value="British Columbia">British Columbia</option>
							<option value="Manitoba">Manitoba</option>
							<option value="New Brunswick">New Brunswick</option>
							<option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
							<option value="Northwest Territories">Northwest Territories</option>
							<option value="Nova Scotia">Nova Scotia</option>
							<option value="Nunavut">Nunavut</option>
							<option value="Ontario">Ontario</option>
							<option value="Prince Edward Island">Prince Edward Island</option>
							<option value="Quebec">Quebec</option>
							<option value="Saskatchewan">Saskatchewan</option>
							<option value="Yukon">Yukon</option>
						</select>				
          </td>
				</tr>
        <tr>
					<tr>
					<td></td>
					<td class="alignLeft"><label class="hideError" id="toolWarning"></label></td>
				</tr>
					<td class="alignRight">Desired Tool:</td>
          <td>
						<select class="requestHideError" name="desiredTool" id="desiredTool">
							<option/>
							<?php
								//Open database connection
								$connection = mysqli_connect("localhost", "tristan", "w6dmZTT9gbQ2YBHH3LWjALwCXRGTsTd4", "ense470");

								//Check if the connection was made
								if(!$connection)
								{
									die("Connection failed: " . mysqli_connect_error());
								}
							
								//Obtain the list of software tools
								$sql = "SELECT\n"
									. "	toolID, name, acronym \n"
									. "FROM `SoftwareTool` \n"
									. "ORDER BY name ASC";
								$listOfTools = mysqli_query($connection, $sql);
							
								//Close the database connection
 								mysqli_close($connection);
							
								//Populate the dropdown menu with information from the database
								while($currentTool = mysqli_fetch_assoc($listOfTools))
								{
									echo '<option value="'. $currentTool["toolID"] . '">' . $currentTool["name"];
									
									if($currentTool["acronym"])
									{
										echo ' (' . $currentTool["acronym"] . ')';
									}
									
									echo '</option>';
								}
  
									//Free the results set
									mysqli_free_result($listOfApprovers);
							?>
						</select>
          </td>
				</tr>
				<tr>
					<td></td>
					<td class="alignLeft"><label class="hideError" id="reasoningWarning"></label></td>
				</tr>
        <tr>
					<td class="alignRight">Reasoning:</td>
          <td><textarea class="requestHideError" rows="10" name="reasoning" id="reasoning"></textarea></td>
				</tr>
        <tr>
					<td class="alignCenter" colspan="2">
            <input class="smallButton" type="reset" value="Clear" name="clear" id="clear"/>
						<input class="smallButton" type="submit" value="Submit" name="request" id="request"/>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
	
	<script type="text/javascript" src="javascript/validateRequestForm_r.js"></script>
</body>
</html>