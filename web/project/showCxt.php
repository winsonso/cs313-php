<?php
require("dbConnect.php");
$db = get_db();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Content</title>
    <link rel="stylesheet" href="css/newstyle.css">
  </head>
  <body>
     <h1>Expense Tracker</h1>
<?php
    $sqlstring = 'SELECT * FROM record INNER JOIN account ON record.ac_id = account.id WHERE account.id = 1 ORDER BY id';

    echo "<table><tr><th>User</th><th>Date</th><th>Living Expense</th><th>Food Expense</th><th>Tithing</th><th>Others</th><th>Saving</th></tr>";
    foreach ($db->query($sqlstring) as $row)
    {
    	echo "<tr><td>".$row['username']."</td><td>".$row['date']."</td><td>".$row['living_exp']."</td><td>".$row['food_exp']."</td><td>".$row['tithing']."</td><td>".$row['others']."</td><td>".$row['saving']."</td><td><button type=\"button\"><a href=\"#\">EDIT</a></button></td><td><button type=\"button\"><a href=\"#\">DELETE</a></button></td></tr>";
    	//echo $row['living_exp'] . ' ' . $row['tithing'] . ' '. $row['food_exp']. ' ' . $row['others'] . ' '. $row['saving'];
    }

    echo "</table>";

?>


  </body>
 </html>