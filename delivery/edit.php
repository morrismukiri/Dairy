
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
        $validation = validate_delivery($_POST['r_f_no'], $_POST['r_kg'], $_POST['r_dt']);
        if ($validation['valid']) {
            $datetime = strtotime($_POST['r_dt']);
            $mysqldate = date("Y-m-d H:i:s", $datetime);
            $sql = "UPDATE `delivery` SET  `r_f_no` =  '{$_POST['r_f_no']}' ,  `r_kg` =  '{$_POST['r_kg']}' ,  `r_dt` =  '{$mysqldate}' ,  `r_deliverer` =  '{$_POST['r_deliverer']}'   WHERE `id` = '$id' ";
            mysql_query($sql) or die(mysql_error());
            echo (mysql_affected_rows()) ? "Changes Saved.<br />" : "Nothing changed. <br />";
            echo "<a href='index.php' class='btn btn-primary'>Back To Deliveries</a>";
        } else {
            echo "<span class='error  badge badge-warning'>Errors found.</span>";
        }
    }
    $row = mysql_fetch_array(mysql_query("SELECT * FROM `delivery` WHERE `id` = '$id' "));
    ?>

    <?php
    include 'form.php';
}
include '../incl/footer.incl.php';
?>
