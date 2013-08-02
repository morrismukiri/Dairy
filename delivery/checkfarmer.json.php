<?php
include_once  '../incl/conn.incl.php';
$fname=$_POST['fname'];
$fqry=  mysql_query("select * from farmers where f_no='". mysql_real_escape_string($fname) ."'",$conn)  or die("unable to fetch records" . mysql_error());
if(!mysql_num_rows($fqry)<1){
    ?>
 <div class="control-group">
<label class="control-label" for="farmer_name">Name:</label>
<div class="controls">
 <span class='input-xlarge uneditable-input' ><?php echo mysql_result($fqry, 0, 'f_name') ?></span>
</div>
 </div>
    <div class="control-group">
            <label class="control-label" for="f_locallity"> Locality of Farmer:</label >
            <div class="controls">
                <span class="input-xlarge uneditable-input" placeholder="Area-X.." name='f_locallity'><?php echo mysql_result($fqry, 0, 'f_locallity') ?></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_ac"> Farmer's A/C NO:</label >
            <div class="controls">
                <span  class="input-xlarge uneditable-input" ><?php echo mysql_result($fqry, 0, 'f_ac')?> </span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_phone"> Farmer Phone NO:</label >
            <div class="controls">
                <span class="input-xlarge uneditable-input"  ><?php echo mysql_result($fqry, 0, 'f_phone') ?> </span>
            </div>
        </div>
    <?php   }else{
       echo '<span class="label label-warning "><i class="icon-warning-sign icon-white"></i> Farmer No Not Found!</span>';
   }
?>
