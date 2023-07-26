<?php include 'header.php'; ?>
<style>
  <?php include 'CSS/table.css'; ?>
</style>
<head>
  <meta charset="UTF-8">
  <title>Added Agenda</title>
</head>
  <?php
    include "includes/connect.inc.php";
    // error_reporting(0);
    if(strcmp($_SESSION['privilege'], "admin") !== 0) {
        // User is not an admin
        header("Location: index.php");
        exit();
    }
    echo'
    <main>
      <table class="styled-table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Submited by</th>
            <th>Action</th>
          </tr>
        </thead>';
    $sql = "SELECT * FROM `meeting` WHERE flag=0";
    $res=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row3=mysqli_fetch_array($res);


    $sql1 = "SELECT * FROM `agenda` WHERE meeting_id=".$row3['id'];
    $result=mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    while($row=mysqli_fetch_array($result)){
      echo'
        <tbody>
          <tr>
            <td>'.$row['title'].'</td>
            <td>'.$row['category'].'</td>
            <td>'.$row['submitted'].'</td>
            <td><a href="delete.php?name='.$row['doc'].'&id='.$row['id'].'"> Delete</a>';
            
            echo'
          </tr>
        </tbody>';
    }?>
  </table>
</main>
<?php include 'footer.php'; ?>