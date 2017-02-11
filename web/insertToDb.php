

// get the data from the POST
$book = $_POST['txtBook'];
$chapter = $_POST['txtChapter'];
$verse = $_POST['txtVerse'];
$content = $_POST['txtContent'];
// For debugging purposes, you might include some echo statements like this
// and then not automatically redirect until you have everything working.
// echo "book=$book\n";
// echo "chapter=$chapter\n";
// echo "verse=$verse\n";
// echo "content=$content\n";
// we could (and should!) put additional checks here to verify that all this data is actually provided

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
  }
  
  $conn->close();
?>
  </body>
  </html>