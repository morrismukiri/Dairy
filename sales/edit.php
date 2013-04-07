
<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
include 'validate.php';
$validation = array('valid' => true, 'fn' => '', 'kg' => '', 'dt' => '');
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    if (isset($_POST['submitted'])) {
        foreach ($_POST AS $key => $value) {
            $_POST[$key] = mysql_real_escape_string($value);
        }
        $validation = validate_sales($_POST['r_f_no'], $_POST['r_kg'], $_POST['r_dt']);
        if ($validation['valid']) {
            $sql = "UPDATE `sales` SET  `r_f_no` =  '{$_POST['r_f_no']}' ,  `r_kg` =  '{$_POST['r_kg']}' ,  `r_dt` =  '{$_POST['r_dt']}' ,  `r_deliverer` =  '{$_POST['r_deliverer']}'   WHERE `id` = '$id' ";
            mysql_query($sql) or die(mysql_error());
            echo (mysql_affected_rows()) ? "Changes Saved.<br />" : "Nothing changed. <br />";
            echo "<a href='index.php' class='btn btn-primary'>Back To Sales</a>";
        }
        else{
            echo "<span class='error  badge badge-warning'>Errors found.</span>";
        }
    }
    $row = mysql_fetch_array(mysql_query("SELECT * FROM `sales` WHERE `id` = '$id' "));
    ?>
    <form action='' method='POST' class="form-horizontal"> 
        <div class="control-group">
            <label class="control-label" for="r_f_no">Farmer No:</label >
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="CCF****" name='r_f_no' value='<?= stripslashes($row['r_f_no']) ?>'/> 
            <?php echo $validation['fn'] ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="r_kg"> Milk in Kgs:</label >
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="4**" name='r_kg' value='<?= stripslashes($row['r_kg']) ?>'/> 
            <?php echo $validation['kg'] ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="r_dt"> Time Delivered:</label >
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="yyyy-mm-dd hh:mm:ss" name='r_dt' value='<?= stripslashes($row['r_dt']) ?>'/> 
            <?php echo $validation['dt'] ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="r_deliverer"> Milk Deliverer:</label >
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Deliverer-X.." name='r_deliverer' value='<?= stripslashes($row['r_deliverer']) ?>'/> 
            </div>
        </div>
        <div class="control-group">

            <div class="controls">
                <input type='submit' value='Save' class="btn btn-success btn-large " /> 
                <input type='hidden' value='1' name='submitted' /> 
            </div>
        </div>
    </form>
<?php } ?> 