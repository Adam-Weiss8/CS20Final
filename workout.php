<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Workout Planner</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Mukta&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap"
      rel="stylesheet"
    />

    <style>
      body {
        font-family: 'Rubik', sans-serif;
      }

      .container {
        max-width: 45%;
        margin: 0 auto;
        padding: 20px;
      }
      h1 {
        text-align: center;
        padding: 20px;
      }
      form {
        margin-top: 20px;
      }
      label {
        display: block;
        margin-bottom: 10px;
      }
      input[type="text"],
      input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
      }
      textarea {
        width: 100%;
        height: 100px;
        padding: 10px;
        margin-bottom: 10px;
      }
      button[type="submit"] {
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
        font-size: 16px;
      }

      button[type="submit"]:hover {
        background-color: #0056b3;
      }

      hr {
        width: 50%;
        margin: 0 auto;
      }

      #workoutList {
        margin: 0 auto;
        /* max-width: 45%; */
        text-align: center;
      }

      #formdata label,
      #formdata input {
        /* display: block; */
        margin-bottom: 15px; /* Add desired amount of whitespace here */
      }

      hr {
        border: none; /* Remove default border */
        height: 4px; /* Set height of the line */
        background-color: #000; /* Set background color of the line */
        margin-top: 20px; /* Add margin at the top of the line */
        margin-bottom: 20px; /* Add margin at the bottom of the line */
      }
    </style>
  </head>
  <body>
    <nav>
      <div class="logo">
        <h2>
          <a
            href="index.php"
            style="
              text-decoration: none;
              color: rgb(255, 254, 254);
              font-size: 35px;
            "
          >
            GymPal</a
          >
        </h2>
      </div>

      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about_us.php">About</a></li>
        <li><a href="exercises.php">Workouts </a></li>
        <li><a href="workout.php">Create</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php
        if (isset($_SESSION["user_id"])) {
            echo '<li><a href="profile_page.php">Profile</a></li>';
            echo '<script>console.log("USER ID")</script>';
            echo '<script>console.log('.$_SESSION["user_id"] . ')</script>';
        } else {
            echo '<li><a href="login.php">Login</a></li>';
        }

        if ($_SESSION["user_id"] == 0) {
          header("Location: login.php");
        }
      ?>
      </ul>
      <div class="menu-bars">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
      </div>
    </nav>
    <br />
    <h1>Workout Planner</h1>

    <div class="metadata" style="text-align: center">
      <form
        name="formdata"
        id="formdata"
        style="width: 30%; margin: 0 auto"
        method="post"
        action="processWorkout.php"
      >
        <label for="workoutName">Workout Name:</label>
        <input type="text" name="workoutName" style="width: 100%" required />
        <label for="date">Workout date:</label>
        <input type="date" name="date" required />
      </form>
    </div>

    <hr />

    <div class="container">
      <div class="workoutLogger">
        <form id="workoutForm">
          <label for="exerciseName">Exercise Name</label>
          <input type="text" id="exerciseName" required />
          <label for="sets">Sets</label>
          <input type="number" id="sets" required />
          <label for="reps">Reps</label>
          <input type="number" id="reps" required />
          <label for="weight">Weight</label>
          <input type="text" id="weight" required />
          <label for="notes">Notes</label>
          <textarea id="notes"></textarea>
          <button type="submit">Add Exercise</button>
        </form>
      </div>
    </div>

    <hr />

    <h1>Workout Details</h1>

    <div id="workoutList"></div>

    <script>
      var count = 0;
      let exerciseItem; // Declare exerciseItem outside of the event listener function
      document
        .getElementById("workoutForm")
        .addEventListener("submit", function (event) {
          event.preventDefault();

          // Get form inputs
          const exerciseName = document.getElementById("exerciseName").value;
          const sets = document.getElementById("sets").value;
          const reps = document.getElementById("reps").value;
          const weight = document.getElementById("weight").value;
          const notes = document.getElementById("notes").value;

          // Create exercise object
          const exercise = {
            exerciseName: exerciseName,
            sets: sets,
            reps: reps,
            weight: weight,
            notes: notes,
          };

          // Add exercise to the workout list
          const workoutList = document.getElementById("workoutList");
          const form = document.getElementById("formdata");
          exerciseItem = document.createElement("div");
          exerciseItem.innerHTML = `
                <h3 class='exerciseName'>${exercise.exerciseName}</h3>
                <p class='sets'>Sets: ${exercise.sets}</p>
                <p class='reps'>Reps: ${exercise.reps}</p>
                <p class='weight'>Weight: ${exercise.weight}</p>
                <p>Notes: ${exercise.notes}</p>
                <button class="editBtn">Edit</button>
            `;
          workoutList.appendChild(exerciseItem);
          // console.log("added text");

          nameInput = document.createElement("input");
          nameInput.type = "hidden";
          nameInput.name = "exerciseName" + count;
          nameInput.value = exercise.exerciseName;
          form.appendChild(nameInput);

          setsInput = document.createElement("input");
          setsInput.type = "hidden";
          setsInput.name = "sets" + count;
          setsInput.value = exercise.sets;
          form.appendChild(setsInput);

          repsInput = document.createElement("input");
          repsInput.type = "hidden";
          repsInput.name = "reps" + count;
          repsInput.value = exercise.reps;
          form.appendChild(repsInput);

          weightInput = document.createElement("input");
          weightInput.type = "hidden";
          weightInput.name = "weight" + count;
          weightInput.value = exercise.weight;
          form.appendChild(weightInput);

          // console.log("added to form");

          // Reset form inputs
          document.getElementById("exerciseName").value = "";
          document.getElementById("sets").value = "";
          document.getElementById("reps").value = "";
          document.getElementById("weight").value = "";
          document.getElementById("notes").value = "";
          // console.log("cleared form");
          count++;
        });

      // Add event listener to "Edit" button
      document.addEventListener("click", function (event) {
        if (event.target.classList.contains("editBtn")) {
          // Get the values from the exercise item
          const exerciseName = exerciseItem.querySelector("h3").textContent;
          const sets = exerciseItem
            .querySelector("p:nth-child(2)")
            .textContent.replace("Sets: ", "");
          const reps = exerciseItem
            .querySelector("p:nth-child(3)")
            .textContent.replace("Reps: ", "");
          const weight = exerciseItem
            .querySelector("p:nth-child(4)")
            .textContent.replace("Weight: ", "");
          const notes = exerciseItem
            .querySelector("p:nth-child(5)")
            .textContent.replace("Notes: ", "");

          // Set the values in the form for editing
          document.getElementById("exerciseName").value = exerciseName;
          document.getElementById("sets").value = sets;
          document.getElementById("reps").value = reps;
          document.getElementById("weight").value = weight;
          document.getElementById("notes").value = notes;

          // Remove the exercise item from the workout list
          exerciseItem.parentNode.removeChild(exerciseItem);
        }
      });
    </script>

    <div style="text-align: center; padding-bottom: 15px">
      <button onclick="submitWorkout()">Submit Workout</button>
    </div>

    <script>
      function submitWorkout() {
        const finalForm = document.formdata;
        //get all the values
        const names = document.getElementsByClassName("exerciseName");
        const sets = document.getElementsByClassName("sets");
        const reps = document.getElementsByClassName("reps");
        const weight = document.getElementsByClassName("weight");

        //get how many exercises
        const numExercises = names.length;
        if (numExercises == 0) {
          alert("Please add at least one exercise");
          return;
        }

        if (finalForm.workoutName.value == "") {
          alert("Please enter the workout name");
          return;
        }
        //handle date
        const inputDate = finalForm.date;
        const dateValue = inputDate.value;
        if (dateValue == "") {
          alert("Please enter the the workout date");
          return;
        } else {
          const date = new Date(dateValue);
          const year = date.getFullYear();
          const month = date.getMonth() + 1;
          const day = date.getDate() + 1;
          var dateString = month + "/" + day + "/" + year;
          const datefield = document.createElement("input");
          datefield.type = "hidden";
          datefield.name = "date";
          datefield.value = dateString;
          finalForm.appendChild(datefield);
        }

        const numExercisesInput = document.createElement("input");
        numExercisesInput.type = "hidden";
        numExercisesInput.name = "numExercises";
        numExercisesInput.value = numExercises;
        finalForm.appendChild(numExercisesInput);

        finalForm.submit();
      }
    </script>

    <footer>
      <div class="footer-wrapper">
        <div class="footer-col">
          <h3>GymPal</h3>
          <ul>
            <li><a href="about_us.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="exercises.php">Workouts</a></li>
            <li>
              <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Blog</a>
            </li>
          </ul>
        </div>
        <div class="footer-col-2">
          <h3>Connect with us</h3>
          <ul>
            <li>
              <a
                href="https://www.facebook.com/"
                class="facebook"
                target="_blank"
              ></a>
            </li>
            <li>
              <a
                href="https://twitter.com/"
                class="twitter"
                target="_blank"
              ></a>
            </li>
            <li>
              <a
                href="https://www.instagram.com/?hl=en"
                class="instagram"
                target="_blank"
              ></a>
            </li>
            <li>
              <a
                href="https://www.linkedin.com/"
                class="linkedin"
                target="_blank"
              ></a>
            </li>
          </ul>
        </div>
      </div>
    </footer>

    <script>
      const menuToggle = document.querySelector(".menu-bars");
      const nav = document.querySelector("nav ul");

      menuToggle.addEventListener("click", () => {
        nav.classList.toggle("slide");
      });
    </script>
  </body>
</html>
