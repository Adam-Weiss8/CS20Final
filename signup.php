<?php

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO users (username, password, joinDate, workoutsCompleted, height, weight, age)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "sssssss",
    $_POST["username"],
    $_POST["password"],
    date("Y-m-d H:i:s"), // current timestamp for joinDate
    0, // workoutsCompleted set to 0 by default
    $_POST["height"],
    $_POST["weight"],
    $_POST["age"]
);

if ($stmt->execute()) {
    header("Location: profile_page.html");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Username already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
?>
