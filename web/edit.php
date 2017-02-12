<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit</title>
</head>


<?php

$id=$_GET['id'];

require("dbConnect.php");
  $con= get_db();

// Retrieve data from database 
foreach ($db->query('SELECT * from scripture where id='.$_GET["id"]) as $row)
{
    $book = $row[1];
    $verse = $row[2];
    $content = $row[3];
}
echo $book.$verse.$content;
?>

<body>
<h2>Edit Your Favorite Scripture</h2>
<form id="mainForm" action="" method="POST">
  <label for="txtBooK">Book</label>
  <input type="text" id="txtBook" name="txtBook" value='<?php echo $book;?>'></input>
  <br /><br />

  <label for="txtChapter">Chapter</label>
  <input type="text" id="txtChapter" name="txtChapter"></input>
  <br /><br />

  <label for="txtVerse">Verse</label>
  <input type="text" id="txtVerse" name="txtVerse"></input>
  <br /><br />

  <label for="txtContent">Content:</label><br />
  <textarea id="txtContent" name="txtContent" rows="4" cols="50"></textarea>
  <br /><br />

    <button name="submit" type="submit">Submit</button>
</form>

  </body>
</html>
echo "$_GET['book'];"