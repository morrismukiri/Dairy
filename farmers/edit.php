<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
include 'validate.php';

if ($current_user['role'] == 'Clerk') {
echo "sorry Clerks are not allowed to access this module";
exit();
}

?>
<h1>Edit Farmer</h1>
<?php
//if (isset($_GET['edit']) && isset($_GET['id'])) {
    $f_no = (int) $_GET['id'];
    if (isset($_POST['f_no'])) {
        // 
       $validation= validate_farmers($_POST['f_no'], $_POST['f_id'], $_POST['f_name'], $_POST['f_locallity'], $_POST['f_ac'], $_POST['f_phone'],$conn);
          if ($validation['valid']==TRUE ) {
              $sql = "UPDATE farmers SET  f_no =  '{$_POST['f_no']}' ,f_id =  '{$_POST['f_id']}' ,  f_name =  '{$_POST['f_name']}' , f_locallity =  '{$_POST['f_locallity']}' ,  f_ac =  '{$_POST['f_ac']}' ,  f_phone =  '{$_POST['f_phone']}'   WHERE f_no = '$f_no' ";
            $rslt = mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $f_no =  $_POST['f_no'];
            echo (mysqli_affected_rows($conn)) ? " Saved successfully.<br />" : "Nothing changed. <br />";
            echo "";
            
        }
 else {
            echo $validation['nulls'];
 }
    }
    $farmer_to_edit = mysqli_query($conn,"SELECT * FROM farmers WHERE f_no =".  stripslashes($f_no) );

    $row = mysqli_fetch_array($farmer_to_edit);
     //echo $validation['nulls'];
    ?>
<a href='index.php' class='btn btn-primary'>Back To Listing</a>
    <form action='' method='POST' class="form-horizontal"> 
        <div class="control-group">
            <label class="control-label" for="f_no"> No:</label >
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="CCF****" name='f_no' value='<?php echo stripslashes($row['f_no']) ?>'/> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_id"> ID NO:</label >
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="4816****" name='f_id' value='<?php echo stripslashes($row['f_id']) ?>'/> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_name"> Name of Farmer:</label >
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Name.." name='f_name' value='<?php echo stripslashes($row['f_name']) ?>'/> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_locallity"> Locality of Farmer:</label >
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Area-X.." name='f_locallity' value='<?php echo stripslashes($row['f_locallity']) ?>'/> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_ac"> Farmer's A/C NO:</label >
            <div class="controls">
                <input  class="input-xlarge" type="text" placeholder="Bank account number ******.." name='f_ac' value='<?php echo stripslashes($row['f_ac']) ?>' /> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_phone"> Farmer Phone NO:</label >
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="+254******.." name='f_phone'  value='<?php echo stripslashes($row['f_phone']) ?>' /> 
            </div>
        </div>
        <div class="control-group">

            <div class="controls">
                <input type='submit' value='Save' class="btn btn-success btn-large " /> 
                <input type='hidden' value='1' name='submitted' /> 
            </div>
        </div>
    </form>
<?php  //} ?> 