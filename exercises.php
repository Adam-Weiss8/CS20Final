<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap"
          rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Exercises</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css" />

    <style>
	body {
    margin: 0;
    padding: 0;
    font-family: 'Rubik', sans-serif;
  }
      img {
        border-radius: 20px;
      }
      /* #wrapList {
        display: flex;
        align-items: center;
        justify-content: center;
      } */
      #exerciseList {
        display: flex;
        flex-wrap: wrap;
        text-align: center;
        align-items: center;
        justify-content: center;
      }

      .exerciseBox {
        width: 500px;
        height: 500px;
        background-color: rgb(27, 104, 135);
        margin-bottom: 20px;
        margin-right: 20px;
        border-radius: 30px;
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.4);
      }

      #listInfo {
        text-align: center;
      }

      .exerciseBox {
        color: white;
        padding-top: 50px;
      }

      .exerciseBox hr {
        margin-bottom: 20px;
      }

      .exerciseBox h2 {
        font-size: 24px;
        font-family: Mukta;
        font-weight: bold;
        padding-bottom: 10px;
      }

      #exerciseHeader {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
    }

    /* Style for the form */
    form {
      margin-bottom: 20px;
      text-align: center;
    }

    /* Style for the dropdowns */
    select {
      font-size: 16px;
      padding: 5px 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-right: 10px;
    }

    /* Style for the filter button */
    #filterButton {
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      text-align: center;
      cursor: pointer;
      margin-bottom: 20px;

    }

    /* Style for the list wrapper */
    #wrapList {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
    }

    /* Style for the exercise list */
    #exerciseList {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    /* Style for the list info */
    #listInfo {
      text-align: center;
    }

    #exerciseHeader {
      padding-top: 20px;
    }

    </style>
  </head>
  <body style="font-family: Rubik;">
    <!-- Header -->
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
        </script>


    <script>
      const options = {
        method: "GET",
        headers: {
          "X-RapidAPI-Key":
            "2e04ea1608msh0348d71d9daca74p1b4c8ajsn3ae99a91e4eb",
          "X-RapidAPI-Host": "exercisedb.p.rapidapi.com",
        },
      };

      var exerciseData;

      fetch("https://exercisedb.p.rapidapi.com/exercises", options)
        .then((response) => response.json())
        .then((response) => {
          exerciseData = response;

          //create list info text
          const listInfo = document.getElementById("listInfo");
          const range = document.createElement("div");
          let tempString = "0-9 of " + exerciseData.length;
          range.textContent = tempString;
          range.id = "range";
          listInfo.appendChild(range);

          //create an array of filtered exercises and only show 10 at a time
          const exerciseView = {
            divs: [],
            startIndex: 0,
            endIndex: 9,

            show: function () {
              var bigDiv = document.getElementById("exerciseList");
              bigDiv.innerHTML = "";

              for (i = this.startIndex; i <= this.endIndex; i++) {
                bigDiv.appendChild(this.divs[i]);
              }
            },

            clear: function () {
              this.divs.length = 0;
            },

            slideLeft: function () {
              if (this.startIndex >= 10) {
                this.startIndex -= 10;
                this.endIndex = this.startIndex + 9;
              } else if (this.startIndex == 0 || this.divs.length <= 10) {
              } else {
                this.endIndex = this.startIndex;
                this.startIndex = 0;
              }
              document.getElementById("range").textContent =
                this.startIndex +
                "-" +
                this.endIndex +
                " of " +
                this.divs.length;
              this.show();

              // Scroll to the top of the page
              window.scrollTo({
                top: 0,
                behavior: "smooth",
              });
            },

            slideRight: function () {
              if (this.endIndex <= this.divs.length - 11) {
                this.endIndex += 10;
                this.startIndex = this.endIndex - 9;
              } else if (
                this.endIndex == this.divs.length - 1 ||
                this.divs.length <= 10
              ) {
              } else {
                this.startIndex = this.endIndex;
                this.endIndex = this.divs.length - 1;
              }
              document.getElementById("range").textContent =
                this.startIndex +
                "-" +
                this.endIndex +
                " of " +
                this.divs.length;

              this.show();
              // Scroll to the top of the page
              window.scrollTo({
                top: 0,
                behavior: "smooth",
              });
            },
          };

          //create a filter button
          const filterButton = document.getElementById("filterButton");
          const button = document.createElement("button");
          button.textContent = "Filter";
          button.onclick = function () {
            filter(exerciseData, exerciseView);
          };
          filterButton.appendChild(button);

          //create list info buttons
          const leftButton = document.createElement("button");
          const rightButton = document.createElement("button");

          leftButton.onclick = function () {
            exerciseView.slideLeft();
          };
          leftButton.textContent = "<";

          rightButton.onclick = function () {
            exerciseView.slideRight();
          };
          rightButton.textContent = ">";

          listInfo.appendChild(leftButton);
          listInfo.appendChild(rightButton);

          //add all exercises to the view and show the first ten
          for (i = 0; i < exerciseData.length; i++) {
            exerciseView.divs.push(makeDiv(i, exerciseData));
          }
          exerciseView.show();

          //make an exercise div box from an index and the database of exercises
          function makeDiv(i, exerciseData) {
            const exerciseDiv = $("<div>");
            exerciseDiv.attr("id", exerciseData[i].name);
            exerciseDiv.attr("class", "exerciseBox");
            exerciseDiv.append("<h2>" + exerciseData[i].name + "</h2>");
            exerciseDiv.append("<hr style='border - color: white; '>");
            exerciseDiv.append(
              "<p><strong>Muscles:</strong> " + exerciseData[i].target + "</p>"
            );
            exerciseDiv.append(
              "<p><strong>Equipment:</strong> " + exerciseData[i].equipment + "</p>"
            );
            exerciseDiv.append(
              "<img src='" + exerciseData[i].gifUrl + "' width='300px'>"
            );
            return exerciseDiv[0];
          }

          //filter the exercises from the database and add the matches to the exercise view
          function filter(exerciseData, exerciseView) {
            exerciseView.clear();
            document.getElementById("exerciseList").innerHTML = "";
            var equipment = document.filterExercises.equipmentDropdown.value;
            var muscle = document.filterExercises.muscleDropdown.value;
            var matchEquip = equipment == "select one" ? false : true;
            var matchMuscle = muscle == "select one" ? false : true;

            for (var i = 0; i < exerciseData.length; i++) {
              var exerciseDiv = document.getElementById(exerciseData[i].name);
              if (matchEquip && matchMuscle) {
                if (
                  equipment == exerciseData[i].equipment &&
                  muscle == exerciseData[i].target
                ) {
                  exerciseView.divs.push(makeDiv(i, exerciseData));
                  console.log("hit");
                }
              } else if (matchEquip && !matchMuscle) {
                if (equipment == exerciseData[i].equipment) {
                  exerciseView.divs.push(makeDiv(i, exerciseData));
                  console.log("hit");
                }
              } else if (!matchEquip && matchMuscle) {
                if (muscle == exerciseData[i].target) {
                  exerciseView.divs.push(makeDiv(i, exerciseData));
                  console.log("hit");
                }
              } else {
                exerciseView.divs.push(makeDiv(i, exerciseData));
              }
            }
            exerciseView.startIndex = 0;
            exerciseView.endIndex =
              exerciseView.divs.length < 9 ? exerciseView.divs.length : 9;
            document.getElementById("range").textContent =
              exerciseView.startIndex +
              "-" +
              exerciseView.endIndex +
              " of " +
              exerciseView.divs.length;
            exerciseView.show();
          }
        })
        .catch((err) => console.error(err));
    </script>
  </body>

  <h1 id="exerciseHeader">Exercises</h1>
  <form name="filterExercises">
    Equipment:
    <select name="equipmentDropdown">
      <option value="select one">select one</option>
      <option value="assisted">Assisted</option>
      <option value="band">Band</option>
      <option value="barbell">Barbell</option>
      <option value="body weight">Body weight</option>
      <option value="bosu ball">Bosu ball</option>
      <option value="cable">Cable</option>
      <option value="dumbbell">Dumbbell</option>
      <option value="elliptical machine">Elliptical machine</option>
      <option value="ez barbell">EZ barbell</option>
      <option value="hammer">Hammer</option>
      <option value="kettlebell">Kettlebell</option>
      <option value="leverage machine">Leverage machine</option>
      <option value="medicine ball">Medicine ball</option>
      <option value="olympic barbell">Olympic barbell</option>
      <option value="resistance band">Resistance band</option>
      <option value="roller">Roller</option>
      <option value="rope">Rope</option>
      <option value="skierg machine">Skierg machine</option>
      <option value="sled machine">Sled machine</option>
      <option value="smith machine">Smith machine</option>
      <option value="stability ball">Stability ball</option>
      <option value="stationary bike">Stationary bike</option>
      <option value="stepmill machine">Stepmill machine</option>
      <option value="tire">Tire</option>
      <option value="trap bar">Trap bar</option>
      <option value="upper body ergometer">Upper body ergometer</option>
      <option value="weighted">Weighted</option>
      <option value="wheel roller">Wheel roller</option>
    </select>

    Muscle Group:
    <select name="muscleDropdown">
      <option value="select one">select one</option>
      <option value="abductors">Abductors</option>
      <option value="abs">Abs</option>
      <option value="adductors">Adductors</option>
      <option value="biceps">Biceps</option>
      <option value="calves">Calves</option>
      <option value="cardiovascular system">Cardiovascular system</option>
      <option value="delts">Delts</option>
      <option value="forearms">Forearms</option>
      <option value="glutes">Glutes</option>
      <option value="hamstrings">Hamstrings</option>
      <option value="lats">Lats</option>
      <option value="levator scapulae">Levator scapulae</option>
      <option value="pectorals">Pectorals</option>
      <option value="quads">Quads</option>
      <option value="serratus anterior">Serratus anterior</option>
      <option value="spine">Spine</option>
      <option value="traps">Traps</option>
      <option value="triceps">Triceps</option>
      <option value="upper back">Upper back</option>
    </select>
  </form>

  <div id="filterButton"></div>
  <div id="wrapList">
    <div id="exerciseList"></div>
  </div>

  <div id="listInfo"></div>


  <!-- Footer -->
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
</html>