<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Find Meal For Your Ingredients</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
  </head>

  <?php
  if($_POST)
  {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $feedback = $_POST["feedback"];

	$localhost = 'localhost';
   $user = 'root';
   $pass = '';
   $database = 'registration';

	// Database connection
	$conn = new mysqli($localhost, $user, $pass,$database);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, email, phone, feedback) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $phone, $feedback);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
  }
?>

  <body>
    <div class="container">
      
      <div class="meal-wrapper">
        <button type="button" class="btn btn-default" id="open">
          Register
        </button>
        <img src="/meal_search/GOODFOOD.png" alt="Logo" class="logo">
        
        <div class="meal-search">
          
          <h2 class="title">FOOD HUT</h2> 
          
          <blockquote>
            Find Meals For Your Ingredients      
          </blockquote>
          

          <div class="meal-search-box">
            <input
              type="text"
              class="search-control"
              placeholder="Enter an ingredient"
              id="search-input"
            />
            <button type="submit" class="search-btn btn" id="search-btn">
              <i class="fas fa-search"></i>
              
            </button>
          </div>
        </div>

        <div class="meal-result">
          <h2 class="title">Your Search Results:</h2>
          <div id="meal">
            <!-- meal item -->
          <!-- <div class = "meal-item">
            <div class = "meal-img">
              <img src = "food.jpg" alt = "food">
            </div>
            <div class = "meal-name">
              <h3>Potato Chips</h3>
              <a href = "#" class = "recipe-btn">Get Recipe</a>
            </div>
          </div> -->
          <!-- end of meal item -->
          </div>
        </div>

        <div class="meal-details">
          <!-- recipe close btn -->
          <button
            type="button"
            class="btn recipe-close-btn"
            id="recipe-close-btn"
          >
            <i class="fas fa-times"></i>
          </button>

          <!-- meal content -->
          <div class="meal-details-content">
            <h2 class="recipe-title">Meals Name Here</h2>
            <p class="recipe-category">Category Name</p>
            <div class="recipe-instruct">
              <h3>Instructions:</h3>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo
                blanditiis quis accusantium natus! Porro, reiciendis maiores
                molestiae distinctio veniam ratione ex provident ipsa, soluta
                suscipit quam eos velit autem iste!
              </p>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet
                aliquam voluptatibus ad obcaecati magnam, esse numquam nisi ut
                adipisci in?
              </p>
            </div>

            <div class="recipe-meal-img">
              <img src="food.jpg" alt="" />
              <!--<img src="food.jpg" alt="" /> -->
            </div>
            <div class="recipe-link">
              <a href="#" target="_blank">Watch Video</a>
            </div>
          </div>
        </div>
        
        <div class="model-container" id="model_container">

          <div class="model">
            <form action="index.php"  name="feed" method="POST" onsubmit="return validate()">

            <h1>Feedback Form</h1>

              <label for="name">Name :</label>
              <input type="text" id="name" name="name" required /><br />

              <label for="email">Email :</label>
              <input type="email" id="email" name="email" required /><br />

              <label for="phone">Phone Number :</label>
              <input type="tel" id="phone" name="phone" required /><br />

              <label for="feedback">Feedback :</label>
              <textarea
                id="feedback"
                name="feedback"
                rows="4"
                required></textarea><br /> 

              <input type="submit" value="Submit" />
              <input type="reset" ></input>
            </form>

            <button class="closeme" id="close">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
      </div>
      
    </div>

    <script src="script.js"></script>
    <script>
      function validate(){
        var name = document.feed.name.value;
        
        var email = document.feed.email.value;
        
        var mob = document.feed.phone.value;
        

        var letters = /^[a-zA-Z]+ [a-zA-Z]+$/;
        if(!name.match(letters))
        {
          alert("Enter first name correctly");
          return false;
        }
        else if(!mob.match("[0]{1}[0-9]{10}"))
        {
          alert("Enter Mobile number correctly");
          return false;
        }

        alert("Thanks for your Response");

      }
    </script>
    
  </body>
</html>
