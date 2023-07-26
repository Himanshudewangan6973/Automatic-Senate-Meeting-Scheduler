<?php include 'header.php'; 
include_once "includes/connect.inc.php";
?>
<?php
  // session_start();

  if(isset($_SESSION['privilege'])) {
    if(strcmp($_SESSION['privilege'], "admin") !== 0) {
        // User is not an admin
        header("Location: index.php");
        exit();
    }
  } else {
    //User is not signed in
    header("Location: index.php");
    exit();
  }
  $sql = "SELECT * FROM `meeting` WHERE flag=0";
  $res=mysqli_query($conn, $sql) or die(mysqli_error($conn));
  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  if (strpos($url, "status=imageupload") !== false) {
    echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
            PDF upload issues
          </div>';
  }  else if (strpos($url, "status=success") !== false) {
    echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-success" role="alert">
            Success!!
          </div>';
  } 
  else if (strpos($url, "status=meeting_error") !== false) {
    echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
            2 senate meetings conducted
          </div>';
  } 
  else if (strpos($url, "status=image_banner") !== false) {
    echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
            PDF upload issues
          </div>';
  }
?>
<style>
  <?php include 'CSS/form.css'; ?>
</style>
<head>
  <meta charset="UTF-8">
  <title>Upload Agenda</title>
</head>
<main>
<?php
  if(mysqli_num_rows($res)>0){
    echo'
  <h3>Add Agenda for meeting</h3>
  <form action="includes/agenda.inc.php" method="POST" enctype="multipart/form-data">
    <div>
      <label for="title" class="large-label">Agenda Title</label>
      <input name="title" type="text" placeholder="Agenda Title" required>
    </div>
    <div>
      <label for="category" class="large-label">Category</label>
      <input name="category" type="text" placeholder="Category" required>
    </div>
    <div>
      <label for="desc" class="large-label">Short Description</label>
      <input name="desc" type="text" placeholder="Short Description" required>
    </div> 
    <div>
      <label for="sub" class="large-label">Submitted by</label>
      <input name="sub" type="text" placeholder="Submitted by" required>
    </div>
    
    <div>
      <label for="doc" class="large-label">Supporting document(in pdf):</label>
      <input name="doc" type="file" accept="application/pdf" required>
    </div>
    <div>
      <button type="submit" name="submit">Submit</button>
      <button type="reset" name="reset">Reset</button>
    </div>
  </form>
</main>';
}
else{
  echo'
  <h3>Schedule a meeting</h3>
  
</main>';
}
 include 'footer.php'; ?>