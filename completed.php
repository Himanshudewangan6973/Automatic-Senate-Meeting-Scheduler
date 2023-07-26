<?php
    include_once "includes/connect.inc.php";
    if(strcmp($_SESSION['privilege'], "admin") !== 0) {
        // User is not an admin
        header("Location: index.php");
        exit();
    }
    $sql1 = "UPDATE `meeting` SET `flag`=1 WHERE flag=0";
    mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    header("Location: ./adminpage.php?status=success");
    exit();
?> 