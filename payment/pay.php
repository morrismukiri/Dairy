<?php 
include '../incl/header.incl.php';
include '../incl/conn.incl.php';

if (isset($_GET['f_no'])) {
    $f_no = mysqli_real_escape_string($conn, $_GET['f_no']);
    $start = mysqli_real_escape_string($conn, $_REQUEST['start']);
    $end = mysqli_real_escape_string($conn, $_REQUEST['end']);
    $authority = '';

    $rates = mysqli_query($conn,"SELECT * FROM `settings_rates` WHERE `to` <='$end'");
    $rate = (int) mysqli_result($rates, 0, 'rate');
    //echo $rate;
//$rates = mysqli_fetch_row($ratesrows);

    $farmer = mysqli_fetch_array(mysqli_query($conn,"select f_no,f_name,last_paid,f_ac from farmers where f_no=$f_no"));
    //$farmer = mysqli_fetch_row($farmers);

    $result = mysqli_query($conn,"SELECT * FROM `delivery` WHERE r_f_no=$f_no and `r_dt` >='$start' and `r_dt` <= '$end'") or trigger_error(mysqli_error($conn));

    $farmer_total = 0;

    $authority = $current_user['name'];
    $datetime = strtotime(date('y-m-d'));
    $mysqldate = date("Y-m-d", $datetime);
    $updatesql="UPDATE `farmers` SET  `last_paid` =  '$mysqldate' WHERE  `f_no` =  '$f_no'";
    
    $insertcmd = mysqli_query($conn,$updatesql); //INSERT INTO `farmers` ( `p_to` ,  `p_date` ,  `p_ac` ,  `p_transacted_by`  ) VALUES(  '{$f_no}' ,  '{$mysqldate}' ,  '{$farmer['f_ac']}' ,  '{$authority}'  ) ");
    ?>
    <div id="printable">
        <table id="receipt"  >
            <thead style="margin-bottom: 20px">
            <th colspan="2"  ><h1>Ciangoi Cabugi Payment Receipt</h1></th>
            </thead>
            <tbody>
                <tr><td><strong>Paid to</strong></td><td><?php echo $f_no . ' -- ' . $farmer['f_name']; ?> </td></tr>
                <tr><td><strong>In Account No</strong></td><td> <?php echo $farmer['f_ac']; ?></td></tr>
                <tr><td><strong>Rates</strong></td><td> <?php echo $rate ?></td></tr>
                <tr><td><strong>For sales between</strong></td><td> <?php echo $start . ' to ' . $end ?></td></tr>
                <tr><td><strong>Paid on</strong></td><td> <?php echo date('y-m-d'); ?> </td></tr>
                <tr><td><strong>Authorized by:</strong></td><td><?php echo $current_user['name']; ?></td></tr>
        </table>  
        <h3>Details</h3>
        <?php
        echo '<table id="details" class="table table-hover table-striped table-condensed table-bordered">';
        echo '<thead class="" ><th>#</th><th>Date</th><th>KGs:</th></thead><tbody>';
        $count = 0;

        while ($row = mysqli_fetch_array($result)) {
            foreach ($row AS $key => $value) {
                $row[$key] = stripslashes($value);
            }
            $count+=1;
            $farmer_total+=nl2br($row['r_kg']);
            echo "<tr>";
            echo '<td>' . $count . '</td>';
            //echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
            echo "<td valign='top'>" . nl2br($row['r_dt']) . "</td>";
            echo "<td valign='top'>" . nl2br($row['r_kg']) . "</td>";
            echo "</tr>";
        }
        echo "<tr><td>Total</td><td></td><td><strong> $farmer_total</strong></td><tr>";
        echo '</tbody></table>';
        echo '<h4>Total amount KSh:'. ($farmer_total * $rate) .'</h4>';
        ?>


    </div>
    <br/><br/>

    <form method="post" action="" class="form-inline">
        <!--<label for="authority">Authorized By:</label><input type="text" id="authority" name="authority" >-->
        <input type="submit" id="print" class="btn btn-success" value="print Receipt">

    </form>
    <?php
}
?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#print').on('click', function() {
            printDiv('printable');

        });

    });
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
<?php include '../incl/footer.incl.php'; ?>
