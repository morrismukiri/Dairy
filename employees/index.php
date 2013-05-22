<? 
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
echo "<table class='table table-hover table-striped table-condensed table-bordered' border=1 >"; 
echo "<tr>"; 
//echo "<td><b>Id</b></td>"; 
echo "<td><b>E Name</b></td>"; 
echo "<td><b>E Mail</b></td>"; 
echo "<td><b>E Pass</b></td>"; 
echo "<td><b>E Role</b></td>"; 
echo "<td><b>E Payroll No</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `employees`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
//echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['e_name']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['e_mail']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['e_pass']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['e_role']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['e_payroll_no']) . "</td>";  
echo "<td valign='top'><a href=edit.php?e_payroll_no={$row['e_payroll_no']}>Edit</a></td><td><a href=delete.php?e_payroll_no={$row['e_payroll_no']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=add.php>New Employee</a>"; 
?>