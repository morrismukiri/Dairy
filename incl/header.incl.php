<?php
include_once __DIR__.'/config.incl.php';
$current_user = array();

function Page_Url() {
    echo PAGE_URL;
}

if (file_exists('auth/auth.php')) {
    include 'auth/auth.php';
} elseif (file_exists('../auth/auth.php')) {
    include '../auth/auth.php';
} elseif (file_exists('../../auth/auth.php')) {
    include '../../auth/auth.php';
}
$log = new logmein();
$log->encrypt = true;
if (!isset($_SESSION['loggedin']) || !$log->logincheck($_SESSION['loggedin'], "employees", "e_pass", "e_mail")) {
    $log->loginform("login", "loginform", PAGE_URL . "auth/login.php");
    exit();
} else {
    $current_user['email'] = $_SESSION['username'];
    $current_user['name'] = $_SESSION['full_name'];
    $current_user['role'] = $_SESSION['userlevel'];
    list($singlename) = explode(' ', $current_user['name'], 3);
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <!-- for faster page loads these should be on the footer, but careful on having jQuery code in your pages if you do -->
        <script type="text/javascript" src="<?php Page_Url() ?>js/jquery-1.8.2.js"></script>
        <script type="text/javascript" src="<?php Page_Url() ?>js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php Page_Url() ?>js/bootstrap-datetimepicker.min.js"></script>

        <link type="text/css" rel="stylesheet" href="<?php Page_Url() ?>css/bootstrap.css" /> 
        <link type="text/css" rel="stylesheet"	href="<?php Page_Url() ?>css/bootstrap-responsive.css" />
        <link type="text/css" rel="stylesheet" href="<?php Page_Url() ?>css/main.css" />
        <link type="text/css" rel="stylesheet" href="<?php Page_Url() ?>css/bootstrap-datetimepicker.min.css" />
        <title>Dairy Record Manager</title>
    </head>
    <body >
        <!--    The top of the page visible on all pages in the system-->

        <div id="top" class="page-header">
            <div id="user" class='pull-right'>
                <?php echo "Welcome $singlename [" . $current_user['role'] . "]" ?> 
                <a class="" href=<?php Page_Url(); ?>auth/logout.php>logout</a>      
            </div>
            <!--top logo-->	
            <a href="<?php Page_Url(); ?>"><img src="<?php Page_Url() ?>img/logo.png"/ alt="logo" id="logo"></a>

            <div id="navigation" class="navbar pull-right">
                <h1 id="title" >Dairy Record System</h1>

                <ul class="nav navbar-inner">
                    <li><a href="<?php Page_Url() ?>">Home</a></li>
                    <li><a href="<?php Page_Url() ?>farmers/index.php">Farmers</a></li>
                    <li><a href="<?php Page_Url() ?>employees/index.php">Employees</a></li>
                    <li><a href="<?php Page_Url() ?>delivery/index.php">Deliveries</a></li>
                    <li><a href="<?php Page_Url() ?>payment/index.php">Payments</a></li>
                    <li><a href="<?php Page_Url() ?>reports/index.php">Reports</a></li>	
                    <li><a href="<?php Page_Url() ?>settings/index.php">Settings</a></li>
                </ul>
            </div> <!--end navigation-->
        </div>
        <!--beginning of the pages' body-->
        <div  id="main-content" class="modal-body" >