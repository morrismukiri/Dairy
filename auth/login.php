<?php
if (!defined('PAGE_URL'))define ('PAGE_URL', 'http://localhost/Dairy/');
include("auth.php");
$log = new logmein();
$log->encrypt = false; //set encryption
if($_REQUEST['action'] == "login"){
    $hashed_pass=  md5($_REQUEST['password']);
    if($log->login("logon", $_REQUEST['username'], $hashed_pass) == true){
        //do something on successful login
        header("location:".PAGE_URL);
    }else{
        //do something on FAILED login
      echo "wrong";
      echo "action: ". $_REQUEST['action'] ." , username: ". $_REQUEST['username']. " password: ".$_REQUEST['password'] ." Hashed: ".$hashed_pass;
      // header("location:".PAGE_URL);
        $log->loginform("login", "loginform", PAGE_URL."auth/login.php");
    }
}
?>
