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
            $_POST[$key] = mysqli_real_escape_string($conn, $value);
        }
        $hashed_pass=  md5($_POST['e_pass']);
        $sql = "UPDATE `employees` SET  `e_name` =  '{$_POST['e_name']}' ,  `e_mail` =  '{$_POST['e_mail']}' ,  `e_pass` =  '{$hashed_pass}' ,  `e_role` =  '{$_POST['e_role']}' ,  `e_payroll_no` =  '{$_POST['e_payroll_no']}'   WHERE `e_payroll_no` = '$e_payroll_no' ";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        echo (mysqli_affected_rows($conn)) ? "Changes Saved.<br />" : "Nothing changed. <br />";
        echo "<a href='index.php'>Back To Employees</a>";
    }
    $result = mysqli_query($conn,"SELECT * FROM `employees` WHERE `e_payroll_no` ='$e_payroll_no'");
    $row = mysqli_fetch_array($result);
    include 'form.php';
}
?> 
