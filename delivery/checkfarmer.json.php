<?php
include_once  '../incl/conn.incl.php';
$fname=$_POST['fname'];
$fqry=  mysql_query("select f_no,f_name from farmers where f_no='". mysql_real_escape_string($fname) ."'",$conn)  or die("unable to fetch records" . mysql_error());
if(!mysql_num_rows($fqry)<1){
    echo "<span class='label label-success'><i class='icon icon-ok icon-white'></i> ".  mysql_result($fqry, 0, 1) ."</span>";
   }else{
       echo '<span class="label label-warning "><i class="icon-warning-sign icon-white"></i> Farmer No Not Found!</span>';
   }
?>
