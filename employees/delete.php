<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
if ($current_user['role'] != 'Manager') {
    echo "sorry you are not allowed to access this module";
    exit();
}
$e_payroll_no = $_GET['e_payroll_no'];
mysql_query("DELETE FROM `employees` WHERE `e_payroll_no` = '$e_payroll_no' ");
echo (mysql_affected_rows()) ? "Employee deleted.<br /> " : "Nothing deleted.<br /> ";
?> 

<a href='index.php'>Back To Employees</a>