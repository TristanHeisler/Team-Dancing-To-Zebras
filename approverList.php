<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<title>Approver List</title>
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
					echo '<a href="viewTickets.php" class="navRight">Vet Tickets</a>';
				}
			}
		?>
	</nav>
	
	<p class="pageHeader">Approver List</p>
	
	<?php
  //Open database connection
	$connection = mysqli_connect("localhost", "tristan", "w6dmZTT9gbQ2YBHH3LWjALwCXRGTsTd4", "ense470");

  //Check if the connection was made
  if(!$connection)
  {
    die("Connection failed: " . mysqli_connect_error());
  }
 
  //Obtain the list of approvers
  $sql = "SELECT\n"
    . "	SoftwareTool.name as `softwareToolName`,\n"
		. "	SoftwareTool.acronym as `softwareToolAcronym`,\n"
    . "	User.name AS `approverName`,\n"
    . " ApproverList.approvalRegion AS `regionOfApproval`\n"
    . "FROM `ApproverList`\n"
    . "INNER JOIN `SoftwareTool` ON ApproverList.softwareToolID = SoftwareTool.toolID\n"
    . "INNER JOIN `User` ON ApproverList.approverID = User.userID\n"
		. "ORDER BY softwareToolName ASC, approverName ASC";
  $listOfApprovers = mysqli_query($connection, $sql);
  
  //Close the database connection
  mysqli_close($connection);

  //Create a table to store the results
  echo
  '<table class="infoTable">
    <tr class="headerRow">
      <th>Software Tool Name</th>
			<th>Acronym</th>
      <th>Approver Name</th> 
      <th>Region of Approval</th>
    </tr>';

	$isOddRow = true;
	
  //Populate the table with information from the database
  while($currentApproverToolRelation = mysqli_fetch_assoc($listOfApprovers))
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
        '<td>' . $currentApproverToolRelation["softwareToolName"] . '</td>
				<td>' . $currentApproverToolRelation["softwareToolAcronym"] . '</td>
        <td>' . $currentApproverToolRelation["approverName"] . '</td>
        <td>' . $currentApproverToolRelation["regionOfApproval"] . '</td>
      </tr>';
		
		$isOddRow = !$isOddRow;
  }
  
  //Free the results set
  mysqli_free_result($listOfApprovers);

  //Finish the table
  echo
  '</table>';
?>
</body>
</html>