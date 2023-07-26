<?php include 'header.php'; ?>
<style>
  <?php include 'CSS/table.css'; ?>
</style>
<head>
  <meta charset="UTF-8">
  <title>Meetings Detail</title>
</head>
  <?php
    include "includes/connect.inc.php";
    error_reporting(0);
    if(strcmp($_SESSION['privilege'], "admin") !== 0) {
        // User is not an admin
        header("Location: index.php");
        exit();
    }
    echo'
    <main class="container">
      <table class="styled-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Venue</th>
            <th>Date</th>
            <th>Time</th>
            <th>Agenda</th>
            <th>Minutes</th>
            </tr>
        </thead>';

    $sql1= "SELECT * FROM `agenda`";
    $result=mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    $res1=mysqli_fetch_array($result);
    
    $sql = "SELECT * FROM `meeting`";
    $res=mysqli_query($conn, $sql) or die(mysqli_error($conn));

    while($row=mysqli_fetch_array($res)){
      echo'
        <tbody>
          <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['venue'].'</td>
            <td>'.$row['date'].'</td>
            <td>'.$row['time'].'</td>
            <td>';
            $sql2="SELECT * FROM agenda WHERE `meeting_id`=".$row['id'];
            $res2=mysqli_query($conn, $sql2);
            if(mysqli_num_rows($res2)>0){
              echo'<a href="showagenda.php?id='.$row['id'].'">Agenda</a>';
            } else {
              echo'No Agenda';
            }
            echo'
            </td>
            <td>'.$row['minutes'].'</td>
            </tr>
        </tbody>';
    }?>
  </table>
</main>
<?php include 'footer.php'; ?>