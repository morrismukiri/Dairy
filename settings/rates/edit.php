<?
include '../../incl/header.incl.php';
include '../../incl/conn.incl.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    if (isset($_POST['submitted'])) {
        foreach ($_POST AS $key => $value) {
            $_POST[$key] = mysql_real_escape_string($value);
        }
        $sql = "UPDATE `settings_rates` SET  `from` =  '{$_POST['from']}' ,  `to` =  '{$_POST['to']}' ,  `rate` =  '{$_POST['rate']}'   WHERE `id` = '$id' ";
        mysql_query($sql) or die(mysql_error());
        echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />";
        echo "<a href='index.php'>Back To Listing</a>";
    }
    $row = mysql_fetch_array(mysql_query("SELECT * FROM `settings_rates` WHERE `id` = '$id' "));
    include 'form.php';
    } ?> 
