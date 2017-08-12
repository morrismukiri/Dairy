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
        $_POST[$key] = mysqli_real_escape_string($conn, $value);
    }
    $hashed_pass=  md5($_POST['e_pass']);
    $sql = "INSERT INTO `employees` ( `e_name` ,  `e_mail` ,  `e_pass` ,  `e_role` ,  `e_payroll_no`  ) VALUES(  '{$_POST['e_name']}' ,  '{$_POST['e_mail']}' ,  '{$hashed_pass}' ,  '{$_POST['e_role']}' ,  '{$_POST['e_payroll_no']}'  ) ";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $e_payroll_no = $_POST['e_payroll_no'];
    echo "Employee added<br />";
    echo "<a href='index.php'>Back To Employees</a>";
}
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `employees` WHERE `e_payroll_no` ='$e_payroll_no'"));
include 'form.php';
?>
