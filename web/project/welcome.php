<?php
session_start();
if (isset($_SESSION) && isset($_SESSION['user_id']) && $_SESSION["auth"] == 'True') {

} else {
    header("Location: login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<h1 id="result"><?php  echo 'Welcome '.$_SESSION["user_id"]; ?></h1>
</body>
</html>