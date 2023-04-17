<?php

$mysqli = require __DIR__ . "/database.php";

// Check if the username already exists in the database
$checkUsernameStmt = $mysqli->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
$checkUsernameStmt->bind_param("s", $_POST["username"]);
$checkUsernameStmt->execute();
$checkUsernameStmt->bind_result($count);
$checkUsernameStmt->fetch();
$checkUsernameStmt->close();

if ($count > 0) {
    echo "<script>alert('Account with this username already exists');</script>";
    echo "<script>window.location.href = 'signup.html';</script>"; // Redirect back to signup.html
    exit; // Exit to prevent further execution of the script
} else {
    $sql = "INSERT INTO users (username, password, joinDate, workoutsCompleted, height, weight, age)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $joinDate = date("Y-m-d H:i:s"); // store the result of date() in a variable

    // Check if height value is provided and not empty
    if (isset($_POST["height"]) && !empty($_POST["height"])) {
        $height = $_POST["height"];
    } else {
        // Set a default value for height if not provided
        $height = 0;
    }

    // Check if weight value is provided and not empty
    if (isset($_POST["weight"]) && !empty($_POST["weight"])) {
        $weight = $_POST["weight"];
    } else {
        // Set a default value for weight if not provided
        $weight = 0;
    }

    // Check if age value is provided and not empty
    if (isset($_POST["age"]) && !empty($_POST["age"])) {
        $age = $_POST["age"];
    } else {
        // Set a default value for age if not provided
        $age = 0;
    }

    $stmt->bind_param(
        "sssssss",
        $_POST["username"],
        $_POST["password"],
        $joinDate, // pass the reference to the variable here
        $workoutsCompleted = 0, // use a separate variable for workoutsCompleted
        $height, // use the validated height value
        $weight, // use the validated weight value
        $age // use the validated age value
    );

    if ($stmt->execute()) {
        header("Location: login.php");
        exit;
    } else {
        die($stmt->error . " " . $stmt->errno);
    }
}
?>
