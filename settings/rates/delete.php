<?php  
include('../../incl/header.incl.php'); 
include('../../incl/conn.incl.php'); 

if ($current_user['role'] != 'Manager') {
echo "sorry you are not allowed to access this module";
exit();
}
$id = (int) $_GET['id']; 
mysqli_query($conn,"DELETE FROM `settings_rates` WHERE `id` = '$id' ") ; 
echo (mysqli_affected_rows($conn)) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='index.php'>Back To Listing</a>