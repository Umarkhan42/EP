
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" /> 
    <link rel="stylesheet" href="./index.css" />
    <!-- <link rel="stylesheet" href="./db.php"/> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;800&display=swap" />
  </head>
  <body>    
    <div class="section">
      <header class="nav-bar">
        <img
          class="fdm-logo-black-1-icon"
          loading="lazy"
          alt=""
          src="./assets/fdmlogoblack-1@2x.png"
        />
        <div class="content-frame">
          <div class="home">Home</div>
          <div class="about">About</div>
        </div>
      </header>
      <div class="container2">
        <div class="bring-people-together">
          <div class="summary">
            <p class="bring">Bringing</p>
            <p class="people">‎ people</p>
            <p class="and"> ‎ and</p> <br>
            <p class="tech">technology</p>
            <p class="together">‎ together</p>
            <p class="global">Global leader in IT services, training, and workforce solutions.</p>
          </div>
          

          <div class="form">
            <p class="already-empl">Already an employee? Sign in</p>
            <form action="login.php" method="post">
              <label for="username-email"></label>
              <input type="text" id="username-email" name="username-email" placeholder="username or email" required>
              <label for="password"></label>
              <input type="password" id="password" name="password" placeholder="password"  required>
              <input type="submit" value="Sign in">
            </form>
          </div>

        </div>
        <div class="ipad-image">
          <img class="image-1" src="./assets/image-1@2x.png" alt="">
        </div>
      </div>

      <div class="container3">

        <img src="./assets/image-4@2x.png" alt="">
        <img src="./assets/image-3@2x.png" alt="">
      </div>
    </div>
  </body>
</html>

<!-- 
// define variables for database connection
$username = "root";
$server_name = "localhost";
$password = "";
$db_name = "ecs417";

// create a new database connection
$connection = mysqli_connect($server_name, $username, $password, $db_name);

// check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // get the email and password from the form
  $form_email = mysqli_real_escape_string($connection, $_POST["email"]);
  $form_password = mysqli_real_escape_string($connection, $_POST["password"]);

  // prepare the query using placeholders
  $query = "SELECT * FROM users WHERE email = '$form_email' AND password = '$form_password'";
  $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result) > 0) {
    session_start(); // start the session
    $_SESSION['email'] = $form_email;
    header("Location: success.php"); // redirect to addpost.html if the email and password combination is correct
  } 
  else {
    $error_msg = "Invalid email or password.";
    header("Location: index.php?error=$error_msg"); // redirect to login page with error message
    exit();
  }
}
?> -->