<?php
	//Required to send emails
	require_once '../swift/lib/swift_required.php';

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
			. "	SoftwareRequest.requestID,\n"
			.	" SoftwareRequest.requesterName,\n"
			. "	SoftwareRequest.requesterEmail,\n"
			. "	SoftwareTool.name AS toolName\n"
			. "FROM SoftwareRequest\n"
			. "INNER JOIN SoftwareTool ON SoftwareRequest.softwareToolID = SoftwareTool.toolID\n"
      . "WHERE SoftwareRequest.requestID = " . $_GET['id'] . "\n";
    
  $ticketResults = mysqli_query($connection, $sql);

  //If no request with the given ID exists or the user is not an approver for the tool, return them to the view requests page
  if(!mysqli_num_rows($ticketResults))
  {
      header("location: ../viewTickets.php");
      exit;
  }

	$pendingTicket = mysqli_fetch_assoc($ticketResults);
	$requestID = $pendingTicket["requestID"];
	$userName = $pendingTicket["requesterName"];
	$userEmail = $pendingTicket["requesterEmail"];
	$toolName = $pendingTicket["toolName"];

  //Free the result set
	mysqli_free_result($ticketResults);

  //Update the access status accordingly
  $sql = "UPDATE SoftwareRequest\n"
    . "SET accessStatus = '" . $_GET['a'] . "'\n"
    . "WHERE requestID = " . $_GET['id'] . "\n";

	//If the insertion was successful, continue the process of informing the user
  if(mysqli_query($connection, $sql))
	{	
		//Close database connection
		mysqli_close($connection); 	
		
		//Access an SMTP server
		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, "tls")
			->setUsername('sseuofr@gmail.com')
			->setPassword('Z9KqzY+J');

		//Create a mailer
		$mailer = Swift_Mailer::newInstance($transport);
		
		//Create the email subject
		$subject = 'HELL Software Tool Request #' . $requestID . ' Decision';
		
		//Create the beginning of email contents
		$contents = "Hello " . $userName . ",\n\n"
			. "Thank you for your interest in the " . $toolName . " tool.\n\n";
		
		//Populate the email based on if access was granted or not
		if($_GET['a'] == "Approved")
		{
			$contents .= "We are happy to inform you that access to this tool has been granted.\n\n";
		}
		else
		{
			$contents .= "We regret to inform you that access to this tool has been denied.\n\n";
		}
		
		//Finish the email contents
		$contents .= "Thank you,\nHealth and Environment Labs Limited";
		
		//Create the message
		$message = Swift_Message::newInstance($subject)
			->setFrom(array('DoNotReply@HELL.org' => 'DoNotReply'))
			->setTo(array($userEmail))
			->setBody($contents);

		//Send the email
		$result = $mailer->send($message);
		
		//Return to the list of pending requests and inform the analyst
		header("location: ../viewTickets.php?id=" . $_GET['id'] . "&a=" . $_GET['a']);
		exit;
	}
	else
	{
		echo "Error: " . mysqli_error($connection);
	}