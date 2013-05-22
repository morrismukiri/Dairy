<?php
ERROR_REPORTING(E_ALL);
session_start();

include("../phpmylogon.php");

pml_checklogin("test.php");


?>