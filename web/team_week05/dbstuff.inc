<?php

// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 //$dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
 $dbUrl   = "postgres://tvykcavenuypkg:e4cd5d6eca8fa1f7d9ead148580cc0c1b30cde2f37f4276da626ce47275eba0c@ec2-54-225-122-119.compute-1.amazonaws.com:5432/d38uii2m3augn0";
}

$dbopts = parse_url($dbUrl);

//print "<p>$dbUrl</p>\n\n";

$dbHost = $dbopts["host"];

$dbPort = $dbopts["port"];

$dbUser = $dbopts["user"];

$dbPassword = $dbopts["pass"];

$dbName = ltrim($dbopts["path"],'/');


//print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
 print "<p>error: $ex->getMessage() </p>\n\n";
 die();
}

?>