<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
	<title>Workout Tracker - About Us</title>
	<style>
		body {
            font-family: 'Rubik', sans-serif;
            margin: 0;
			padding: 0;
		}
		
		.container {
			margin: 20px auto;
			padding: 20px;
			max-width: 800px;
		}
		
		h2 {
			font-size: 24px;
			margin-top: 0;
		}
		
		p {
			line-height: 1.5;
			margin: 10px 0;
		}

        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .column {
            float: left;
            width: 25%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
            border-radius: 10px;
        }

        .founders_container {
            padding: 0 16px;
            overflow: hidden;
        }

        .founders_container h2 {
            text-align: center;
        }

        .founders_container p {
            text-align: right;
        }

        .founders_container::after,
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        }

        @media screen and (max-width: 800px) {
            .column {
                width: 50%;
            }
        }

        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }



        .about-section {
            border-radius: 20px;
            background-color: lightsalmon;
            padding: 20px;
            text-align: center;
            margin: 20px auto;
            max-width: 80%;
        }

        .founders_container::after,
        .row::after {
            content: "";
            clear: both;
            display: table;
        }


        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: rgb(27, 104, 135);
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background-color: #555;
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
                <!-- <li><a href="prrofile_page.php">About</a></li> -->
                <li><a href="exercises.php">Workouts </a></li>
                <li><a href="workout.php">Create</a></li>
                <li><a href="contact.php">Contact</a></li>
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
        const menuToggle = document.querySelector(".menu-bars");
        const nav = document.querySelector("nav ul");


        menuToggle.addEventListener("click", () => {
            nav.classList.toggle("slide");
        });

        function sendNickEmail() {
                window.location.href = "mailto:nicholas.chen632138@tufts.edu?subject=Hello%20&body=How%20are%20you%3F";
            }

            function sendJakeEmail() {
                window.location.href = "mailto:jacobfreedman@tufts.edu?subject=Hello%20&body=How%20are%20you%3F";
            }

            function sendAdamEmail() {
                window.location.href = "mailto:Adam.Weiss@tufts.edu?subject=Hello%20&body=How%20are%20you%3F";
            }

            function sendRodrigoEmail() {
                window.location.href = "mailto:rodrigo.campos@tufts.edu?subject=Hello%20&body=How%20are%20you%3F";
            }
    </script>


    <!-- Insert Logo Here -->

	<div class="container">
		<h2>About Us</h2>
		<p>Track your workouts with Gympal with ease - whether you're a beginniner or an experienced athlete, Gympal is designed to help you achieve your fitness goals. </p>
		<p>Our team consists of experienced fitness professionals who are passionate about helping people lead healthier and more active lives. We believe that fitness should be accessible to everyone, and our platform is designed to make it easy for anyone to get started and stay motivated.</p>
		<p>If you have any questions or feedback, please don't hesitate to contact us. We are always looking for ways to improve our platform and make it even more useful for our users.</p>
	</div>

    <div class="founders_container">
        <!-- Cofounder #1 -->
    <h2 style="text-align:center">Our Team</h2>
    <div class="row">
        <div class="column">
            <div class="card">
                <img src="images/nick.jpg" alt="Nick" style="width:100%; border-radius:10px" height="400px">
                <div class="container">
                    <h2>Nicholas Chen</h2>
                    <p class="title">Co-founder</p>
                    <p>Bossman</p>
                    <p>nicholas.chen632138@tufts.edu</p>
                    <p><button onclick="sendNickEmail()" class="button">Contact</button></p>
                </div>
            </div>
        </div>

        <!-- Cofounder #2 -->
        <div class="column">
            <div class="card">
                <img src="images/jake.png" alt="Jake" style="width:100%; border-radius:10px" height="400px">
                <div class="container">
                    <h2>Jake Freedman</h2>
                    <p class="title">Co-founder</p>
                    <p>Chaddius Maximus</p>
                    <p>jacobfreedman@tufts.edu</p>
                    <p><button onclick="sendJakeEmail()" class="button">Contact</button></p>
                </div>
            </div>
        </div>

        <!-- Cofounder #3 -->
        <div class="column">
            <div class="card">
                <img src="images/rodrigo.png" alt="Rodrigo" style="width:100%; border-radius:10px" height="400px">
                <div class="container">
                    <h2>Rodrigo Campos</h2>
                    <p class="title">Co-founder</p>
                    <p>Mr. Steal Your Girl</p>
                    <p>rodrigo.campos@tufts.edu</p>
                    <p><button onclick="sendRodrigoEmail()" class="button">Contact</button></p>
                </div>
            </div>
        </div>

        <!-- Cofounder #4 -->
        <div class="column">
            <div class="card">
                <img src="images/adam.png" alt="Adam" style="width:100%; border-radius:10px" height="400px">
                <div class="container">
                    <h2>Adam Weiss</h2>
                    <p class="title">Co-founder</p>
                    <p>A avid hiker</p>
                    <p>Adam.Weiss@tufts.edu</p>
                    <p><button onclick="sendAdamEmail()" class="button">Contact</button></p>
                </div>
            </div>
        </div>
    </div>
    </div>

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
