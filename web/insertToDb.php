
  <!doctype html>
  <html>
  <head>
  <meta charset="UTF-8">
  <title>Insert</title>
  </head>
  
  <body>
<?php

// get the data from the POST
$book = $_POST['txtBook'];
$chapter = $_POST['txtChapter'];
$verse = $_POST['txtVerse'];
$content = $_POST['txtContent'];

require("dbConnect.php");
  $db= get_db();

try
{
	// Add the Scripture
	// We do this by preparing the query with placeholder values
	$query = 'INSERT INTO scripture(book, chapter, verse, content) VALUES ('".$book."','".$chapter."','".$verse."','".$content."')';
	$statement = $db->prepare($query);

	$statement->execute();
	echo "New record created successfully";

}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}


      
// $book = $_POST['txtBook'];
// $chapter = $_POST['txtChapter'];
// $verse = $_POST['txtVerse'];
// $content = $_POST['txtContent'];

//       $sql = "INSERT INTO scripture (book, chapter, verse,content)
//   VALUES ('".$book."','".$chapter."','".$verse."','".$content."')";
//   if ($con->query($sql) === TRUE) {
//       echo "New record created successfully";
//   } else {
//       echo "Error: " . $sql . "<br>" . $conn->error;
//       echo "string ". $con->query($sql);
//   }
  
//   $conn->close();
?>
  </body>
  </html>