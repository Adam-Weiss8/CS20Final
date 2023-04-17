<?php

$host = "localhost";
$dbname = "dbc82q21fitl3f";
$username = "u2n1ng4b03xgl";
$password = "j1}1371||m~~";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;


?>