<!DOCTYPE html>
<html>
<?php
    include_once "includes/connect.inc.php";
    if(strcmp($_SESSION['privilege'], "member") !== 0) {
        // User is not an member
        header("Location: index.php");
        exit();
    }

    $sql='SELECT * FROM `meeting` WHERE flag=0';
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    

    $sql1='SELECT * FROM `invite` WHERE meeting_id='.$row['id'].' AND member_id='.$_SESSION['id'];
    // var_dump($sql1);
    $res1=mysqli_query($conn,$sql1);

    // include 'header.php';
    $css = file_get_contents('CSS/adminpage.css');
    echo'
        <style>';
    echo $css;
    echo'
        </style>
        <head>
        <meta charset="UTF-8">
        <title>Memberpage</title>
        </head>';
    echo'
        <body>
            <div class="container" style="margin-top:50px;">
                <div class="intro">
                    <h1>Welcome</h1><hr><br>';
                if($row1=mysqli_fetch_array($res1)){
                    echo' 
                    <h3>Next Senate meeting is on '.$row['date'].' at '.$row['time'].'</h3><br>
                </div><hr>';
                if($row['agenda']==1){
                    echo'
                <div class="about-grid">
                    <div class="i-am">
                        <a href="download.php?path=merged/'.$row['id'].'merged.pdf">Download agenda</a>
                    </div>
                </div>';
                }
                if($row1['status']==0){
                    echo'
                <div class="i-like">
                    <h4>Mark Your Attendance</h4>
                    <div style="display:flex; justify-content:center;"> 
                        <ul><a class="nav-link" href="includes/attend.inc.php?val=1&id='.$row1['id'].'">Attend</a></ul>
                        <ul><a href="includes/attend.inc.php?val=0&id='.$row1['id'].'">Cannot Attend</a></ul>
                    </div>
                </div>'; 
                }
                }
                    echo'
                    <div>
                        <a class="nav-link" href="includes/logout.inc.php">Logout</a>
                    </div>
                </div>
            </div>
        </body>';
?>
</html>