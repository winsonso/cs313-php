<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>update</title>
</head>

<body>
<?php

// get the data from the POST
$month = $_POST['month'];
$year = $_POST['year'];
$living_exp = $_POST['living_exp'];
$food_exp = $_POST['food_exp'];
$tithing = $_POST['tithing'];	
$others = $_POST['others'];
$saving = $_POST['saving'];
$record_id=$_GET['id'];

require("dbConnect.php");
  $db= get_db();

try
{
	// Add the Scripture
	// We do this by preparing the query with placeholder values
	$query = "UPDATE record SET living_exp='$living_exp', tithing='$tithing', food_exp='$food_exp', others='$others', saving='$saving', month='$month', year='$year' WHERE record_id='$record_id'";
	$statement = $db->prepare($query);

	$statement->execute();
	echo "<strong><center>Updated record successfully!</center></strong>";
	echo "<center><button type=\"button\"><a href=\"showCxt.php\">Back to Record Page</a></button></center>";

}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
?>
</body>
</html>