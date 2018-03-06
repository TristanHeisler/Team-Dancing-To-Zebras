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
	
	//Ensure that the process is accessed from login.php
  if(!isset($_POST["login"]))
  {
    header("location: ../login.php");
    exit;
	}

  //Obtain values from the form
  $username = mysqli_real_escape_string($connection, $_POST["username"]);
	$password = mysqli_real_escape_string($connection, $_POST["password"]);

  //Determine if the user information exists in the database
  $sql = "SELECT userID, name, isAnalyst FROM User WHERE username = '$username' and password = '$password'";
  $result = mysqli_query($connection, $sql);

  //If the provided information does not match an account, redirect the user
  if(!mysqli_num_rows($result))
	{
    //Free the result set and close the connection
		mysqli_free_result($result);
		mysqli_close($connection);
    
    //Redirect the user the the login page
		header("location: ../login.php?l=f");
		exit;
	}

  //Otherwise, continue the login process
  else
  {
    //Get the account info
    $accountInfo = mysqli_fetch_assoc($result);

    //Store session information
    $_SESSION["loggedIn"] = true; 
    $_SESSION["userID"] = $accountInfo['userID'];
    $_SESSION["name"] = $accountInfo['name'];
    $_SESSION["isAnalyst"] = $accountInfo['isAnalyst'];
    
    //Determine if the user is an approver
	  $sql = "SELECT softwareToolID FROM ApproverList WHERE approverID = " . $accountInfo['userID'];
    $result = mysqli_query($connection, $sql);
    
    if(mysqli_num_rows($result))
	  {
      $_SESSION["isApprover"] = true;
    }
    else
    {
      $_SESSION["isApprover"] = false; 
    }
    
    //Free the result set and close the connection
		mysqli_free_result($result);
		mysqli_close($connection);
    
    //Redirect the user to the main page
    header("location: ../index.php");
  }
?>