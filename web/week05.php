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
     <?php
      $statement = $db->prepare("SELECT username, income, tithing others FROM person_ac");
      $statement->execute();
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo '<p>';
        echo '<strong>' . $row['username'] . ' ' . $row['income'] . ':';
        echo $row['tithing'] . '</strong>' . ' - ' . $row['others'];
        echo '</p>';
      }
      ?>
  </body>
</html>