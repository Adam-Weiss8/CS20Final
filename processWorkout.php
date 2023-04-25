<?php
//make database connection
$host = "localhost";
$dbname = "dbc82q21fitl3f";
$username = "u2n1ng4b03xgl";
$password = "j1}1371||m~~";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

//set variables for the workout table
$numExercises = $_POST["numExercises"];
$workoutName = $_POST["workoutName"];
$workoutDate = $_POST["date"];
$userID = $_SESSION["user_id"];

// Create SQL query to insert workout
$sql = "INSERT INTO Workouts (type, date, userID) VALUES ('$workoutName', '$workoutDate', '$userID')";
mysqli_query($mysqli, $sql);

//get the workout id of the workout just inserted
$sql = "SELECT MAX(workoutID) FROM Workouts";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_row($result);
$WorkoutID = $row[0];

//add all exercises to the exercise table
for ($i = 0; $i < $numExercises; $i++) {
        $exerciseNum = strval($_POST["exerciseName" . $i]);
        $sets = intval($_POST["sets" . $i]);
        $reps = intval($_POST["reps" . $i]);
        $weight = strval($_POST["weight" . $i]);

         echo "<script>console.log('$exerciseNum');</script>";

        //echo "<script>console.log(". $exerciseNum .  $sets . $reps . $weight . ") </script>"


        //add data to the database
        $sql = "INSERT INTO exercises (exerciseName, workoutID, reps, sets, weight) VALUES ('$exerciseNum', '$WorkoutID', '$sets', '$reps', '$weight')";
        mysqli_query($mysqli, $sql);
}



mysqli_close($mysqli);
header("Location: profile_page.php");
exit;
?>
