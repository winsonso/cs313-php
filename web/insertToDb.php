
  <!doctype html>
  <html>
  <head>
  <meta charset="UTF-8">
  <title>Insert</title>
  </head>
  
  <body>
<?php
require("dbConnect.php");
  $con= get_db();
      
$book = $_POST['txtBook'];
$chapter = $_POST['txtChapter'];
$verse = $_POST['txtVerse'];
$content = $_POST['txtContent'];

      $sql = "INSERT INTO scripture (book, chapter, verse,content)
  VALUES ('".$book."','".$chapter."','".$verse."','".$content."')";
  if ($con->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      echo "string ". $con->query($sql);
  }
  
  $conn->close();
?>
  </body>
  </html>