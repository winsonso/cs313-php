<?php
require("dbConnect.php");
$db = get_db();

if ($_POST) {
    $sql_string = "INSERT INTO account(username, password) values (?,?)";
    $statement = $db->prepare($sql_string);

    $statement->execute(array(filter_var($_POST["userid"], FILTER_SANITIZE_STRING),
        password_hash(filter_var($_POST["password"], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT)));
    $newId = $db->lastInsertId('users_id_seq');
}
echo filter_var($_POST["userid"], FILTER_SANITIZE_STRING);
?>