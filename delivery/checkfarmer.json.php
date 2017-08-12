<?php
include_once  '../incl/conn.incl.php';
$fname=$_POST['fname'];
$fqry=  mysqli_query($conn,"select * from farmers where f_no='". mysqli_real_escape_string($conn, $fname) ."'")  or die("unable to fetch records" . mysqli_error($conn));
if(!mysqli_num_rows($fqry)<1){
    $farmer=mysqli_fetch_array($fqry);
    // $farmer=$farmers[0];
    ?>
 <div class="control-group">
<label class="control-label" for="farmer_name">Name:</label>
<div class="controls">
 <span class='input-xlarge uneditable-input' ><?php echo $farmer['f_name']; ?></span>
</div>
 </div>
    <div class="control-group">
            <label class="control-label" for="f_locallity"> Locality of Farmer:</label >
            <div class="controls">
                <span class="input-xlarge uneditable-input" placeholder="Area-X.." name='f_locallity'><?php echo $farmer['f_locallity']; ?></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_ac"> Farmer's A/C NO:</label >
            <div class="controls">
                <span  class="input-xlarge uneditable-input" ><?php echo $farmer['f_ac']; ?> </span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_phone"> Farmer Phone NO:</label >
            <div class="controls">
                <span class="input-xlarge uneditable-input"  ><?php echo $farmer['f_phone'] ?> </span>
            </div>
        </div>
    <?php   }else{
       echo '<span class="label label-warning "><i class="icon-warning-sign icon-white"></i> Farmer No Not Found!</span>';
   }
?>
