<?php

$host = "localhost";
$dbname = "dbzg3bcp49ujsy";
$username = "u2n1ng4b03xgl";
$password = "j1}1371||m~~";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;

?>