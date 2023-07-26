<?php include 'header.php'; ?>
<?php
  session_start();
  
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
?>

<style>
  <?php include 'CSS/form.css'; ?>
</style>
<head>
  <meta charset="UTF-8">
  <title>Minutes</title>
</head>

<main>
  <h3>Upload Minutes for Past Meeting</h3>
  <form action="includes/minutes.inc.php" method="POST" enctype="multipart/form-data">
    <div>
      <label for="id" class="large-label">Meeting ID</label>
      <input name="id" type="number" placeholder="Meeting ID" required>
    </div>
    <div>
      <label for="doc" class="large-label">Minutes document(in pdf):</label>
      <input name="doc" type="file" accept="application/pdf" required>
    </div>
    <div>
      <button type="submit" name="submit">Submit</button>
      <button type="reset" name="reset">Reset</button>
    </div>
  </form>
</main>
<?php include 'footer.php'; ?>