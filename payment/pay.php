<?
include '../incl/header.incl.php';
include '../incl/conn.incl.php';

if (isset($_GET['f_no'])) {
    $f_no = mysql_real_escape_string($_GET['f_no']);
    $start = mysql_real_escape_string($_REQUEST['start']);
    $end = mysql_real_escape_string($_REQUEST['end']);
$authority='';

    $rates = mysql_fetch_array(mysql_query("SELECT * FROM `settings_rates` WHERE `from` >=$start and  `to` <=$end"));
    //$rates = mysql_fetch_row($ratesrows);

    $farmer = mysql_fetch_array(mysql_query("select f_no,f_name,last_paid,f_ac from farmers where f_no=$f_no", $conn));
    //$farmer = mysql_fetch_row($farmers);

    $result = mysql_query("SELECT r_kg FROM `delivery` WHERE r_f_no=$f_no and `r_dt` >='$start' and `r_dt` <= '$end'", $conn) or trigger_error(mysql_error());

    $farmer_total = 0;
    while ($row = mysql_fetch_array($result)) {
        foreach ($row AS $key => $value) {
            $row[$key] = stripslashes($value);
        }

        $farmer_total+=nl2br($row['r_kg']);
    }
    if(isset($_post['authority'])){
    $authority=$_post['authority'];
    $datetime = strtotime(date('y-m-d'));
    $mysqldate = date("Y-m-d", $datetime);
    $insertcmd=  mysql_query("INSERT INTO `payment` ( `p_to` ,  `p_date` ,  `p_ac` ,  `p_transacted_by`  ) VALUES(  '{$f_no}' ,  '{$mysqldate}' ,  '{$farmer['f_ac']}' ,  '{$authority}'  ) ");
}
    ?>
    <div id="printable">
        <table id="receipt"  >
            <thead style="margin-bottom: 20px">
            <th colspan="2"  >Ciangoi Cabugi Payment Receipt</th>
                      </thead>
            <tbody>
                <tr><td><strong>Paid to</strong></td><td><?php echo $f_no . ' -- ' . $farmer['f_name']; ?> </td></tr>
                <tr><td><strong>In Account No</strong></td><td> <?php echo $farmer['f_ac']; ?></td></tr>
                <tr><td><strong> a total sum of</strong></td><td> <?php echo $farmer_total; ?></td></tr>
                <tr><td><strong>For sales between</strong></td><td> <?php echo $start . ' to ' . $end ?></td></tr>
                <tr><td><strong>Paid on</strong></td><td> <?php echo date('y-m-d'); ?> </td></tr>
              <!--<tr><td><strong>Authorized by:</strong></td><td><?php echo $authority; ?></td></tr>-->
                </tbody>
        </table>
    </div>
<br/><br/>

<form method="post" action="" class="form-inline">
    <label for="authority">Authorized By:</label><input type="text" id="authority" name="authority" >
    <input type="submit" id="print" class="btn btn-success" value="print Receipt">
    
</form>
    <?php
}
?>
    <?php include '../incl/footer.incl.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
      $('#print').on('click', function (){
       $('#authorizer').text($('#authority').val());
       printDiv('printable') ;
       
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