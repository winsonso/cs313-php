
<?php
session_start();
if (isset($_SESSION['username']))
{
  $username = $_SESSION['username'];
}
else
{
  header("Location: signIn.php");
  die(); // we always include a die after redirects.
}

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
     <h2>Hello: <?= $username ?></h2><br />
     <button type="button"><a href="addDate.php">ADD YOUR RECORD!</a></button>
<?php
    $sql = "SELECT id FROM login WHERE username ='". $username."'";
    foreach ($db->query($sql) as $_id)
    {
      $_SESSION['login_id'] = $_id['id'];
    }

    $sqlstring = "SELECT * FROM record INNER JOIN login ON record.ac_id = login.id WHERE login.username ='". $username."' ORDER BY record_id";

    echo "<table><tr><th>User</th><th>Date</th><th>Living Expense</th><th>Food Expense</th><th>Tithing</th><th>Others</th><th>Saving</th></tr>";
    foreach ($db->query($sqlstring) as $row)
    {
    	echo "<tr><td>".$row['username']."</td><td>".$row['month'].' '.$row['year']."</td><td>".$row['living_exp']."</td><td>".$row['food_exp']."</td><td>".$row['tithing']."</td><td>".$row['others']."</td><td>".$row['saving']."</td><td><button type=\"button\"><a href=\"edit.php?id=".$row['record_id']."\">EDIT</a></button></td><td><button type=\"button\"><a href=\"delete.php?id=".$row['record_id']."\">DELETE</a></button></td></tr>";

    }

    echo "</table>";

?>
<br>
<a class="sign" href="signOut.php">Sign Out</a>


  </body>
 </html>
