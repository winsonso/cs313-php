<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['login_id']))
{
  $username = $_SESSION['username'];
  $login_id = $_SESSION['login_id'];
}
else
{
  header("Location: signIn.php");
  die(); // we always include a die after redirects.
}
?>

<?php

// get the data from the POST
$month = $_POST['month'];
$year = $_POST['year'];
$living_exp = $_POST['living_exp'];
$food_exp = $_POST['food_exp'];
$tithing = $_POST['tithing'];	
$others = $_POST['others'];
$saving = $_POST['saving'];
//$date = $month.' '.$year;


require("dbConnect.php");
  $db= get_db();

try
{
	// Add the Scripture
	// We do this by preparing the query with placeholder values

	$query = "INSERT INTO record (living_exp, tithing, food_exp, others, saving, ac_id, month,year)VALUES (".$living_exp.",".$tithing.",".$food_exp.",".$others.",".$saving.",".$login_id.",'".$month."','".$year."')";

	$statement = $db->prepare($query);

	$statement->execute();
	//echo "New record created successfully";

}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
header("Location: showCxt.php");
die();

?>
