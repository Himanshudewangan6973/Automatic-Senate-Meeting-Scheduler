<link rel="stylesheet" 
href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />     
<link rel="stylesheet" 
href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css" />     
<Script src="https://code.jquery.com/jquery-1.12.3.js" type="text/javascript"></Script>     
<Script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" 
type="text/javascript"></Script>     
<Script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js" 
type="text/javascript"></Script>     
<Script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" 
type="text/javascript"></Script>     
<Script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js" 
type="text/javascript"></Script>

<style>
  <?php include 'CSS/table.css'; ?>
</style>
<head>
  <meta charset="UTF-8">
  <title>Attendance List</title>
</head>

<?php
    include_once "includes/connect.inc.php";
    include "header.php";
    $sql="SELECT * FROM meeting WHERE flag=0";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);

    $sql1="SELECT * FROM invite WHERE meeting_id=".$row['id'];
    $res1=mysqli_query($conn,$sql1);

    echo'
    <main style="margin-bottom:50px;">
        <div class="container">
            <table id="example" class="display styled-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Attendance</th>
                        
                    </tr>
                </thead>
                <tbody>';
                while($row1=mysqli_fetch_array($res1)){
                    $sql2="SELECT * FROM members WHERE id=".$row1['member_id'];
                    $res2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_array($res2);
                    
                    echo'
                        <tr>
                            <td>'.$row2['name'].'</td>
                            <td>'.$row2['post'].'</td>';
                            if($row1['status']==0){
                            echo' <td>Not responded</td>';
                            }
                            elseif($row1['status']==1){
                                echo' <td>Attending</td>';
                            }
                            elseif($row1['status']==2){
                                echo' <td>Not Attending</td>';
                            }
                    echo'</tr>';
                }
                echo'
                </tbody>
            </table>
        </div>
    </main>';
?>
<?php include 'footer.php'; ?>

<script>
    $(document).ready(function () {
        $(document).ready(function () {
            $('table').DataTable({                    
                dom: 'Blfrtip',
                buttons: [{
                    text: 'Export To Excel',                       
                    extend: 'excelHtml5',
                    exportOptions: {
                        modifier: {
                            selected: true
                        },
                        columns: [0, 1, 2, 3],
                        format: {
                            header: function (data, columnIdx) {
                                return data;
                            },
                            body: function (data, column, row) {
                                // Strip $ from salary column to make it numeric
                                debugger;
                                return column === 4 ? "" : data;
                            }
                        }
                    },
                    footer: false,
                    customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        //$('c[r=A1] t', sheet).text( 'Custom text' );
                        //$('row c[r^="C"]', sheet).attr('s', '2');
                    }
                }]
            });
        });
    });
</script>