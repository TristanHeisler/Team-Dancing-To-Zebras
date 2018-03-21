<?php
	//Include the current session
  session_start();

  //Ensure that the proper values are present
  if(!$_SESSION["isAnalyst"] || !isset($_GET['id']) || !isset($_GET['a']))
  {
    header("location: ../viewTickets.php");
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
      . "WHERE SoftwareRequest.requestID = " . $_GET['id'] . "\n";
    
  $pendingTicket = mysqli_query($connection, $sql);

  //If no request with the given ID exists or the user is not an approver for the tool, return them to the view requests page
  if(!mysqli_num_rows($pendingTicket))
  {
      header("location: ../viewTickets.php");
      exit;
  }

  //Free the result set
	mysqli_free_result($pendingTicket);

  //Update the access status accordingly
  $sql = "UPDATE SoftwareRequest\n"
    . "SET accessStatus = '" . $_GET['a'] . "'\n"
    . "WHERE requestID = " . $_GET['id'] . "\n";

  mysqli_query($connection, $sql);

  //Close the database connection
  mysqli_close($connection);

  //Return to the list of pending requests and inform the user
  header("location: ../viewTickets.php?id=" . $_GET['id'] . "&a=" . $_GET['a']);
	exit;
?>