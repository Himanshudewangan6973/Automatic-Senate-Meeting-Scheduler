<?php
  require_once "includes/connect.inc.php";
 
  if (isset($_POST['query'])) {
      $query = "SELECT * FROM agenda WHERE title LIKE '%{$_POST['query']}%' LIMIT 100";
      $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
          echo $res['title']. "<br/>";
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