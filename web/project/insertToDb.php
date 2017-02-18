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
$date = $month.' '.$year;

echo "month" . $month;
echo "year" . $year;
echo "living_exp" . $living_exp;
echo "food_exp" . $food_exp;
echo "tithing" . $tithing;
echo "others" . $others;
echo "saving" . $saving;
echo "user" . $username;
echo "id" . $login_id;
echo "d ".$date;


require("dbConnect.php");
  $db= get_db();

try
{
	// Add the Scripture
	// We do this by preparing the query with placeholder values

	$query = "INSERT INTO record (living_exp, tithing, food_exp, others, saving, ac_id, date)VALUES (".$living_exp.",".$tithing.",".$food_exp.",".$others.",".$saving.",".$login_id.",'".$date."')";
//		$query = "INSERT INTO record (living_exp, tithing, food_exp, others, saving, ac_id, date)VALUES (11,22,33,44,55,1,'Feb 1234')";
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
//header("Location: showCxt.php");
//die();

?>
