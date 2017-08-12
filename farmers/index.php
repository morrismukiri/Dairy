<?php 
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?>
<h1>Farmers</h1>
<?php
if(isset($_GET['delete'] , $_GET['id'])){
    if ($current_user['role'] == 'Clerk') {
echo "sorry Clerks are not allowed to access this module";
exit();
}
$f_no = (int) $_GET['id']; 
mysqli_query($conn,"DELETE FROM `farmers` WHERE `f_no` = '" .stripslashes($f_no)."' ") ; 
echo (mysqli_affected_rows($conn)) ? "farmer deleted.<br /> " : "Nothing deleted.<br /> ";
}
?> 
<a class="btn btn-large btn-primary" href="add.php"><i class="icon-plus icon-white"></i>Add Farmer</a><br/><br/>
<table class="table table-hover table-striped table-condensed table-bordered">
    <thead class="" >
        <th>#</th>
        <th>Farmer NO:</th>
         <th>ID NO:</th>
        <th>Name:</th>
        <th>Locality</th>
        <th>Account No:</th>
        <th>Phone No:</th>
         <?php if ($current_user['role'] != 'Clerk') {?><th style="text-align: center">Tasks</th> <?php } ?>
        </thead>
    <tbody>
  <?php

$qry=  mysqli_query($conn,"select * from farmers") or die("unable to fetch records".  mysqli_error($conn));
$i=0;
while($row=  mysqli_fetch_array($qry))
{
    foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }
    $i+=1;
    echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$row['f_no'].'</td>';
          echo '<td>'.$row['f_id'].'</td>';
        echo '<td>'.$row['f_name'].'</td>';
        echo '<td>'.$row['f_locallity'].'</td>';
        echo '<td>'.$row['f_ac'].'</td>';
        echo '<td>'.$row['f_phone'].'</td>';
         if ($current_user['role'] != 'Clerk') {
             echo '<td  style="text-align: center">
                <a href="'.PAGE_URL.'farmers/edit.php?edit=1&id='.$row['f_no'].'" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Edit</a> | 
                <a href="'.PAGE_URL.'farmers/?delete=1&id='.$row['f_no'].'" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a> 
             </td>';
         }

    echo '</tr>';
}
?>
</tbody>
</table>


<?php 
include '../incl/footer.incl.php';
?>