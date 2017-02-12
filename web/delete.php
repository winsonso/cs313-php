<?php

$id=$_GET['id'];

require("dbConnect.php");
  $db= get_db();

try
{
	// Add the Scripture
	// We do this by preparing the query with placeholder values
	$query = "DELETE FROM scripture WHERE ID = '".$id."'";
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
header("Location: week05.php");
die();




// if(isset($_POST["person_id"]))
// 	{
// 		$data = $_POST["person_id"];
// 	}
// 	echo $data;
// 	$con=mysqli_connect("www.secretvoice1.com","secretvo_11","c12345");
// 		mysqli_select_db($con, "secretvo_11");
// 		if(!$con){
// 		die('Could not connect: ' .mysql_error());
// 		}
// 		$sql = "DELETE FROM family WHERE person_id = '".$data."'";
// 		echo $sql;
// 		if ($con->query($sql) === TRUE) {
//     echo "Record deleted successfully";
// } else {
//     echo "Error deleting record: " . $conn->error;
// }
?>