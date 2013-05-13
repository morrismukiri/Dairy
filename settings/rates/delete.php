<? 
include('../../incl/conn.incl.php'); 
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM `settings_rates` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='index.php'>Back To Listing</a>