<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
$start = isset($_REQUEST['from'])?$_REQUEST['from']:'';
    $end =isset($_REQUEST['to'])?$_REQUEST['to']:'';
?>

<h1>Farmers Monthly Sales Reports</h1>
<form class=" form-inline" method="post" action="">
    <div class="control-group">
        <label class="control-label" for="from"> From:</label >
        <div id="datetimepicker1" class="controls input-append date" style="margin-left: 20px">
            <input class="input-xlarge" type="text" data-format="yyyy-mm-dd"  placeholder="yyyy-mm-dd" name='from' value='<?php echo $start;?>'/> 
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
            </span>
        </div>

        <label class="control-label" for="to"> To:</label >
        <div id="datetimepicker2" class="controls input-append date" style="margin-left: 20px">
            <input class="input-xlarge" type="text" data-format="yyyy-mm-dd"  placeholder="yyyy-mm-dd" name='to' value='<?php echo $end;?>'/> 
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
            </span>
        </div>
    
        <input type="submit" class="btn btn-info" value="Get Records">
    </div>
</form>
<table class="table table-hover table-striped table-condensed table-bordered">
    <thead class="" >
    <th>#</th>
    <th>Farmer NO:</th>
    <th>Farmer Name:</th>
    <th>Total KGs:</th>
   </thead>
<tbody>
    <?php
    if(isset($_POST['from'])){
    $start = mysqli_real_escape_string($conn, $_REQUEST['from']);
    $end = mysqli_real_escape_string($conn, $_REQUEST['to']);

    $farmers = mysqli_query($conn,"select f_no,f_name from farmers") or die("unable to fetch records" . mysqli_error($conn));
    $i = 0;
    $total=0;
    while ($farmer = mysqli_fetch_array($farmers)) {
        //$i+=1;
        $f_no = $farmer['f_no'];
        $result = mysqli_query($conn,"SELECT r_kg FROM `delivery` WHERE r_f_no=$f_no and `r_dt` >='$start' and `r_dt` <= '$end'") or trigger_error(mysqli_error($conn));

        $farmer_total = 0;
        while ($row = mysqli_fetch_array($result)) {
            foreach ($row AS $key => $value) {$row[$key] = stripslashes($value);}

            $farmer_total+=nl2br($row['r_kg']);
        }
        $i+=1;
        $total+=$farmer_total;
            echo "<tr>";
            echo '<td>' . $i . '</td>';
            //echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
            echo "<td valign='top'>" . nl2br($farmer['f_no']) . "</td>";
            echo "<td valign='top'>" . nl2br($farmer['f_name']) . "</td>";
            echo "<td valign='top'>" . $farmer_total . "</td>";
            echo "</tr>";
        }
        echo "<tr class='success'><td><strong>Total</strong></td><td><strong>All</strong><td>--</td><td>$total Kgs</td></tr>";
    }
    ?>
</tbody>
</table>
<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            $('#datetimepicker1,#datetimepicker2').datetimepicker({
                language: 'pt-BR',
                pickTime: false,
                format:'yyyy-MM-dd'
            });
        });
    });
</script>
<?php include '../incl/footer.incl.php'; ?>

