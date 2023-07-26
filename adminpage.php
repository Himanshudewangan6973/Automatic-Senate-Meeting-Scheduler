<!DOCTYPE html>
<html>
<?php
    include_once "includes/connect.inc.php";
    
    if(strcmp($_SESSION['privilege'], "admin") !== 0) {
        // User is not an member
        header("Location: index.php");
        exit();
    }
    include 'header.php';
    $css = file_get_contents('CSS/adminpage.css');
    echo'
        <style>';
    echo $css;
    echo'
        button {
        font: 1rem sans-serif;
        border-radius: 1.5rem;
        cursor: pointer;
        margin: 0rem 2px 0 2rem;
      }
        </style>
        <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        </head>';
    $sql='SELECT * FROM `meeting` WHERE flag=0';
    $res=mysqli_query($conn,$sql);
    

    if($row=mysqli_fetch_array($res)){
        $today=strtotime(date("Y-m-d"));
        $date=strtotime($row['date']);
        $diff=$date-$today;


        $sql1='SELECT count(*) FROM `invite` WHERE meeting_id='.$row['id'];
        $res1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($res1);


    $sql2='SELECT count(*) FROM `invite` WHERE status=1 And meeting_id='.$row['id'];
    $res2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($res2);
    // var_dump($row1);
  
    echo'
        <body>
            <div class="container">
                <div class="intro">
                    <h1>Automated Senate Meeting Scheduler</h1><hr><br>
                    <h3>Next Senate meeting is on '.$row['date'].' at '.$row['time'].'</h3>
                    <h3>Number of days left '.ceil($diff/86400).'</h3>
                    <p class="quote">{{ For next Senate Meeting }}</p>
                </div><hr/>

                <div class="about-grid">
                    <div class="i-am">
                        <h4>#Members invited :</h4>
                        <ul class="about-list">
                            <li>'.$row1[0].'</li>
                        </ul>
                    </div>
                    <div class="i-like">
                        <h4>#Members accepted invite :</h4>
                        <ul class="about-list">
                            <li>'.$row2[0].'</li>
                        </ul>
                    </div>
                </div>
                <div style="display:flex; justify-content:center;">
                    <button><a class="nav-link" href="acceptedlist.php">Attendance List</a></button>
                    <button><a class="nav-link" href="agendalist.php">Check Agenda</a></button>
                    <button><a class="nav-link" href="generatefront.php">  Merge Agendas and publish</a></button>
                    <button><a class="nav-link" href="completed.php">  Meeting Completed</a></button>
                </div>';
    } else {
        echo'
        <body>
        <div class="container">
            <div class="intro">
                <h1>Automated Senate Meeting Scheduler</h1><hr><br>
                 </div><hr/>

                </div>';
    }
    echo'
            </div>
        </body>';
    // }
?>
<?php include 'footer.php'; ?>
</html>