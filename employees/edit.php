<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';

if ($current_user['role'] != 'Manager') {
    echo "sorry you are not allowed to access this module";
    exit();
}

if (isset($_GET['e_payroll_no'])) {
    $e_payroll_no = $_GET['e_payroll_no'];
    if (isset($_POST['submitted'])) {
        foreach ($_POST AS $key => $value) {
            $_POST[$key] = mysql_real_escape_string($value);
        }
        $hashed_pass=  md5($_POST['e_pass']);
        $sql = "UPDATE `employees` SET  `e_name` =  '{$_POST['e_name']}' ,  `e_mail` =  '{$_POST['e_mail']}' ,  `e_pass` =  '{$hashed_pass}' ,  `e_role` =  '{$_POST['e_role']}' ,  `e_payroll_no` =  '{$_POST['e_payroll_no']}'   WHERE `e_payroll_no` = '$e_payroll_no' ";
        mysql_query($sql) or die(mysql_error());
        echo (mysql_affected_rows()) ? "Changes Saved.<br />" : "Nothing changed. <br />";
        echo "<a href='index.php'>Back To Employees</a>";
    }
    $result = mysql_query("SELECT * FROM `employees` WHERE `e_payroll_no` ='$e_payroll_no'", $conn);
    $row = mysql_fetch_array($result);
    include 'form.php';
}
?> 
