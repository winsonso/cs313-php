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
<!--         <form method="post" action="">
            <label for="searchval">Enter search term:</label>
            <input type="text" name="searchval" id="searchval">
            <button name="submit" type="submit">Go!</button>
        </form> -->
        <form action="search-database.php" method="post">
            Search: <input type="text" name="search" placeholder=" Search here ... "/>
            <input type="submit" value="Submit" />
        </form>


    <?php 
    // Search from MySQL database table
    $search=$_POST['search'];
    $query = $pdo->prepare("select * from scripture where book LIKE '%$search%' OR content LIKE '%$search%'  LIMIT 0 , 10");
    $query->bindValue(1, "%$search%", PDO::PARAM_STR);
    $query->execute();
    // Display search result
             if (!$query->rowCount() == 0) {
            echo "Search found :<br/>";
            echo "<table style=\"font-family:arial;color:#333333;\">";  
                    echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Book</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">where</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Content</td></tr>";       
                while ($results = $query->fetch()) {
            echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";      
                    echo $results['book'];
            echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                    echo $results['chapter']. ':'. $results['verse'];
            echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                    echo "$".$results['content'];
            echo "</td></tr>";        
                }
            echo "</table>";    
            } else {
                echo 'Nothing found';
            }
?>




     <?php
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


      ?>
  </body>
</html>

