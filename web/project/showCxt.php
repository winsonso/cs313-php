<?php
require("dbConnect.php");
$db = get_db();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Content</title>
    <link rel="stylesheet" href="">
  </head>
  <body>
     <h1>Expense Tracker</h1>
<?php
     $sqlstring = 'SELECT * FROM record INNER JOIN account ON record.ac_id = account.id WHERE account.id = 1 ORDER BY id';

    foreach ($db->query($sqlstring) as $row)
    {

    	echo $row['living_exp'] . ' ' . $row['tithing'] . ' '. $row['food_exp']. ' ' . $row['others'] . ' '. $row['saving'];
    }

?>


  </body>
 </html>