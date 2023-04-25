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
      <li><a href="contact.php">Contact</a></li>
      <li><a href="login.php">Login</a></li>
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
        <div>
            <label for="height">Height:</label>
            <input type="height" id="height" name="height">
        </div>
        <div>
            <label for="weight">Weight:</label>
            <input type="weight" id="weight" name="height">
        </div>
        <div>
            <label for="age">Age:</label>
            <input type="age" id="age" name="age">
        </div>
      <button type="submit">Sign Up</button>
    </form>
  </div>
  
  <script>
  const signupForm = document.getElementById("signupForm");
  const weightInput = document.getElementById("weight");
  const heightInput = document.getElementById("height");
  const ageInput = document.getElementById("age");

  signupForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const height = weightInput.value;
    const weight = heightInput.value;
	const age = ageInput.value;

    // Check for non-empty username
    if (height.trim() === "") {
      alert("Height cannot be empty");
      return;
    }

    if (weight.trim() === "") {
      alert("Weight cannot be empty");
      return;
    }

    if (age.trim() === "") {
      alert("Age cannot be empty");
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