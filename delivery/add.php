

<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
include 'validate.php';
$validation = array('valid' => true, 'fn' => '', 'kg' => '', 'dt' => '');

if (isset($_POST['submitted'])) {
    foreach ($_POST AS $key => $value) {
        $_POST[$key] = mysql_real_escape_string($value);
    }
    $validation = validate_delivery($_POST['r_f_no'], $_POST['r_kg'], $_POST['r_dt']);
    if ($validation['valid']) {
        $datetime = strtotime($_POST['r_dt']);
        $mysqldate = date("Y-m-d H:i:s", $datetime);
        $sql = "INSERT INTO `delivery` ( `r_f_no` ,  `r_kg` ,  `r_dt` ,  `r_deliverer`  ) VALUES(  '{$_POST['r_f_no']}' ,  '{$_POST['r_kg']}' ,  '{$mysqldate}' ,  '{$_POST['r_deliverer']}'  ) ";
        mysql_query($sql) or die(mysql_error());
        echo "Saved!.<br />";
        echo "<a href='index.php' class='btn btn-primary'>Back To Deliveries</a>";
    }
}
?>
<h1>Add Deliveries</h1>
<form action='' method='POST' class="form-horizontal" name="add_delivery"> 
    <div class="control-group">
        <label class="control-label" for="r_f_no">Farmer No:</label >
        <div class="controls">
            <input id="f_no" class="input-xlarge" type="text" placeholder="CCF****" name='r_f_no' value=''/> 
            <span id="farmercheck"></span>
            <?php echo $validation['fn'] ?>
        </div>

    </div>
    <div class="control-group">
        <label class="control-label" for="r_kg"> Milk in Kgs:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="4**" name='r_kg' id='r_kg' value=''/> 
            <?php echo $validation['kg'] ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="r_dt"> Time Delivered:</label >
        <div id="datetimepicker1" class="controls input-append date" style="margin-left: 20px">
            <input class="input-xlarge" type="text" data-format="yyyy-mm-dd hh:mm:ss"  placeholder="yyyy-mm-dd hh:mm:ss" name='r_dt' value=''/> 
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
            </span>
            <?php echo $validation['dt'] ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="r_deliverer"> Milk Deliverer:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Deliverer-X.." name='r_deliverer' value=''/> 
        </div>
    </div>
    <div class="control-group">

        <div class="controls">
            <input type='submit' value='Save' class="btn btn-success btn-large " /> 
            <input type='hidden' value='1' name='submitted' /> 
        </div>
    </div>
</form>


<?php include '../incl/footer.incl.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            $('#datetimepicker1').datetimepicker({
                language: 'pt-BR'
            });
        });
        $("#f_no,#r_kg").on("keyup", function(thisevent) {
            $.post('checkfarmer.json.php', {fname: add_delivery.f_no.value}, function(jsondata) {
                $('#farmercheck').html(jsondata + " : ")
            });

        });
    });
</script>

