<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>GymPal - Welcome</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet" />

  <!-- Styles -->
  <link rel="stylesheet" href="style.css" />
  <style>
  .hero h1,
  .hero p {
	text-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
  }

  /* Add custom styles for this page */
  body {
    margin: 0;
    padding: 0;
    font-family: 'Rubik', sans-serif;
  }
  .hero {
    background-image: url('https://source.unsplash.com/1600x900/?gym');
    background-size: cover;
    background-position: center center;
    height: 90vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: white;
  }
  .hero h1 {
    font-size: 5rem;
    margin-bottom: 2rem;
  }
  .hero p {
    font-size: 2rem;
    margin-bottom: 3rem;
  }
  .hero a {
    display: inline-block;
    background-color: #27ae60;
    color: #ffffff;
    font-size: 1.6rem;
    padding: 1rem 1.5rem;
    margin-bottom: 1rem;
    width: 180px;
    text-align: center;
  }
  .hero a:hover {
    background-color: #1d945b; 
  }
  .footer {
    background-color: #222;
    color: white;
    padding: 3rem;
    text-align: center;
  }
  .footer h3 {
    margin-bottom: 1.5rem;
    font-size: 2rem;
  }
  .footer ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  .footer li {
    margin: 0 1rem;
  }
  .footer a {
    color: white;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
  }
  .footer a:hover {
    color: #f65c78;
  }
  /* Add styles for login and signup buttons */
  .hero a {
    background-color: rgb(38, 70, 83); /* Same color as the navigation bar */
    font-size: 1.6rem; /* Same font size as the navigation bar */
    padding: 1.2rem 2rem; /* Same padding as the navigation bar */
    margin-right: 1rem; /* Add this to give space between the buttons */
  }
  .hero a:hover {
    background-color: #1d3844; /* Same hover color as the navigation bar */
  }
  </style>
</head>
<body>
  <nav>
    <div class="logo">
      <h2><a href="index.php" style="text-decoration:none; 
        color:rgb(255, 254, 254); font-size:35px;">
          GymPal</a></h2>
    </div>
  
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="about_us.php">About</a></li>
      <li><a href="exercises.php">Workouts </a></li>
      <li><a href="workout.php">Create</a></li>
      <li><a href="contact.php">Contact</a></li>
      <?php
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
  <section class="hero">
    <h1>Welcome to GymPal</h1>
    <p>Your ultimate fitness companion</p>
    <a href="signup.php">Sign Up</a>
    <a href="login.php">Login</a>
  </section>
        <footer>
          <div class="footer-wrapper">
            <div class="footer-col">
              <h3>GymPal</h3>
              <ul>
                <li><a href="about_us.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="exercises.php">Workouts</a></li>
                <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Blog</a></li>
              </ul>
            </div>
            <div class="footer-col-2">
              <h3>Connect with us</h3>
              <ul>
                <li><a href="https://www.facebook.com/" class="facebook" target="_blank"></a></li>
                <li><a href="https://twitter.com/" class="twitter" target="_blank"></a></li>
                <li><a href="https://www.instagram.com/?hl=en" class="instagram" target="_blank"></a></li>
                <li><a href="https://www.linkedin.com/" class="linkedin" target="_blank"></a></li>
              </ul>
            </div>
          </div>
        </footer>
</body>
</html>