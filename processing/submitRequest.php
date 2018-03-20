<?php
	//Include the current session
  session_start();

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
	
	//Ensure that the process is accessed from requestSoftwareTool.php
  if(!isset($_POST["request"]))
  {
    header("location: ../requestSoftwareTool.php");
    exit;
	}

  //Obtain values from the form
  $name = mysqli_real_escape_string($connection, $_POST["name"]);
	$email = mysqli_real_escape_string($connection, $_POST["email"]);
  $location = mysqli_real_escape_string($connection, $_POST["location"]);
  $desiredToolID = mysqli_real_escape_string($connection, $_POST["desiredTool"]);
  $reasoning = mysqli_real_escape_string($connection, $_POST["reasoning"]);

	//Create the sql insertion command
	$sql = "INSERT INTO SoftwareRequest (softwareToolID, requesterName, requesterEmail, requesterLocation, requesterExplanation) VALUES ('$desiredToolID', '$name', '$email', '$location', '$reasoning')";
	
	//If the insertion was successful, inform the user
	if(mysqli_query($connection, $sql))
	{ 
		echo "Request submitted!";  
   		
		//Close database connection
		mysqli_close($connection);
   	
		//Redirect the user to the request submission page
		header("location: ../requestSoftwareTool.php?r=s");
		exit;
 	}
	else
	{
		echo "Error: " . mysqli_error($connection);
	}
?>