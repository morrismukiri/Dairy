<?php
if (!defined(PAGE_URL))define ('PAGE_URL', 'http://localhost/Dairy/');
include("auth.php");
$log = new logmein();
$log->encrypt = FALSE; //set encryption
//Log out
$log->logout();
header("location:".PAGE_URL);
?>
