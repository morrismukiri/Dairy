<?php

include '../incl/header.incl.php';
include '../incl/conn.incl.php';

if ($current_user['role'] != 'Manager') {
    echo "sorry you are not allowed to access this module";
    exit();
}

$e_payroll_no = '';
if (isset($_POST['submitted'])) {
    foreach ($_POST AS $key => $value) {
        $_POST[$key] = mysql_real_escape_string($value);
    }
    $hashed_pass=  md5($_POST['e_pass']);
    $sql = "INSERT INTO `employees` ( `e_name` ,  `e_mail` ,  `e_pass` ,  `e_role` ,  `e_payroll_no`  ) VALUES(  '{$_POST['e_name']}' ,  '{$_POST['e_mail']}' ,  '{$hashed_pass}' ,  '{$_POST['e_role']}' ,  '{$_POST['e_payroll_no']}'  ) ";
    mysql_query($sql) or die(mysql_error());
    $e_payroll_no = $_POST['e_payroll_no'];
    echo "Employee added<br />";
    echo "<a href='index.php'>Back To Employees</a>";
}
$row = mysql_fetch_array(mysql_query("SELECT * FROM `employees` WHERE `e_payroll_no` ='$e_payroll_no'", $conn));
include 'form.php';
?>
