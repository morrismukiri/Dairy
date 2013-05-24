<?php
if (!defined('PAGE_URL'))define ('PAGE_URL', 'http://localhost/Dairy/');
include("auth.php");
$log = new logmein();
$log->encrypt = false; //set encryption
if($_REQUEST['action'] == "login"){
    if($log->login("logon", $_REQUEST['username'], $_REQUEST['password']) == true){
        //do something on successful login
        header("location:".PAGE_URL);
    }else{
        //do something on FAILED login
        $log->loginform("login", "loginform", PAGE_URL."auth/login.php");
    }
}
?>
