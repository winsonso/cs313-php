<?php
require("dbConnect.php");
$db = get_db();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Scripture List</title>
    <link rel="stylesheet" href="">
  </head>
  <body>
     <h1>Scripture Resources</h1>

<form method="post" action="">
    <label for="searchval">Enter search term:</label>
    <input type="text" name="searchval" id="searchval" placeholder=" Search by Name.. ">
    <button name="submit" type="submit">Go!</button>
</form>

<?php

if(isset($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
        $searchval = htmlspecialchars($_POST["searchval"]);

        echo "<br />";

        $sqlstring = 'SELECT id, book, chapter, verse from scripture WHERE book = \''. html_entity_decode($searchval) .'\'';

        echo '<ul>';
        foreach ($db->query($sqlstring) as $row)
        {
            echo '<a href="week05_results.php?id='.$row['id'].'"><li>';
            echo $row['book'] . ' ' . $row['chapter'] . ':'. $row['verse'];
            echo '</a> '."&nbsp&nbsp&nbsp&nbsp";
            echo '<a href="edit.php?id='.$row['id'].'">EDIT</a>'."&nbsp&nbsp&nbsp&nbsp";
            echo '<a href="delete.php?id='.$row['id'].'">DELETE</a></li>';
            
        }
        echo '</ul>';
        if(sizeof($row) == 0) {
          echo "<strong>Not Found!!</strong><br>";
          echo"<a href=\"week05.php\">Back to Scripture Resources - Search Page</a>";
        }
    }
  }
  else{
      // $statement = $db->prepare("SELECT book, chapter, verse, content FROM scripture");
      // $statement->execute();
      // $counter = 1;
      // echo '<ul>';
      // while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      //   echo '<a href="week05_results.php?id='.$counter.'"><li>';
      //   echo 'id: '.$row['id'].' ='.$row[0].$row['book'] . ' ' . $row['chapter'] . ':'. $row['verse'];
      //   echo '</li></a>';
      //   $counter++;
      // }
      // echo '</ul>';

      $sqlstring = 'SELECT id, book, chapter, verse from scripture ORDER BY id';

        echo '<ul>';
        foreach ($db->query($sqlstring) as $row)
        {
            echo '<a href="week05_results.php?id='.$row['id'].'"><li>';
            echo $row['book'] . ' ' . $row['chapter'] . ':'. $row['verse'];
            echo '</a> '."&nbsp&nbsp&nbsp&nbsp";
            echo '<a href="edit.php?id='.$row['id'].'">EDIT</a>'."&nbsp&nbsp&nbsp&nbsp";
            echo '<a href="delete.php?id='.$row['id'].'">DELETE</a></li>';
        }
        echo '</ul>';
  }

?>


<hr>
<h2>Enter Your Favorite Scripture</h2>
<form id="mainForm" action="insertToDb.php" method="POST">
  <label for="txtBooK">Book</label>
  <input type="text" id="txtBook" name="txtBook"></input>
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

