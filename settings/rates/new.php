<?php 
include '../../incl/header.incl.php';
include '../../incl/conn.incl.php';
if ($current_user['role'] != 'Manager') {
echo "sorry you are not allowed to access this module";
exit();
}
$id=0;
if (isset($_POST['submitted'])) {
    foreach ($_POST AS $key => $value) {
        $_POST[$key] = mysql_real_escape_string($value);
    }
  $from=  date("Y-m-d",strtotime($_POST['from']) );
  $to= date("Y-m-d",strtotime($_POST['to']) );
    $sql = "INSERT INTO `settings_rates` ( `from` ,  `to` ,  `rate`  ) VALUES(  '{$from}' ,  '{$to}' ,  '{$_POST['rate']}'  ) ";
    mysql_query($sql) or die(mysql_error());
    
    echo "Added row.<br />";
   
     
} 
echo "<a href='index.php'>Back To Listing</a>";
 $row = mysql_fetch_array(mysql_query("SELECT * FROM `settings_rates` WHERE `id` = '$id' "));
 include 'form.php';
 ?>
