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
  } else if (strpos($url, "status=unique") !== false) {
    echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
            Duplicate Email
          </div>';
  } else if (strpos($url, "status=success") !== false) {
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
  <title>Add Member</title>
</head>
<main>
  <h3>Add Senate Members</h3>
  <form action="includes/addmembers.inc.php" method="POST" enctype="multipart/form-data">
    <div>
      <label for="name" class="large-label">Name</label>
      <input id="name" name="name" type="text" placeholder="Name" required>
    </div>
    <div>
      <label for="email" class="large-label">Email</label>
      <input id="email" name="email" type="email" placeholder="Email" required>
    </div>
    <div>
      <label for="designation" class="large-label">Designation</label>
      <input id="designation" name="designation" type="text" placeholder="Designation in senate" required>
    </div>
    <div>
      <label for="post" class="large-label">Post</label>
      <input id="post" name="post" type="text" placeholder="Role" required>
    </div>
    <div>
      <button type="submit" name="submit">Submit</button>
      <button type="reset" name="reset">Reset</button>
    </div>
  </form>
</main>
<?php include 'footer.php'; ?>