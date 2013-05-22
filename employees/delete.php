<? 
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
$e_payroll_no = (int) $_GET['e_payroll_no']; 
mysql_query("DELETE FROM `employees` WHERE `e_payroll_no` = '$e_payroll_no' ") ; 
echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='index.php'>Back To Listing</a>