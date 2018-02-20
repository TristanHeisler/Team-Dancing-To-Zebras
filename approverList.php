<html>
<head>
	<title>HELL Approver List</title>
  <!--Inline styling for convenience, will use CSS for the actual website-->
  <style>
      table 
      {
        border-collapse: collapse;
      }

      table, th, td 
      {
        border: 1px solid black;
      } 
  </style>
</head>
<body>
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
    . "	User.name AS `approverName`,\n"
    . " ApproverList.approvalRegion AS `regionOfApproval`\n"
    . "FROM `ApproverList`\n"
    . "INNER JOIN `SoftwareTool` ON ApproverList.softwareToolID = SoftwareTool.toolID\n"
    . "INNER JOIN `User` ON ApproverList.approverID = User.userID";
  $listOfApprovers = mysqli_query($connection, $sql);
  
  //Close the database connection
  mysqli_close($connection);

  //Create a table to store the results
  echo
  '<table>
    <tr>
      <th>Software Tool Name</th>
      <th>Approver Name</th> 
      <th>Region of Approval</th>
    </tr>';

  //Populate the table with information from the database
  while($currentApproverToolRelation = mysqli_fetch_assoc($listOfApprovers))
  {
    echo 
      '<tr>
        <td>' . $currentApproverToolRelation["softwareToolName"] . '</td>
        <td>' . $currentApproverToolRelation["approverName"] . '</td>
        <td>' . $currentApproverToolRelation["regionOfApproval"] . '</td>
      </tr>';
  }
  
  //Free the results set
  mysqli_free_result($listOfApprovers);

  //Finish the table
  echo
  '</table>';
?>
</body>
</html>