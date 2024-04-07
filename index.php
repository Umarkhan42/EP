
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="cssFolder/global.css">
    <link rel="stylesheet" type="text/css" href="cssFolder/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;800&display=swap" />
  </head>
  <body>    
    <div class="section">
      <header class="nav-bar">
        <img
          class="fdm-logo-black-1-icon"
          loading="lazy"
          alt=""
          src="./public/fdmlogonew.svg"
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
              <div class="g-recaptcha" data-sitekey="6Lc91JspAAAAAM_yfyvKId6xYvZKKBIRsN8bbHqS"></div>
              <input type="submit" value="Sign in">
            </form>
          </div>

        </div>
        <div class="ipad-image">
          <img class="image-1" src="./assets/image-1@2xgreen.png" alt="">
        </div>
      </div>

      <div class="container3">

        <img src="./assets/image-4@2xgreen.png" alt="">
        <img src="./assets/image-3@2xgreen.png" alt="">
      </div>
    </div>
  </body>
</html>