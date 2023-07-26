<?php
include "includes/connect.inc.php";
if(strcmp($_SESSION['privilege'], "admin") !== 0) {
    // User is not an admin
    header("Location: index.php");
    exit();
}
$id=$_GET['id'];
$sql1 = "DELETE FROM `members` WHERE id=$id";
  $result=mysqli_query($conn, $sql1) or die(mysqli_error($conn));
  header("Location: memberlist.php");
                    exit();
?>