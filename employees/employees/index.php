<?php
include('../inc.functions.php');

if (isset($_GET['delete'])) {
	mysql_query("DELETE FROM `employees` WHERE `id` = '$_GET[id]}'");
	$msg = (mysql_affected_rows() ? 'Row deleted.' : 'Nothing deleted.');
	header('Location: index.php?msg='.$msg);
}

$id = (isset($_GET['id']) ? $_GET['id'] : 0);
$action = ($id ? 'Editing' : 'Add new') . ' entry';

if (isset($_POST['submitted'])) {
	foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }
	$sql = "REPLACE INTO `employees` (`id`, `e_name`, `e_mail`, `e_pass`, `e_role`, `e_payroll_no`) VALUES ('$id', '$_POST[e_name]', '$_POST[e_mail]', '$_POST[e_pass]', '$_POST[e_role]', '$_POST[e_payroll_no]');";
	mysql_query($sql) or die(mysql_error());
	$msg = (mysql_affected_rows()) ? 'Edited row.' : 'Nothing changed.';
	header('Location: index.php?msg='.$msg);
}


print_header("employees » Employees » $action");

$row = mysql_fetch_array ( mysql_query("SELECT * FROM `employees` WHERE `id` = '$id' "));
?>
<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
<fieldset>
<legend>Add / Edit</legend>
<div>
<ul>
  <li><label><span>E Name:</span>
    <input type="text" name="e_name" value="<?= (isset($row['e_name']) ? stripslashes($row['e_name']) : '') ?>" /></label></li>
  <li><label><span>E Mail:</span>
    <input type="text" name="e_mail" value="<?= (isset($row['e_mail']) ? stripslashes($row['e_mail']) : '') ?>" /></label></li>
  <li><label><span>E Pass:</span>
    <input type="text" name="e_pass" value="<?= (isset($row['e_pass']) ? stripslashes($row['e_pass']) : '') ?>" /></label></li>
  <li><label><span>E Role:</span>
    <input type="text" name="e_role" value="<?= (isset($row['e_role']) ? stripslashes($row['e_role']) : '') ?>" /></label></li>
  <li><label><span>E Payroll No:</span>
    <input type="text" name="e_payroll_no" value="<?= (isset($row['e_payroll_no']) ? stripslashes($row['e_payroll_no']) : '') ?>" /></label></li>
</ul>
<p><input type="hidden" value="1" name="submitted" />
  <input type="submit" value="Add / Edit" /></p>
</div>
</fieldset>
</form>
<?
print_footer();
?>