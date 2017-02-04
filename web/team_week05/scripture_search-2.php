<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scripture Resources - Search Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/cs313-php.css">
</head>
<body>
<h1>Scripture Resources</h1>
<br />
<form method="post" action="">
    <label for="searchval">Enter search term:</label>
    <input type="text" name="searchval" id="searchval">
    <button name="submit" type="submit">Go!</button>
</form>
<?php
include 'dbstuff.inc';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbstuff.inc';
    $searchval = htmlspecialchars($_POST["searchval"]);

    echo "<br />";

    $sqlstring = 'SELECT id, book, chapter, verse from scripture WHERE book = \''. html_entity_decode($searchval) .'\'';
    foreach ($db->query($sqlstring) as $row)
    {
        echo "<p><span id='scriptref'><a href='search_results.php?id=$row[0]'>$row[1] $row[2]:$row[3]</a></span></p>\n\n";
    }
}
?>
<br />
<hr>
<br />
<a href="week5group1-2.php">Initial Core Requirements Page</a>
</body>
</html>
