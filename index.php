<style>
<?php include 'CSS/login.css'; ?>
</style>

<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>

<header>
  <h2><a href="checkminutes.php">See minutes</a><h2>
</header>
  
<?php
  if (isset($_SESSION['u_id'])) {
    header("Location: index.php");
  } else {
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if (strpos($url, "login=error") !== false) {
      echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
              Invalid Email / Password
            </div>';
    } elseif (strpos($url, "login=empty") !== false) {
      echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
              Fill out all the fields!
            </div>';
    } elseif (strpos($url, "login=blocked") !== false) {
      echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
              User Blocked, Please Pay the fee to continue
            </div>';
    }

    echo 
    '<div class="container" id="container">
      <div class="form-container sign-in-container">
        <form action="includes/login.inc.php" method="POST">
          <p><h1>Sign in</h1></p>
          <div>
            <label for="email" class="large-label" >Email</label>
            <input id="email" name="email" type="email" placeholder="name@nic.ac.in" required>
          </div>  
          <div>
            <label for="password" class="large-label" >Password</label>
            <input id="password" name="pass" type="password" placeholder="Password" required>
          </div>
          <button type="submit" name="submit">Login</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-right">
            <h1>Automated Senate Meeting Scheduler!</h1>
            <p>Enter your personal details and start journey with us</p>
          </div>
        </div>
      </div>
    </div>'; 
  }
?>
<?php include 'footer.php'; ?>