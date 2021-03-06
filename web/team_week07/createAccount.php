<?php
/**********************************************************
* File: createAccount.php
* Author: Br. Burton
* 
* Description: Accepts a new username and password on the
*	POST variable, and creates it in the DB.
*
* The user is then redirected to the signIn.php page.
*
***********************************************************/
// If you have an earlier version of PHP (earlier than 5.5)
// You need to download and include password.php.
//require("password.php");
// get the data from the POST
$username = $_POST['txtUser'];
$password = $_POST['txtPassword'];
// if (!isset($username) || $username == ""
// 	|| !isset($password) || $password == "")
// {
// 	header("Location: signUp.php");
// 	die(); // we always include a die after redirects.
// }
echo "username=".$username;
echo "pw=".$password;
// Let's not allow HTML in our usernames. It would be best to also detect this before
// submitting the form and preven the submission.
$username = htmlspecialchars($username);
// Get the hashed password.
//$password = md5($password);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
// Connect to the database
//$password = $hashedPassword;

require("dbConnect.php");
$db = get_db();
try
{
	echo "username2=".$username;
echo "pw2=".$hashedPassword;
	$query = "INSERT INTO login(username, password) VALUES(:username, :password)";
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	// // **********************************************
	// // NOTICE: We are submitting the hashed password!
	// // **********************************************
	$statement->bindValue(':password', $hashedPassword);
	$statement->execute();
	echo "New record created successfully";
}
catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}
// finally, redirect them to the sign in page
header("Location: signIn.php");
die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.
?>