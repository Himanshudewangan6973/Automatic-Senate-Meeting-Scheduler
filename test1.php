<?php
  require_once "includes/connect.inc.php";
 
  if (isset($_POST['query'])) {
      $query = "SELECT * FROM agenda WHERE des LIKE '%{$_POST['query']}%' LIMIT 100";
      $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
          $sql="SELECT * FROM meeting where flag=1 AND id=".$res['meeting_id'];
          $res1=mysqli_query($conn,$sql);
          if($row = mysqli_fetch_array($res1)){
            echo 'Meeting number-'.$row['count'].' '.$res['title']. "<br/>";
          }
        }
    } else {
      echo "
      <div class='alert alert-danger mt-3 text-center' role='alert'>
          Minutes not found
      </div>
      ";
    }
  }
?>