<?php include 'header.php'; ?>
<?php
include "includes/connect.inc.php";
  if(strcmp($_SESSION['privilege'], "admin") !== 0) {
      // User is not an admin
      header("Location: index.php");
      exit();
  }
  $id=$_GET['id'];
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
    echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
            Success!!
          </div>';
  } 
  $sql1 = "SELECT * FROM `members` WHERE id=$id";
  $result=mysqli_query($conn, $sql1) or die(mysqli_error($conn));
  $row=mysqli_fetch_array($result);
?>
<head>
  <meta charset="UTF-8">
  <title>Update Member Details</title>
</head>
<style>
  <?php include 'CSS/form.css'; ?>
</style>

  <main>
      <h3>Update Senate Members</h3>
<?php
echo'
      <form action="includes/updatemembers.inc.php?'.$id.'" method="POST" enctype="multipart/form-data">
        <div>
          <label for="id" class="large-label">Student ID: '.$id.'</label>
          <input id="id" name="student_id" type="hidden" value="'.$id.'">
        </div><br>
        <div>
          <label for="name" class="large-label">Name</label>
          <input id="name" name="name" type="text" value="'.$row['name'].'" required>
        </div>
        <div>
          <label for="email" class="large-label">Email</label>
          <input id="email" name="email" type="email" value="'.$row['email'].'" required>
        </div>
        <div>
          <label for="designation" class="large-label">Designation</label>
          <input id="designation" name="designation" type="text" value="'.$row['designation'].'" required>
        </div>
        <div>
          <label for="post" class="large-label">Post</label>
          <input id="post" name="post" type="text" value="'.$row['post'].'" required>
        </div>
        
        <div>
          <button type="submit" name="submit">Submit</button>
        </div>
      </form>';
    ?>
  </main>
<?php include 'footer.php'; ?>