<?php
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
  }
?>


<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="style.css" />
	<title>My Profile Page</title>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: 'Rubik', sans-serif;
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
	<nav>
		<div class="logo">
		<h2><a href="index.php" style = "text-decoration:none; 
		color:rgb(255, 254, 254); font-size:35px;">
		GymPal</a></h2>
		</div>

	<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="about_us.php">About</a></li>
	<li><a href="exercises.php">Workouts</a></li>
	<li><a href="workout.php">Create</a></li>
	<li><a href="contact.php">Contact</a></li>

	<!-- Change the nav bar depending on whether the user is signed in or not -->
	<?php
        session_start();
        if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            echo '<li><a href="profile_page.php">Profile</a></li>';
        } else {
            echo '<li><a href="login.php">Login</a></li>';
        }
      ?>
	</ul>
	<div class="menu-bars">
	<input type="checkbox">
	<span></span>
	<span></span>
	<span></span>
	</div>
	</nav>


	<script>
	const menuToggle= document.querySelector(".menu-bars");
	const nav = document.querySelector("nav ul");


	menuToggle.addEventListener("click", () => {
	nav.classList.toggle("slide");
	});
	</script>

	
	<div class="container">
		<img class="profile-picture" src="https://via.placeholder.com/200x200" alt="Profile Picture">
		<div class="profile-info">
		<?php
			$mysqli = require __DIR__ . "/database.php";
			$user = $_SESSION["user_id"];
			$query = "SELECT * FROM users WHERE userID = '$user'";
			$res = $mysqli->query($query);
			$row = $res->fetch_assoc();
			$join = substr($row['joinDate'], 0, 10);
			echo '<div class="profile-name">' . $row['FirstName'] . ' ' . $row['LastName'] . '</div>';
			echo '<div class="member-since"> Member since '. $join . '</div>';
		?>

		</div>
		
	</div>

	<div class="profile-container">
		<div class="profile-stats">
		<?php 
		echo '<div class="workouts-completed"><strong>Workouts completed: </strong>' . $row['workoutsCompleted'] . '</div>';
		echo '<div class="weight"><strong>Weight: </strong>' . $row['weight'] . '</div>';
		echo '<div class="height"><strong>Height: </strong>' . $row['height'] . '</div>';
		echo '<div class="age"><strong>Age: </strong>' . $row['age'] . '</div>';
		?>
		</div>
	</div>
	<div class="workouts-container">
		<h1> Workouts </h1>
<?php
	
	$id = $_SESSION["user_id"];
	$sql = "SELECT type, date, workoutID FROM Workouts WHERE userID = '$id'";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {

		// Each row is a Workout Card
		while($row = $result->fetch_assoc()) {
			$type = $row["type"];
			$date = $row["date"];

			/* echoing the workout type and date */
			echo '<div class = "workout-card">';

			/* Echoing the type as the H2 header */
			echo '<h2>' . $type . '</h2>';
			echo '<p><strong>Date: </strong>' . $date . '</p>';
			echo '<p><strong>Exercise: </strong> ';
			echo '<div class ="workout-dropdown">';
			echo '<span>' .$type .'</span>';
			$workoutID = $row["workoutID"];
			$sql2 = "SELECT exerciseName, reps, sets, weight FROM exercises WHERE workoutID = '$workoutID'";
			$res2 = $mysqli->query($sql2);

			/* Each inner row is an exercise in the workout-dropdown class */
			echo '<div class="workout-dropdown-content">';

			while ($innerRow = $res2->fetch_assoc()) {
				$sets = $innerRow["sets"];
				$reps = $innerRow["reps"];
				$weight = $innerRow["weight"];
				$name = $innerRow["exerciseName"];
				echo '<a href="#">' . $name . ' ' . $sets . 'x' . $reps . ' @ ' . $weight . 'lbs</a>';
			}
			
			/* Close the workout dropdown div and workout*/
			echo '</div>';
			echo '</div>';
			echo '</p>';
			echo '</div>';
		}
	  }
?>
</div>
		<!-- <div class="workout-card">
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
	</div> -->
</body>
</html>