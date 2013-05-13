<!DOCTYPE HTML>
<html>
 <?php
/*set the web address of the website with a trailing slash
 * for definite url paths
 */define('PAGE_URL', 'http://localhost/Dairy/');
function Page_Url() {
    echo  PAGE_URL;
    
}

//include("conn.php");// include the connection settings
?>   <head>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="<?php Page_Url()?>css/bootstrap.css" /> 
        <link type="text/css" rel="stylesheet"	href="<?php Page_Url()?>css/bootstrap-responsive.css" />
               <link type="text/css" rel="stylesheet" href="<?php Page_Url()?>css/main.css" />
        <link type="text/css" rel="stylesheet" href="<?php Page_Url()?>css/bootstrap-datetimepicker.min.css" />
        <title>Ciangoi Cabugi RMS</title>
    </head>
    <body >
        <!--    The top of the page visible on all pages in the system-->
        <div id="top" class="page-header">
            <!--top logo-->	
            <a href="<?php Page_Url()?>"><img src="<?php Page_Url()?>img/logo.png"/ alt="logo" id="logo"></a><h1 id="title" >Ciangoi Cabugi Dairy Record System</h1>
            <!--top navigation-->	
            <div id="navigation" class="navbar pull-right">
                <ul class="nav navbar-inner">
                    <li><a href="<?php Page_Url()?>">Home</a></li>
                    <li><a href="<?php Page_Url()?>farmers/index.php">Farmers</a></li>
                    <li><a href="<?php Page_Url()?>delivery/index.php">Deliveries</a></li>
                    <li><a href="<?php Page_Url()?>reports/index.php">Reports</a></li>	
                        <li><a href="<?php Page_Url()?>settings/index.php">Settings</a></li>	
                </ul>
            </div> <!--end navigation-->
        </div>
        <!--beginning of the pages' body-->
        <div  id="main-content" class="modal-body" >