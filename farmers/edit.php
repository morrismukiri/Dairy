<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?>
<h1>Edit Farmer</h1>
<?php
if (isset($_GET['edit']) && isset($_GET['id'])) { 
$f_no = (int) $_GET['id']; 
if (isset($_POST['submitted'])) { 
//foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($conn,$value); } 
$sql = "UPDATE farmers SET  f_no =  '{$_POST['f_no']}' ,  f_name =  '{$_POST['f_name']}' , f_locallity =  '{$_POST['f_locallity']}' ,  f_ac =  '{$_POST['f_ac']}' ,  f_phone =  '{$_POST['f_phone']}'   WHERE f_no = '$f_no' "; 
$rslt=mysql_query($sql,$conn) or die(mysql_error()); 
echo (mysql_affected_rows($conn)) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='index.php' class='btn btn-primary'>Back To Listing</a>"; 
} 
$farmer_to_edit=mysql_query("SELECT * FROM farmers WHERE f_no = $f_no  ",$conn);

$row = mysql_fetch_array ($farmer_to_edit); 
?>


<!--/**<form action='' method='POST'> 
<p><b>F No:</b><br /><input type='text' name='f_no' value='<?= stripslashes($row['f_no']) ?>' /> 
<p><b>F Locallity:</b><br /><input type='text' name='f_locallity' value='<?= stripslashes($row['f_locallity']) ?>' /> 
<p><b>F Ac:</b><br /><input type='text' name='f_ac' value='<?= stripslashes($row['f_ac']) ?>' /> 
<p><b>F Phone:</b><br /><input type='text' name='f_phone' value='<?= stripslashes($row['f_phone']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> */--> 

<form action='' method='POST' class="form-horizontal"> 
    <div class="control-group">
        <label class="control-label" for="f_no"> No:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="CCF****" name='f_no' value='<?= stripslashes($row['f_no']) ?>'/> 
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_name"> Name of Farmer:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Name.." name='f_name' value='<?= stripslashes($row['f_name']) ?>'/> 
        </div>
    </div>
     <div class="control-group">
        <label class="control-label" for="f_locallity"> Locality of Farmer:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Area-X.." name='f_locallity' value='<?= stripslashes($row['f_locallity']) ?>'/> 
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_ac"> Farmer's A/C NO:</label >
        <div class="controls">
            <input  class="input-xlarge" type="text" placeholder="Bank account number ******.." name='f_ac' value='<?= stripslashes($row['f_ac']) ?>' /> 
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_phone"> Farmer Phone NO:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="+254******.." name='f_phone'  value='<?= stripslashes($row['f_phone']) ?>' /> 
        </div>
    </div>
      <div class="control-group">
    
       <div class="controls">
           <input type='submit' value='Save' class="btn btn-success btn-large " /> 
           <input type='hidden' value='1' name='submitted' /> 
           </div>
    </div>
</form>
<? } ?> 