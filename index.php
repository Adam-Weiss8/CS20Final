<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="style.css" />

    <title>GymPal</title>
  </head>
  <body>
  <nav>
    <div class="logo">
    <h2><a href="index.html" style = "text-decoration:none; 
    color:rgb(255, 254, 254); font-size:35px;">
    GymPal</a></h2>
    </div>

    <ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="about_us.html">About</a></li>
    <li><a href="profile_page.php">About</a></li>
    <li><a href="exercises.html">Workouts </a></li>
    <li><a href="contact.html">Contact</a></li>

	<!-- Change the nav bar depending on whether the user is signed in or not -->
    <?php
      if ($_SESSION['user_id']) {
        echo '<li><a href="profile_page.php">Profile Page</a></li>';
      } else {
        echo '<li><a href="signup.html">Sign up/Login</a></li>';
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


<br><br><br><br><br><br><br><br><br><br><br><br><br>





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