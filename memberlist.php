<?php include 'header.php'; ?>
<style>
  <?php include 'CSS/table.css'; ?>
</style>
<head>
  <meta charset="UTF-8">
  <title>Member Details</title>
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
    <main>
      <table class="styled-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Designation</th>
            <th>Role</th>
            <th>Password</th>
            <th>Action</th>
          </tr>
        </thead>';

    $sql = "SELECT * FROM `meeting` WHERE flag=0";
    $res=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row3=mysqli_fetch_array($res);


    $sql1 = "SELECT * FROM `members`";
    $result=mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    
    while($row=mysqli_fetch_array($result)){
      echo'
        <tbody>
          <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['designation'].'</td>
            <td>'.$row['post'].'</td>
            <td>'.$row['password'].'</td>
            <td><a href="removemember.php?id='.$row['id'].'"> Remove</a>/<a href="updatemember.php?id='.$row['id'].'"> Update</a>/
            ';
            if(mysqli_num_rows($res)>0){
            $sql2="SELECT * FROM invite WHERE `meeting_id`=".$row3['id']." AND `member_id`=".$row['id'];
            // var_dump($sql2);
            $res2=mysqli_query($conn, $sql2);
            if(mysqli_num_rows($res2)>0){
              echo'
                </h5>Invite Sent</h5></td>';
            }
            else{
              echo'
                <a href="includes/invite.inc.php?email='.$row['email'].'&id='.$row['id'].'">  Send Invite</a></td>';
            }
          }
            echo'
          </tr>
        </tbody>';
    }?>
  </table>
</main>
<?php include 'footer.php'; ?>