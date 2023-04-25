<?php
$invalid_login = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/database.php";
    
    $username = $mysqli->real_escape_string($_POST["username"]);
    $password = $mysqli->real_escape_string($_POST["password"]);
    
    $sql = sprintf("SELECT * FROM users
                    WHERE username = '%s' AND password = '%s'",
                   $username, $password);
    
    $result = $mysqli->query($sql);
    if ($result === false) {
        // Handle MySQL error
        die("Error executing query: " . $mysqli->error);
    }
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        session_start();
        session_regenerate_id();
        $_SESSION["user_id"] = $user["id"];
        header("Location: profile.html");
        exit;
    } else {
        $invalid_login = true;
		echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <title>GymPal - Login</title>
  <style>
    /* Centering the form */
    .login-form {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: #f2f2f2;
    }
    .login-form form {
      width: 300px;
      text-align: center;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
    }
	.login-form {
	  display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: calc(100vh - 200px); /* Subtracting the height of the header */
      background-color: #f2f2f2;
    }
    .login-form h1 {
      font-size: 24px;
    }
    .login-form input {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 20px;
      border: none;
      border-bottom: 1px solid #ddd;
    }
    .login-form button {
      width: 100%;
      padding: 10px;
      background-color: #595959;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .login-form button:hover {
      background-color: #454545;
    }
  </style>
</head>
<body>
  <nav>
    <div class="logo">
      <h2><a href="index.html" style="text-decoration:none; 
        color:rgb(255, 254, 254); font-size:35px;">
          GymPal</a></h2>
    </div>
  
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="about_us.html">About</a></li>
      <!-- <li><a href="prrofile_page.php">About</a></li> -->
      <li><a href="exercises.html">Workouts </a></li>
      <li><a href="workout.html">Create</a></li>
      <li><a href="contact.html">Contact</a></li>
      <li><a href="signup.html">Sign up/Login</a></li>
    </ul>
    <div class="menu-bars">
      <input type="checkbox">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>
  
  
  <?php if ($invalid_login): ?>
        <em>Invalid login</em>
    <?php endif; ?>
  
  
  <div class="login-form">
  <form method="post">
    <h1>Login</h1>
		<label for="username">Username:</label>
        <input type="username" name="username" id="username" value="<?= $_POST["username"] ?? "" ?>">
    
		<label for="password">Password:</label>
        <input type="password" name="password" id="password">
    <button type="submit">Login</button>
    <p>New to GymPal? <a href="signup.html">Signup</a></p>
  </form>
</div>



  
  <footer>
        <div class="footer-wrapper">
          <div class="footer-col">
            <h3>GymPal</h3>
            <ul>
              <li><a href="about_us.html">About</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="exercises.html">Workouts</a></li>
              <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Blog</a></li>
            </ul>
          </div>
          <div class="footer-col-2">
            <h3>Connect with us</h3>
            <ul>
                <li><a href="https://www.facebook.com/" class="facebook"></a></li>
                <li><a href="https://twitter.com/" class="twitter"></a></li>
                <li><a href="https://www.instagram.com/?hl=en" class="instagram"></a></li>
                <li><a href="https://www.linkedin.com/" class="linkedin"></a></li>
            </ul>
          </div>
        </div>
    </footer>
</body>
</html>
