<?php
	//Include the current session
  session_start();

  //Ensure that the proper values are present
  if(!$_SESSION["isApprover"] || !isset($_GET['id']) || !isset($_GET['a']))
  {
    header("location: ../viewRequests.php");
    exit;
  }

	//Open database connection
	$connection = mysqli_connect("localhost", "tristan", "w6dmZTT9gbQ2YBHH3LWjALwCXRGTsTd4", "ense470");
	
	//Check if the connection was made
	if(!$connection)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	else
	{
		echo "Connection worked...";
	}

  //Ensure that the approver has permission to make a decision concerning the given tool
  $sql = "SELECT\n"
			. "	SoftwareRequest.requestID\n"
			. "FROM SoftwareRequest\n"
			. "INNER JOIN SoftwareTool ON SoftwareRequest.softwareToolID = SoftwareTool.toolID\n"
			. "INNER JOIN ApproverList ON SoftwareRequest.softwareToolID = ApproverList.softwareToolID\n"
			. "WHERE ApproverList.approverID = " . $_SESSION["userID"] . "\n"
      . "AND SoftwareRequest.requestID = " . $_GET['id'] . "\n"
      . "AND (ApproverList.approvalRegion = 'Canada' OR ApproverList.approvalRegion LIKE CONCAT('%', SoftwareRequest.requesterLocation, '%'))";
    
  $pendingRequest = mysqli_query($connection, $sql);

  //If no request with the given ID exists or the user is not an approver for the tool, return them to the view requests page
  if(!mysqli_num_rows($pendingRequest))
  {
      header("location: viewRequests.php");
      exit;
  }

  //Free the result set
	mysqli_free_result($pendingRequest);

  //Update the approval status accordingly
  $sql = "UPDATE SoftwareRequest\n"
    . "SET approvalStatus = '" . $_GET['a'] . "'\n"
    . "WHERE requestID = " . $_GET['id'] . "\n";

  mysqli_query($connection, $sql);

  //Close the database connection
  mysqli_close($connection);

  //Return to the list of pending requests and inform the user
  header("location: ../viewRequests.php?id=" . $_GET['id'] . "&a=" . $_GET['a']);
	exit;
?>