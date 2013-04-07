

<?php 
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
include 'validate.php';
$validation = array('valid' => true, 'fn' => '', 'kg' => '', 'dt' => '');

if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
        $validation = validate_sales($_POST['r_f_no'], $_POST['r_kg'], $_POST['r_dt']);
if ($validation['valid']) {
$sql = "INSERT INTO `sales` ( `r_f_no` ,  `r_kg` ,  `r_dt` ,  `r_deliverer`  ) VALUES(  '{$_POST['r_f_no']}' ,  '{$_POST['r_kg']}' ,  '{$_POST['r_dt']}' ,  '{$_POST['r_deliverer']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='index.php' class='btn btn-primary'>Back To Sales</a>";
}
}

?>
<h1>Add Sales</h1>
 <form action='' method='POST' class="form-horizontal" name="add_sales"> 
        <div class="control-group">
            <label class="control-label" for="r_f_no">Farmer No:</label >
            <div class="controls">
                <input id="f_no" class="input-xlarge" type="text" placeholder="CCF****" name='r_f_no' value=''/> 
             <span id="farmercheck"></span>
              <?php echo $validation['fn'] ?>
            </div>
           
        </div>
        <div class="control-group">
            <label class="control-label" for="r_kg"> Milk in Kgs:</label >
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="4**" name='r_kg' id='r_kg' value=''/> 
                    <?php echo $validation['kg'] ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="r_dt"> Time Delivered:</label >
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="yyyy-mm-dd hh:mm:ss" name='r_dt' value=''/> 
               <?php echo $validation['dt'] ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="r_deliverer"> Milk Deliverer:</label >
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Deliverer-X.." name='r_deliverer' value=''/> 
            </div>
        </div>
        <div class="control-group">

            <div class="controls">
                <input type='submit' value='Save' class="btn btn-success btn-large " /> 
                <input type='hidden' value='1' name='submitted' /> 
            </div>
        </div>
    </form>


<?php include '../incl/footer.incl.php'; ?>
<script type="text/javascript">
    $(document).ready(function (){
      $("#f_no,#r_kg").on("keyup",function (thisevent){
          $.post('checkfarmer.json.php',{fname:add_sales.f_no.value},function(jsondata){
    $('#farmercheck').html(jsondata +" : ")});
   
  });
   });
</script>

