<?php
  include "includes/connect.inc.php";
  if(strcmp($_SESSION['privilege'], "admin") !== 0) {
      // User is not an admin
      header("Location: index.php");
      exit();
  }
  echo'<table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Designation</th>
        <th>Role</th>
        <th>Send Mail?</th>
      </tr>
    </thead>';
  $sql1 = "SELECT * FROM `members`";
  $result=mysqli_query($conn, $sql1) or die(mysqli_error($conn));
  while($row=mysqli_fetch_array($result)){
    echo'
      <tbody>
        <tr>
          <td>'.$row['name'].'</td>
          <td>'.$row['email'].'</td>
          <td>'.$row['designation'].'</td>
          <td>'.$row['post'].'</td>
          <td><a href="mail.php?id='.$row['id'].'"> Mail</a></td>
        </tr>
      </tbody>';
  }
?>
</table>
