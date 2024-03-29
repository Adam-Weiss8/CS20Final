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
      height: 125vh;
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
      <h2><a href="index.php" style="text-decoration:none; color:rgb(255, 254, 254); font-size:35px;">GymPal</a></h2>
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
    <form id="signupForm" action="signupForm.php" method="post" id="signup">
      <h1>Subscribe: $9.99/month</h1>
      <div>
            <label for="username">Username:</label>
            <input type="username" id="username" name="username">
        </div>
        
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>	
		<div>
            <label for="password_confirmation">Repeat password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
		<div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
    </div>
    <div>
      <label for="card-num">Credit Card Number:</label>
      <input type="text" id="card-num" name="card-num">
    </div>
    <div>
      <label for="card-security-code">Security Code:</label>
      <input type="text" id="card-security-code" name="card-security-code">
    </div>
    <div>
      <label for="card-expiration">Expiration Date (XX/XX):</label>
      <input type="text" id="card-expiration" name="card-expiration">
    </div>
      <button type="submit">Sign Up</button>
    </form>
  </div>
  
  <script>
  const signupForm = document.getElementById("signupForm");
  const usernameInput = document.getElementById("username");
  const passwordInput = document.getElementById("password");
  const emailInput = document.getElementById("email");
  const passwordConfirmationInput = document.getElementById("password_confirmation");
  const cardNumInput = document.getElementById("card-num");
  const cardSecurityCodeInput = document.getElementById("card-security-code");
  const cardExpirationInput = document.getElementById("card-expiration");

  signupForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const username = usernameInput.value;
    const password = passwordInput.value;
    const passwordConfirmation = passwordConfirmationInput.value;
	const email = emailInput.value;
    const cardNum = cardNumInput.value;
    const cardSecurityCode = cardSecurityCodeInput.value;
    const cardExpiration = cardExpirationInput.value;

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

    // Check for valid email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!email.match(emailRegex)) {
    alert("Invalid email address");
    return;
  }

  // Check for valid credit card number
  const cardNumRegex = /^\d{16}$/;
  if (!cardNum.match(cardNumRegex)) {
    alert("Credit card number must be 16 digits");
    return;
  }

    // Check for valid credit card security code
    const cardSecurityCodeRegex = /^\d{3}$/;
    if (!cardSecurityCode.match(cardSecurityCodeRegex)) {
      alert("Credit card security code must be 3 digits");
      return;
    }
	
	// Check for valid credit card expiration date
    const cardExpirationRegex = /^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/;
    if (!cardExpiration.match(cardExpirationRegex)) {
      alert("Invalid credit card expiration date");
      return;
    }
	
	
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