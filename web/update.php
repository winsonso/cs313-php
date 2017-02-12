<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>update</title>
</head>

<body>
<?php

// get the data from the POST
$id=$_GET['id'];
$book = $_POST['txtBook'];
$chapter = $_POST['txtChapter'];
$verse = $_POST['txtVerse'];
$content = $_POST['txtContent'];

//echo "string" . $id . $book;

require("dbConnect.php");
  $db= get_db();

try
{
	// Add the Scripture
	// We do this by preparing the query with placeholder values
	$query = "UPDATE scripture SET book='$book', chapter='$chapter', verse='$verse' WHERE id='$id'";
	$statement = $db->prepare($query);

	$statement->execute();
	echo "<strong><center>Updated record successfully!</center></strong>";
	echo "<a href=\"week05.php\">Back to Scripture Resources - Search Page</a>";

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