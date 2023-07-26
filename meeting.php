<?php include 'header.php'; 
include_once "includes/connect.inc.php";
?>
<?php
  // session_start(); 
  if(strcmp($_SESSION['privilege'], "admin") !== 0) {
      // User is not an admin
      header("Location: index.php");
      exit();
  }
  $sql = "SELECT * FROM `meeting` WHERE flag=0";
    $res=mysqli_query($conn, $sql) or die(mysqli_error($conn));
  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  if (strpos($url, "status=empty") !== false) {
    echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
            Please fill all fields
          </div>';
  }  else if (strpos($url, "status=success") !== false) {
    echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
            Success!!
          </div>';
  }
  else if (strpos($url, "status=exists") !== false) {
    echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
            Upcoming Meeting already exists
          </div>';
  } 
?>
<style>
  <?php include 'CSS/form.css'; ?>
</style>
<head>
  <meta charset="UTF-8">
  <title>Schedule Meeting</title>
</head>
<main>
  <?php
  if(mysqli_num_rows($res)==0){
    echo'
    <h3>Schedule Meeting</h3>
    <form action="includes/addmeeting.inc.php" method="POST" enctype="multipart/form-data">
      <div>
        <label for="id" class="large-label">Meeting ID</label>
        <input name="id" type="number" placeholder="Meeting ID" required>
      </div>
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
    </form>
  </div>
</main>';
  }
  else{
    echo'
    <h3>Meeting Already Exists</h3>
    
</main>';
  }

 include 'footer.php'; ?>