<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scripture Resources</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/cs313-php.css">
</head>
<body>
<h1>Scripture Resources - Scripture Details</h1>
<br/>
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

foreach ($db->query('SELECT * from scripture where id='.$_GET["id"]) as $row)
{
    print "<p><span id='scriptref'>$row[1] $row[2]:$row[3]</span> - \"$row[4]\"</p>\n\n";
}
?>

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
<br/>
<a href="week05.php">Back to Scripture Resources - Search Page</a>
</body>
</html>