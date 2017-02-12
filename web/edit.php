<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit</title>
</head>


<?php

// $id=$_GET['id'];

require("dbConnect.php");
  $db= get_db();

  foreach ($db->query('SELECT * from scripture where id='.$_GET["id"]) as $row)
// {
//     print "<p><span id='scriptref'>$row[1] $row[2]:$row[3]</span> - \"$row[4]\"</p>\n\n";
// }

// // Retrieve data from database 
// foreach ($db->query('SELECT * from scripture where id='.$_GET["id"]) as $row)
// {
//     $book = $row[1];
//     $verse = $row[2];
//     $content = $row[3];
// }
// echo $book.$verse.$content;

?>

<body>
<h2>Edit Your Favorite Scripture</h2>
<form id="mainForm" action="" method="POST">
  <label for="txtBooK">Book</label>
  <input type="text" id="txtBook" name="txtBook" value='<?php echo $row['book'];?>'></input>
  <br /><br />

  <label for="txtChapter">Chapter</label>
  <input type="text" id="txtChapter" name="txtChapter" value='<?php echo $row['chapter'];?>'></input>
  <br /><br />

  <label for="txtVerse">Verse</label>
  <input type="text" id="txtVerse" name="txtVerse" value='<?php echo $row['content'];?>'></input>
  <br /><br />

  <label for="txtContent">Content:</label><br />
  <textarea id="txtContent" name="txtContent" rows="4" cols="50" ><?php echo $row[4];?></textarea>
  <br /><br />

    <button name="submit" type="submit">Submit</button>
</form>

  </body>
</html>