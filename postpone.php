<?php include 'header.php'; ?>
<?php
  include_once "includes/connect.inc.php";
  if(strcmp($_SESSION['privilege'], "admin") !== 0) {
      // User is not an admin
      header("Location: index.php");
      exit();
  }
  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  if (strpos($url, "status=empty") !== false) {
    echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
            Please fill all fields
          </div>';
  }  else if (strpos($url, "status=success") !== false) {
    echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-success" role="alert">
            Success!!
          </div>';
  } 
  $css = file_get_contents('CSS/form.css');
  echo'
    <style>';  
  echo $css;
  echo'
    </style>
    <head>
      <meta charset="UTF-8">
      <title>Prepone/Postpone Meeting</title>
    </head>
    <main>';
  $sql="SELECT *  FROM `meeting` WHERE flag=0";
  $res=mysqli_query($conn,$sql);
  if(mysqli_num_rows($res)==0)
  {
    echo'<h3>No meeting exists</h3>';
  }
  else{
    echo'
        <h3>Prepone/Postpone Meeting</h3>
        <form action="includes/postpone.inc.php" method="POST" enctype="multipart/form-data">
          <div>
            <label for="date" class="large-label">Date</label>
            <input name="date" type="date" placeholder="Date" required>
          </div>
          <div>
            <label for="venue" class="large-label">Venue</label>
            <input name="venue" type="text" placeholder="Venue" required>
          </div>
          <div>
            <label for="time" class="large-label">Time</label>
            <input name="time" type="time" required>
          </div>
          <div>
            <button type="submit" name="submit">Submit</button>
            <button type="reset" name="reset">Reset</button>
          </div>
        </form>';
    }
    echo '</main>';
?>
<?php include 'footer.php'; ?>