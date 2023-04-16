<?php

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO users (username, password)
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ss",
                  $_POST["username"],
                  $_POST["password"];
                  
if ($stmt->execute()) {

    header("Location: profile_page.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("username already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
