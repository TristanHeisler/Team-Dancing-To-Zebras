<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<title>View Tickets</title>
</head>
	
<body>
	<nav>
		<a href="index.php" class="title">Health & Environment Labs Limited</a>
		<?php
			//Include the current session
			session_start();

			//If the user is not logged in as an analyst, return them to the index page
			if(!$_SESSION["isAnalyst"])
			{
				header("location: index.php");
        exit;
			}
    
			//Display the analyst's name, a welcome message and a logout button
      echo	'<label class="navLeft">
              Welcome, ' . $_SESSION["name"] . 
            '!</label>
            <a href="processing/userLogout.php" class="navRight">Log Out</a>';

      //If the user is also an approver, give them the ability to approve to deny requests
      if($_SESSION['isApprover'])
      {
        echo '<a href="viewRequests.php" class="navRight">View Approval Requests</a>';
      }      
    ?>
  </nav>
	
	<p class="pageHeader">Pending Tickets</p>
	
	<?php
		//Inform the user if a ticket has just been approved or denied
		if(isset($_GET['id']) && isset($_GET['a']))
	 	{
			echo '<p class="userInfo">Ticket #' . $_GET['id'] . ' has been ' . strtolower($_GET['a']) . '.</p>';
	 	}
	
		//Open database connection
		$connection = mysqli_connect("localhost", "tristan", "w6dmZTT9gbQ2YBHH3LWjALwCXRGTsTd4", "ense470");

		//Check if the connection was made
		if(!$connection)
		{
			die("Connection failed: " . mysqli_connect_error());
		}
	
		//Obtain the list of applicable requests	
		$sql = "SELECT\n"
			. "	SoftwareRequest.requestID as 'requestID',\n"
			. "	SoftwareRequest.requesterName as 'requesterName',\n"
			. "	SoftwareTool.name as 'toolName',\n"
			. "	SoftwareRequest.approvalStatus as 'approvalStatus'\n"
			. "FROM SoftwareRequest\n"
			. "INNER JOIN SoftwareTool ON SoftwareRequest.softwareToolID = SoftwareTool.toolID\n"
			. "WHERE SoftwareRequest.accessStatus = 'Pending'\n"
			. "ORDER BY requestID ASC";
		$listOfTickets = mysqli_query($connection, $sql);
	
		//Display the list of pending requests if any exist
		if(mysqli_num_rows($listOfTickets))
		{
			//Create a table to store the results
			echo
			'<table class="infoTable">
				<tr class="headerRow">
					<th>Request ID</th>
					<th>Requester Name</th>
					<th>Software Tool Name</th>
					<th>Approval Status</th>
				</tr>';

			$isOddRow = true;

			//Populate the list of requests using information retrieved from the database
			while($currentTicket = mysqli_fetch_assoc($listOfTickets))
			{
				if($isOddRow)
				{
					echo '<tr class="oddRow">';
				}
				else
				{
					echo '<tr class="evenRow">';
				}

				echo 
						'<td class="alignCenter"><a href="vetTicket.php?id=' . $currentTicket["requestID"] . '">' . $currentTicket["requestID"] . '</a></td>
						<td>' . $currentTicket["requesterName"] . '</td>
						<td>' . $currentTicket["toolName"] . '</td>
						<td>' . $currentTicket["approvalStatus"] . '</td>
					</tr>';

				$isOddRow = !$isOddRow;
			}	
  
			//Free the results set
			mysqli_free_result($listOfTickets);

			//Finish the table
			echo '</table>';
		}
	
		//If no pending requests exist, inform the user
		else
		{
			echo '<p class="userInfo">There are no pending tickets at this time.</p>';
		}

		//Close the database connection
		mysqli_close($connection);
	?>
</body>
</html>