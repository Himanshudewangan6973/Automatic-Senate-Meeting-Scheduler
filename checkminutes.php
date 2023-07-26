<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->
<style>
  <?php include 'CSS/table.css'; ?>
</style>
<head>
  <meta charset="UTF-8">
  <title>Minutes List</title>
</head>
<?php
  include_once "includes/connect.inc.php";
  $sql="SELECT * FROM meeting WHERE flag=1 ORDER BY count DESC";
  $res=mysqli_query($conn,$sql);

  echo'
  <main class="container" style="display:flex;">
    <div>
      <div class="mt-5" style="max-width: 555px">
      <div class="card-header alert alert-warning text-center mb-3"></div>
      <input type="text" class="form-control" name="live_search" id="live_search" autocomplete="off" placeholder="Search ...">
      <div id="search_result"></div>
    </div>
      <table class="styled-table">
        <thead>
          <tr>
            <th>Meeting Number</th>
            <th>Meeting Date</th>
            <th>Minutes</th>
          </tr>
        </thead>';
      while($row=mysqli_fetch_array($res)){
        // Header content type
        echo'
          <tbody>
            <td>'.$row['count'].'</td>
            <td>'.$row['date'].'</td>
            <td><a href="download.php?path=minutes/'.$row['minutes'].'"</a>Download Minutes</td>
          </tbody>';
      }
    echo'
      </table>
      <a href="index.php" style="margin: 20px auto;">Homepage</a>
    </div>
  <main>';
?>
<?php include 'footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#live_search").keyup(function () {
            var query = $(this).val();
            if (query != "") {
                $.ajax({
                    url: 'test1.php',
                    method: 'POST',
                    data: {
                        query: query
                    },
                    success: function (data) {
                        $('#search_result').html(data);
                        $('#search_result').css('display', 'block');
                        $("#live_search").focusout(function () {
                            $('#search_result').css('display', 'none');
                        });
                        $("#live_search").focusin(function () {
                            $('#search_result').css('display', 'block');
                        });
                    }
                });
            } else {
                $('#search_result').css('display', 'none');
            }
        });
    });
</script>