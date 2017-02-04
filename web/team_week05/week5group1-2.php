<!DOCTYPE html>
<html lang="en">
<head>
  <title>Scripture Resources</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/cs313-php.css">
</head>
<body>
<h1>Scripture Resources</h1>
<br />
<?php
include 'dbstuff.inc';



foreach ($db->query('SELECT * from scriptures') as $row)
{
 print "<p><span id='scriptref'>$row[1] $row[2]:$row[3]</span> - \"$row[4]\"</p>\n\n";
}
?>
<br />
<hr>
<br />
<a href="scripture_search.php">Scripture Search Page - Stretch Challenges</a>
</body>
</html>