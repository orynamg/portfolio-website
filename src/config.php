<?php

// $dbhost = getenv("MYSQL_SERVICE_HOST") ?: "localhost";
// $dbport = getenv("MYSQL_SERVICE_PORT")?: "3306";
// $dbuser = getenv("DATABASE_USER") ?: "phpuser2";
// $dbpwd = getenv("DATABASE_PASSWORD") ?: "phpuser2";
// $dbname = getenv("DATABASE_NAME") ?: "portfolio2";

// $link = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname);
// // Check connection
// if($link === false){
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$link = mysqli_connect($server, $username, $password, $db);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>