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
  $sql1 = "SELECT * FROM `agenda` WHERE meeting_id=$id";
  $result=mysqli_query($conn, $sql1) or die(mysqli_error($conn));
?>

<style>
  <?php include 'CSS/table.css'; ?>
</style>
<head>
  <meta charset="UTF-8">
  <title>Agenda Details</title>
</head>

<main class="container">
    <div><a href="meetingslist.php">Back to Meeting List</a></div>
    <div><h3>Agenda Details -> Meeting ID: <?php echo $id; ?></h3></div>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Agenda Title</th>
                <th>Category</th>
                <th>Short Description</th>
                <th>Submitted By</th>
                <th>Supporting Document(PDF)</th>
            </tr>
        </thead>
    <?php
    while($row=mysqli_fetch_array($result)){
        echo'
            <tbody>
            <tr>
                <td>'.$row['title'].'</td>
                <td>'.$row['category'].'</td>
                <td>'.$row['des'].'</td>
                <td>'.$row['submitted'].'</td>
                <td><a href="download.php?path=agenda/'.$row['doc'].'"</a>Download PDF</td>
            </tr>
        </tbody>';
    }
    ?>
</main>
<?php include 'footer.php'; ?>