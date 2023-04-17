<?php
$invalid_login = false;
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     $mysqli = require __DIR__ . "/database.php";
    
//     $username = $mysqli->real_escape_string($_POST["username"]);
//     $password = $mysqli->real_escape_string($_POST["password"]);
    
//     $sql = sprintf("SELECT * FROM users
//                     WHERE username = '%s' AND password = '%s'",
//                    $username, $password);
    
//     $result = $mysqli->query($sql);
//     if ($result === false) {
//         // Handle MySQL error
//         die("Error executing query: " . $mysqli->error);
//     }
    
//     $user = $result->fetch_assoc();
    
//     if ($user) {
//         session_start();
//         session_regenerate_id();
//         $_SESSION["user_id"] = $user["id"];
//         header("Location: profile.html");
//         exit;
//     } else {
//         $invalid_login = true;
// 		echo "<script>alert('Invalid username or password');</script>";
//     }
// }
session_start();
if(isset($_SESSION['user_id'])) {
	echo "Your session is running " . $_SESSION['user_id'];
  }
?>


<!DOCTYPE html>
<html>

<head>
	<title>My Profile Page</title>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		.container {
			max-width: 100%;
			margin-left: 0;
			margin-right: auto;
			padding: 40px;
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
			display: flex;
			flex-direction: row;
			align-items: flex-start;
			justify-content: flex-start;
			object-fit: cover;
		}

		.profile-container {
			max-width: 100%;
			padding-left: 40px;
			padding-bottom: 40px;
			background-color: #fff;
			/* margin-left: 0; */
			margin-right: auto;
		}

		.profile-picture {
			display: block;
			margin: 0;
			padding: 0;
			border-radius: 50%;
			width: 200px;
			height: 200px;
			object-fit: cover;
			order: 1;
		}

		.profile-info {
			text-align: left;
			margin-top: 20px;
			margin-left: 40px;
			order: 2;
		}

		.profile-name {
			font-size: 32px;
			margin-bottom: 10px;
			color: #333;
		}

		.member-since {
			font-size: 16px;
			color: #666;
			margin-bottom: 20px;
		}

		.profile-stats {
			display: flex;
			flex-direction: row;
			line-height: 1.5;
		}

		.workouts-completed,
		.weight,
		.height,
		.age {
			color: #666;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-top: 10px;

		}

		.workouts-container {
			display: grid; 
			grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
			grid-template-rows: 1fr;
			/* grid-auto-rows: auto; */
			grid-gap: 20px;
			margin-top: 40px;
			padding: 20px;
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
			/* align-items: center; align vertical */
			overflow-y: scroll;
		}

		.workout-date {
			font-size: 24px;
			color: #333;
			margin-bottom: 10px;
		}

		.workout-exercise {
			font-size: 16px;
			color: #666;
			margin-bottom: 5px;
		}

		.workout-dropdown {
			display: inline-block;
			position: relative;
			margin-right: 20px;
		}

		.workout-card {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
			margin: 20px;
			padding: 20px;
			width: 300px;
		}

		.workout-card h2 {
			margin-top: 0;
		}

		.workout-card p {
			margin: 10px 0;
		}

		.workout-dropdown-content {
			display: none;
			position: absolute;
			z-index: 1;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
			padding: 12px 16px;
			margin-top: 10px;
			border-radius: 5px;
		}

		.workout-dropdown:hover .workout-dropdown-content {
			display: block;
		}

		.workout-dropdown-content a {
			display: block;
			padding: 5px 0;
			color: #333;
		}

		.workout-dropdown-content a:hover {
			background-color: #ddd;
		}

		h1 {
			font-size: 36px;
			font-weight: bold;
			text-align: center;
			color: #333;
			transform: translateY(40%);

		}
		td, th {
  			text-align: center;
		}
	</style>
</head>

<body>
	<div class="container">
		<img class="profile-picture" src="https://via.placeholder.com/200x200" alt="Profile Picture">
		<div class="profile-info">
			<div class="profile-name">John Doe</div>
			<div class="member-since">Member since January 2022</div>
		</div>
		
	</div>

	<div class="profile-container">
		<div class="profile-stats">
			<div class="workouts-completed"><strong>Workouts completed:</strong> 25</div>
			<div class="weight"><strong>Weight:</strong> 185</div>
			<div class="height"><strong>Height:</strong> 6'0</div>
			<div class="age"><strong>Age:</strong> 23</div>
		</div>
	</div>

	<div class="workouts-container">
		<h1> Workouts </h1>
		<div class="workout-card">
			<h2>Cardio</h2>
			<p><strong>Date: </strong> April 1, 2023</p>
			<p><strong>Exercise: </strong> 
			<div class="workout-dropdown">
				<span>Running</span>
			</div>
			</p>
			<p><strong>Duration:</strong> 30 minutes</p>
		</div>
		<div class="workout-card">
			<h2>Upper Body</h2>
			<p><strong>Date: </strong> March 30, 2023</p>
			<p><strong>Exercise: </strong>
			<div class="workout-dropdown">
				<span>Upper body</span>
				<div class="workout-dropdown-content">
					<a href="#">Bench press 3 x 8</a>
					<a href="#">Shoulder press</a>
					<a href="#">Lat pulldown</a>
				</div>
			</div>
			</p>
			<p><strong>Sets: </strong> 3</p>
			<p><strong>Reps: </strong> 10</p>
		</div>
		<div class="workout-card">
			<h2>Lower Body</h2>
			<p><strong>Date: </strong> March 27, 2023
			<p><strong>Exercise: </strong>
			<div class="workout-dropdown">
				<span>Lower body</span>
				<div class="workout-dropdown-content">
					<a href="#">Squats</a>
					<a href="#">Calf Raises</a>
					<a href="#">Lunges</a>
				</div>
			</div>
			</p>
			<p><strong>Sets: </strong> 3</p>
			<p><strong>Reps: </strong> 10</p>
		</div>
		<div class="workout-card">
			<h2>Lower Body</h2>
			<p><strong>Date: </strong> March 27, 2023
			<p><strong>Exercise: </strong>
			<div class="workout-dropdown">
				<span>Lower body</span>
				<div class="workout-dropdown-content">
					<a href="#">Squats</a>
					<a href="#">Calf Raises</a>
					<a href="#">Lunges</a>
				</div>
			</div>
			</p>
			<p><strong>Sets: </strong> 3</p>
			<p><strong>Reps: </strong> 10</p>
		</div>
	</div>
</body>
</html>