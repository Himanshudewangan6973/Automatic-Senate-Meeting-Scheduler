<?php
include_once "includes/connect.inc.php";
if(strcmp($_SESSION['privilege'], "admin") !== 0) {
    // User is not an member
    header("Location: index.php");
    exit();
}
require_once('vendor/autoload.php');
use Ilovepdf\Ilovepdf;

$ilovepdf = new Ilovepdf('project_public_c869758462e4059d1d89a72e6f331215_mxm-u2363e66c0bc282e81f8d9609ad6c0cbe','secret_key_5ec8d64f18e14ef5dbc4312b53df725f_pWRkZ4ea265d7e90c42a1725f77fe4cf1cb11');
// Create a new task
$myTaskMerge = $ilovepdf->newTask('merge');
$sql='SELECT * FROM `meeting` WHERE flag=0';
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);

$sql1='SELECT * FROM `agenda` WHERE meeting_id='.$row['id'];
$res1=mysqli_query($conn,$sql1);
$c=1;
$file=$myTaskMerge->addFile('agenda/'.$row['id'].'front.pdf');
while($row1=mysqli_fetch_array($res1)){
// Add files to task for upload
$file = $myTaskMerge->addFile('agenda/'.$row1['doc'].'');
$c++;
}
// Execute the task
$myTaskMerge->execute();

$myTaskMerge->download('merged/');
rename('merged/merged.pdf','merged/'.$row['id'].'merged.pdf');


$sql2="UPDATE `meeting` SET agenda=1 WHERE id=".$row['id'];
mysqli_query($conn,$sql2);

header("Location: adminpage.php");
    exit();
?>