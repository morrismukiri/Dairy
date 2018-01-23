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
        $_POST[$key] = mysqli_real_escape_string($conn, $value);
    }
  $from=  date("Y-m-d",strtotime($_POST['from']) );
  $to= date("Y-m-d",strtotime($_POST['to']) );
    $sql = "INSERT INTO `settings_rates` ( `from` ,  `to` ,  `rate`  ) VALUES(  '{$from}' ,  '{$to}' ,  '{$_POST['rate']}'  ) ";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    
    echo "Added row.<br />";
   
     
} 
echo "<a href='index.php'>Back To Listing</a>";
 $row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `settings_rates` WHERE `id` = '$id' "));
 include 'form.php';
 ?>
