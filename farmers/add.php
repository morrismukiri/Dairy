<?php
include '../incl/header.incl.php';
include("../incl/conn.incl.php"); // include the connection settings
include 'validate.php';
?>
<h1>Add Farmers</h1>
<?php
$validation = array('valid' => true, 'nulls' => '', 'id' => '', 'no' => '');
if (isset($_POST['f_no'])) {
//    foreach ($_POST AS $key => $value) {
//        $_POST[$key] = mysqli_real_escape_string($conn, $value);
//    }
    $validation = validate_farmers($_POST['f_no'], $_POST['f_id'], $_POST['f_name'], $_POST['f_locallity'], $_POST['f_ac'], $_POST['f_phone'],$conn);
    if ($validation['valid'] == TRUE) {
        $sql = "INSERT INTO `farmers` ( `f_no` ,`f_id` , `f_name` , `f_locallity` ,  `f_ac` ,  `f_phone`  ) VALUES(  '{$_POST['f_no']}' ,'{$_POST['f_id']}' , '{$_POST['f_name']}' , '{$_POST['f_locallity']}' ,  '{$_POST['f_ac']}' ,  '{$_POST['f_phone']}'  ) ";

        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        echo "Farmer Added.<br />";
       
    } else {
        echo $validation['nulls'];
    }
}
?>
<a href='index.php' class='btn btn-primary'>Back To Farmers</a>
<form action='' method='post' class="form-horizontal"> 
    <div class="control-group">
        <label class="control-label" for="f_no"> No:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="CCF****" name='f_no'/>
<?php echo $validation['no'] ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_id">ID No:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="CCF****" name='f_id'/> 
<?php echo $validation['id'] ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_name"> Name of Farmer:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Name.." name='f_name'/> 
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_locallity"> Locality of Farmer:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Area-X.." name='f_locallity'/> 
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_ac"> Farmer's A/C NO:</label >
        <div class="controls">
            <input  class="input-xlarge" type="text" placeholder="Bank account number ******.." name='f_ac'/> 
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_phone"> Farmer Phone NO:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="+254******.." name='f_phone'/> 
        </div>
    </div>
    <div class="control-group">

        <div class="controls">
            <input type='hidden' value='1' name='submitted' />
            <input type='submit' value='Add Farmer' class="btn btn-success btn-large" /> 
             
        </div>
    </div>
</form>


<?php
include '../incl/footer.incl.php';
?>
