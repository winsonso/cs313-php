<?php
  $dbUser = 'tvykcavenuypkg';
  $dbPassword = 'e4cd5d6eca8fa1f7d9ead148580cc0c1b30cde2f37f4276da626ce47275eba0c';
  $dbName = 'd38uii2m3augn0';
  $dbHost = 'ec2-54-225-122-119.compute-1.amazonaws.com';
  $dbPort = '5432';

  try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    echo "Opened database successfully\n";
  } catch (PDOException $ex) {
    echo "Error connecting to DB. Details: $ex";
    die();
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Scripture List</title>
    <link rel="stylesheet" href="teach-04.css">
  </head>
  <body>
     <h1>Scripture Resources</h1>

<form method="post" action="">
    <label for="searchval">Enter search term:</label>
    <input type="text" name="searchval" id="searchval" placeholder=" Search by Name.. ">
    <button name="submit" type="submit">Go!</button>
</form>
<?php

  // $dbUser = 'tvykcavenuypkg';
  // $dbPassword = 'e4cd5d6eca8fa1f7d9ead148580cc0c1b30cde2f37f4276da626ce47275eba0c';
  // $dbName = 'd38uii2m3augn0';
  // $dbHost = 'ec2-54-225-122-119.compute-1.amazonaws.com';
  // $dbPort = '5432';

  // try {
  //   $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
  //   echo "Opened database successfully\n";
  // } catch (PDOException $ex) {
  //   echo "Error connecting to DB. Details: $ex";
  //   die();
  // }

if(isset($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
        $searchval = htmlspecialchars($_POST["searchval"]);

        echo "<br />";

        $sqlstring = 'SELECT id, book, chapter, verse from scripture WHERE book = \''. html_entity_decode($searchval) .'\'';

        
        foreach ($db->query($sqlstring) as $row)
        {
            //echo "<p><span id='scriptref'><a href='search_results.php?id=$row[0]'>$row[1] $row[2]:$row[3]</a></span></p>\n\n";
          //echo $row[0];
            echo '<ul>';
            echo '<a href="week05_results.php?id='.$row[0].'"><li>';
            echo $row['book'] . ' ' . $row['chapter'] . ':'. $row['verse'];
            echo '</li></a>';
            echo '</ul>';
        }
        if(sizeof($row) == 0) {
          echo "<strong>Not Found!!</strong><br>";
          echo"<a href=\"week05.php\">Back to Scripture Resources - Search Page</a>";
        }
    }
  }
  else{
      $statement = $db->prepare("SELECT book, chapter, verse, content FROM scripture");
      $statement->execute();
      $counter = 1;
      echo '<ul>';
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo '<a href="week05_results.php?id='.$counter.'"><li>';
        echo $row['book'] . ' ' . $row['chapter'] . ':'. $row['verse'];
        echo '</li></a>';
        $counter++;
      }
      echo '</ul>';
    //echo "string1111";
  }

?>


<hr>
<h2>Enter Your Favorite Scripture</h2>
<form method="" action="">
    <label for="book">Enter Book:&nbsp&nbsp&nbsp</label>
    <input type="text" name="book" id="book"><br>
    <label for="chapter">Enter Chapter:</label>
    <input type="text" name="chapter" id="chapter"><br>
    <label for="verse">Enter Verse:&nbsp&nbsp&nbsp</label>
    <input type="text" name="book" id="verse"><br>
    <label for="content">Enter Content:</label>
    <input type="text" name="content" id="content"><br>
    <button name="submit" type="submit">Submit</button>
</form>
 <?php
  // $statement = $db->prepare("SELECT book, chapter, verse, content FROM scripture");
  // $statement->execute();
  // $counter = 1;
  // echo '<ul>';
  // while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  //   echo '<a href="week05_results.php?id='.$counter.'"><li>';
  //   echo $row['book'] . ' ' . $row['chapter'] . ':'. $row['verse'];
  //   echo '</li></a>';
  //   $counter++;
  // }
  // echo '</ul>';


  ?>
  </body>
</html>

