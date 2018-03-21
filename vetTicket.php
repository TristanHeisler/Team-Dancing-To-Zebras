<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<title>Process Request</title>
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
    
      //If a request id is not set, return the user to the view requests page
      if(!isset($_GET['id']))
      {
        header("location: viewRequests.php");
        exit;
      }
        
			//Display the approver's name, a welcome message and a logout button
      echo	'<label class="navLeft">
              Welcome, ' . $_SESSION["name"] . 
            '!</label>
            <a href="processing/userLogout.php" class="navRight">Log Out</a>';
		
			//If the user is also an approver, give them the ability to approve to deny requests
      if($_SESSION['isApprover'])
      {
        echo '<a href="viewRequests.php" class="navRight">View Approval Requests</a>';
      }    

      //Provide the ability to go back to the general requests page
      echo '<a href="viewTickets.php" class="navRight">Vet Tickets</a>';  
    ?>
	</nav>
  
  <?php
    //Open database connection
		$connection = mysqli_connect("localhost", "tristan", "w6dmZTT9gbQ2YBHH3LWjALwCXRGTsTd4", "ense470");

		//Check if the connection was made
		if(!$connection)
		{
			die("Connection failed: " . mysqli_connect_error());
		}
  
    //Retrieve the request information
    $sql = "SELECT\n"
			. "	SoftwareRequest.requestID as 'requestID',\n"
			. "	SoftwareRequest.requesterName as 'requesterName',\n"
      . "	SoftwareRequest.requesterLocation as 'requesterLocation',\n"
			. "	SoftwareTool.name as 'toolName',\n"
      . "	SoftwareRequest.requesterExplanation as 'reasoning',\n"
			. "	SoftwareRequest.approvalStatus as 'approvalStatus'\n"
			. "FROM SoftwareRequest\n"
			. "INNER JOIN SoftwareTool ON SoftwareRequest.softwareToolID = SoftwareTool.toolID\n"
      . "WHERE SoftwareRequest.accessStatus = 'Pending'\n"
      . "AND SoftwareRequest.requestID = " . $_GET['id'] . "\n"
			. "ORDER BY requestID ASC";
    $pendingTicket = mysqli_query($connection, $sql);
  
    //If no pending request with the given ID exists or the user is not an approver for the tool, return them to the view requests page
    if(!mysqli_num_rows($pendingTicket))
    {
        header("location: viewTickets.php");
        exit;
    }
  
    //If a valid request exists, store the required information
    $requestInfo = mysqli_fetch_assoc($pendingTicket);
    $requestID = $requestInfo["requestID"];
    $requesterName = $requestInfo["requesterName"];
    $requesterLocation = $requestInfo["requesterLocation"];
    $toolName = $requestInfo["toolName"];
    $reasoning = $requestInfo["reasoning"];
		$approvalStatus = $requestInfo["approvalStatus"];
  ?>
	
	<p class="pageHeader">Ticket # <?php echo $requestID; ?></p>
	<div class="alignCenter">
	  <fieldset class="requestDetails">
			<table>
				<tr>
          <td class="alignRight"><b>Name:</b></td>
          <td class="alignLeft"><?php echo $requesterName; ?></td>
				</tr>
        <tr>
          <td class="alignRight"><b>Location:</b></td>
          <td class="alignLeft"><?php echo $requesterLocation; ?></td>
				</tr>
        <tr>
          <td class="alignRight"><b>Desired Tool:</b></td>
          <td class="alignLeft"><?php echo $toolName; ?></td>
				</tr>
        <tr>
          <td class="alignRight"><b>Reasoning:</b></td>
          <td class="reasoning"><?php echo $reasoning; ?></td>
				</tr>
				<tr>
          <td class="alignRight"><b>Approval Status:</b></td>
          <td class="reasoning"><?php echo $approvalStatus; ?></td>
				</tr>
        <tr>
					<td class="alignCenter" colspan="2">
						<?php 
							//Access can only be granted if an approver has already given permission
							if($approvalStatus == "Approved")
							{
            		echo '<a><button class="smallButton" type="button">Grant Access</button></a>';
							}
						?>
						<a><button class="smallButton" type="button">Deny Access</button></a>
					</td>
				</tr>
			</table>
		</fieldset>
  </div>
</body>
</html>