<?php
include __DIR__ . "/../incl/config.incl.php";
include("auth.php");
$log = new logmein();
$log->encrypt = false; //set encryption
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "login"){
    $hashed_pass=  md5($_REQUEST['password']);
    if($log->login("logon", $_REQUEST['username'], $hashed_pass) == true){
        //do something on successful login
        header("location:".PAGE_URL);
       
    }
}
 //do something on FAILED login
 header("location:".PAGE_URL );
?>
