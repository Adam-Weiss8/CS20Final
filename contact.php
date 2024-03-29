<?php
  session_start();
?>
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
  <style>
    /* Centering the form */
    .signup-form {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: #f2f2f2;
    }
    .signup-form form {
      width: 300px;
      text-align: center;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
    }
	.signup-form {
	  display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background-color: #f2f2f2;
    }

    .signup-form h1 {
      font-size: 24px;
    }
    .signup-form input {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 20px;
      border: none;
      border-bottom: 1px solid #ddd;
    }
    .signup-form button {
      width: 100%;
      padding: 10px;
      background-color: #595959; /* Updated button color to match header bar */
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .signup-form button:hover {
      background-color: #454545; /* Updated hover color */
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
  
  <div class="signup-form">
  <form id="signupForm" method="post" id="signup">
    <h1>Contact us:</h1>
    <div>
      <label for="name">Name:</label>
      <input type="name" id="name" name="name" required>
    </div>
    <div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
	<div>
      <label for="answer">Message:</label>
	</div>
	<div>
      <textarea id="answer" name="answer" rows="5" required></textarea>
    </div>
    <button type="submit">Send message</button>
  </form>
</div>

<script>
const signupForm = document.getElementById("signupForm");
const usernameInput = document.getElementById("username");
const passwordInput = document.getElementById("password");
const passwordConfirmationInput = document.getElementById("password_confirmation");
const creditCardInput = document.getElementById("credit_card");
const securityCodeInput = document.getElementById("security_code");
const expirationDateInput = document.getElementById("expiration_date");

signupForm.addEventListener("submit", (event) => {
  event.preventDefault();

  const username = usernameInput.value;
  const password = passwordInput.value;
  const passwordConfirmation = passwordConfirmationInput.value;
  const creditCardNumber = creditCardInput.value;
  const securityCode = securityCodeInput.value;
  const expirationDate = expirationDateInput.value;

  // Check for non-empty username
  if (username.trim() === "") {
    alert("Username cannot be empty");
    return;
  }

  // Check for password length
  if (password.length < 8) {
    alert("Password must be at least 8 characters long");
    return;
  }

  // Check for matching passwords
  if (password !== passwordConfirmation) {
    alert("Passwords do not match");
    return;
  }

  // Check for valid credit card number
  if (!creditCardNumber.match(/^\d{16}$/)) {
    alert("Invalid credit card number");
    return;
  }

  // Check for valid security code
  if (!securityCode.match(/^\d{3}$/)) {
    alert("Invalid security code");
    return;
  }

  // Check for valid expiration date
  if (!expirationDate.match(/^(0[1-9]|1[0-2])\/\d{2}$/)) {
    alert("Invalid expiration date");
    return;
  }

  // Add your sign-up logic here
  signupForm.submit();
});
</script>

  
  
  
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