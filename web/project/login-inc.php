<?php
require("dbConnect.php");
$db = get_db();

if ($_POST) {
    $sql_string = "SELECT username, password FROM account WHERE username='".$_POST["loginuserid"]."'";
    $statement = $db->prepare($sql_string);

    $statement->execute();
    $newId = $db->lastInsertId('users_id_seq');  //??
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $username = $row["username"];
        $password = $row["password"];
    }

    if (password_verify(filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING),$password)) {
        session_start();
        $_SESSION["user_id"] = $username;
        $_SESSION["auth"] = 'True';
        echo 'valid';
    } else {
        echo 'Bad User Name / Password combination.  Try again.';
    }
}
?>