<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?>

<h1>Farmers Monthly Sales Reports</h1>
<form class=" form-inline" method="post" action="">
    <div class="control-group">
        <label class="control-label" for="from"> From:</label >
        <div id="datetimepicker1" class="controls input-append date" style="margin-left: 20px">
            <input class="input-xlarge" type="text" data-format="yyyy-mm-dd"  placeholder="yyyy-mm-dd" name='from' value=''/> 
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
            </span>
        </div>

        <label class="control-label" for="to"> To:</label >
        <div id="datetimepicker2" class="controls input-append date" style="margin-left: 20px">
            <input class="input-xlarge" type="text" data-format="yyyy-mm-dd"  placeholder="yyyy-mm-dd" name='to' value=''/> 
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
            </span>
        </div>

        <input type="search" name="farmer" class="search-query" value="" placeholder="Farmer No">
        <input type="submit" class="btn btn-info" value="Get Records">
    </div>
</form>
<table class="table table-hover table-striped table-condensed table-bordered">
    <thead class="" >
    <th>#</th>
    <th>KGs:</th>
    <th>Date</th>
    <th>Deliverer:</th>
</thead>
<tbody>
    <?php
    if (isset($_REQUEST['farmer']) && $_REQUEST['farmer'] != '') {
        $f_no = mysql_real_escape_string($_REQUEST['farmer']);
        $start = $_REQUEST['from'] != '' ? " and `r_dt` >= '" . mysql_real_escape_string($_REQUEST['from']) . "'" : '';
        $end = $_REQUEST['to'] != '' ? " and `r_dt` <= '" . mysql_real_escape_string($_REQUEST['to']) . "'" : '';
        //$sql = "SELECT * FROM `delivery` WHERE `r_dt` >= \'2013-05-01 00:00:00\' or `r_dt` <= \'2013-05-30 00:00:00\' ";
        $result = mysql_query("SELECT * FROM `delivery` WHERE r_f_no=$f_no $start $end") or trigger_error(mysql_error());
       echo "SELECT * FROM `delivery` WHERE r_f_no=$f_no $start $end";
        $i = 0;
        $total=0;
        while ($row = mysql_fetch_array($result)) {
            foreach ($row AS $key => $value) {
                $row[$key] = stripslashes($value);
            }
            $i+=1;
            $total+=nl2br($row['r_kg']);
            echo "<tr>";
            echo '<td>' . $i . '</td>';
            //echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
            echo "<td valign='top'>" . nl2br($row['r_kg']) . "</td>";
            echo "<td valign='top'>" . nl2br($row['r_dt']) . "</td>";
            echo "<td valign='top'>" . nl2br($row['r_deliverer']) . "</td>";
            echo "</tr>";
        }
        echo "<tr><td><strong>Total</strong></td><td><strong>$total</strong><td>--</td><td>--</td></tr>";
    }
    ?>
</tbody>
</table>
<?php include '../incl/footer.incl.php'; ?>

<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            $('#datetimepicker1,#datetimepicker2').datetimepicker({
//                language: 'pt-BR;               
                pickTime: false,
                format:'yyyy-MM-dd'
            });
        });
    });
</script>