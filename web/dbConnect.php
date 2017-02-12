<?php
function get_db() {
	$db = NULL;
	$dbUser = 'tvykcavenuypkg';
  	$dbPassword = 'e4cd5d6eca8fa1f7d9ead148580cc0c1b30cde2f37f4276da626ce47275eba0c';
  	$dbName = 'd38uii2m3augn0';
  	$dbHost = 'ec2-54-225-122-119.compute-1.amazonaws.com';
  	$dbPort = '5432';
echo "Openeuccessfully\n";
	  try {
	    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	    echo "Opened database successfully\n";
	  } catch (PDOException $ex) {
	    echo "Error connecting to DB. Details: $ex";
	    die();
	  }
	  	return $db;
}
 ?>