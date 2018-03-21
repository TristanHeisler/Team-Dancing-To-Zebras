<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<title>View Requests</title>
</head>
	
<body>
	<nav>
		<a href="index.php" class="title">Health & Environment Labs Limited</a>
		<?php
			//Include the current session
			session_start();

			//If the user is not logged in as an approver, return them to the index page
			if(!$_SESSION["isApprover"])
			{
				header("location: index.php");
        exit;
			}
    
			//Display the approver's name, a welcome message and a logout button
      echo	'<label class="navLeft">
              Welcome, ' . $_SESSION["name"] . 
            '!</label>
            <a href="processing/userLogout.php" class="navRight">Log Out</a>';

      //If the user is also an analyst, give them the ability to vet tickets
      if($_SESSION['isAnalyst'])
      {
        echo '<a class="navRight">Vet Tickets</a>';
      }      
    ?>
  </nav>
	
	<p class="pageHeader">Pending Requests</p>
	
	<?php
		//Inform the user if a request has just been approved or denied
		if(isset($_GET['id']) && isset($_GET['a']))
	 	{
			echo '<p class="userInfo">Request #' . $_GET['id'] . ' has been ' . strtolower($_GET['a']) . '.</p>';
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
			. "	SoftwareTool.name as 'toolName'\n"
			. "FROM SoftwareRequest\n"
			. "INNER JOIN SoftwareTool ON SoftwareRequest.softwareToolID = SoftwareTool.toolID\n"
			. "INNER JOIN ApproverList ON SoftwareRequest.softwareToolID = ApproverList.softwareToolID\n"
			. "WHERE ApproverList.approverID = " . $_SESSION["userID"] . "\n"
			. "AND SoftwareRequest.approvalStatus = 'Pending'\n"
			. "AND (ApproverList.approvalRegion = 'Canada' OR ApproverList.approvalRegion LIKE CONCAT('%', SoftwareRequest.requesterLocation, '%'))"
			. "ORDER BY requestID ASC";
		$listOfRequests = mysqli_query($connection, $sql);
	
		//Display the list of pending requests if any exist
		if(mysqli_num_rows($listOfRequests))
		{
			//Create a table to store the results
			echo
			'<table class="approverRequests">
				<tr class="headerRow">
					<th>Request ID</th>
					<th>Requester Name</th>
					<th>Software Tool Name</th>
				</tr>';

			$isOddRow = true;

			//Populate the list of requests using information retrieved from the database
			while($currentRequest = mysqli_fetch_assoc($listOfRequests))
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
						'<td class="alignCenter"><a href="processRequest.php?id=' . $currentRequest["requestID"] . '">' . $currentRequest["requestID"] . '</a></td>
						<td>' . $currentRequest["requesterName"] . '</td>
						<td>' . $currentRequest["toolName"] . '</td>
					</tr>';

				$isOddRow = !$isOddRow;
			}	
  
			//Free the results set
			mysqli_free_result($listOfApprovers);

			//Finish the table
			echo '</table>';
		}
	
		//If no pending requests exist, inform the user
	else
	{
		echo '<p class="userInfo">You have no pending requests at this time.</p>';
	}

		//Close the database connection
		mysqli_close($connection);
	?>
</body>
</html>