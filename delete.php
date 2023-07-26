<?php
include "includes/connect.inc.php";
if(strcmp($_SESSION['privilege'], "admin") !== 0) {
    // User is not an admin
    header("Location: index.php");
    exit();
}
$id=$_GET['id'];
$doc=$_GET['name'];
unlink('agenda/'.$doc);
$sql1 = "DELETE FROM `agenda` WHERE id=$id";
  $result=mysqli_query($conn, $sql1) or die(mysqli_error($conn));
  header("Location: agendalist.php");
                    exit();
?>