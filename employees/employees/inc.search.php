<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="get">
<fieldset>
<legend><a href="#" onclick="$('#search-form').slideToggle()">Search</a></legend>
<div id="search-form" style="display:none">
<ul>
  <li><label><span>E Name:</span>
    <?= search_options('e_name', (isset($_GET['e_name_opts']) ? stripslashes($_GET['e_name_opts']) : '')) ?></label>
    <input type="text" name="e_name" value="<?= (isset($_GET['e_name']) ? stripslashes($_GET['e_name']) : '') ?>" /></li>
  <li><label><span>E Mail:</span>
    <?= search_options('e_mail', (isset($_GET['e_mail_opts']) ? stripslashes($_GET['e_mail_opts']) : '')) ?></label>
    <input type="text" name="e_mail" value="<?= (isset($_GET['e_mail']) ? stripslashes($_GET['e_mail']) : '') ?>" /></li>
  <li><label><span>E Pass:</span>
    <?= search_options('e_pass', (isset($_GET['e_pass_opts']) ? stripslashes($_GET['e_pass_opts']) : '')) ?></label>
    <input type="text" name="e_pass" value="<?= (isset($_GET['e_pass']) ? stripslashes($_GET['e_pass']) : '') ?>" /></li>
  <li><label><span>E Role:</span>
    <?= search_options('e_role', (isset($_GET['e_role_opts']) ? stripslashes($_GET['e_role_opts']) : '')) ?></label>
    <input type="text" name="e_role" value="<?= (isset($_GET['e_role']) ? stripslashes($_GET['e_role']) : '') ?>" /></li>
  <li><label><span>E Payroll No:</span>
    <?= search_options('e_payroll_no', (isset($_GET['e_payroll_no_opts']) ? stripslashes($_GET['e_payroll_no_opts']) : '')) ?></label>
    <input type="text" name="e_payroll_no" value="<?= (isset($_GET['e_payroll_no']) ? stripslashes($_GET['e_payroll_no']) : '') ?>" /></li>
</ul>
<p><input type="hidden" value="1" name="submitted" />
  <input type="submit" value="Search" /></p>
</div>
</fieldset>
</form>

<?php
$opts = array('id_opts', 'e_name_opts', 'e_mail_opts', 'e_pass_opts', 'e_role_opts', 'e_payroll_no_opts');
/* Sorround "contains" search term between %% */
foreach ($opts as $o) {
	if (isset($_GET[$o]) && $_GET[$o] == 'like') {
		$v = substr($o, 0, -5);
		$_GET[$v] = '%' . $_GET[$v] . '%';
	}
}

if (search_by('id'))
	$conds .= " AND id {$_GET['id_opts']} '{$_GET['id']}'";
if (search_by('e_name'))
	$conds .= " AND e_name {$_GET['e_name_opts']} '{$_GET['e_name']}'";
if (search_by('e_mail'))
	$conds .= " AND e_mail {$_GET['e_mail_opts']} '{$_GET['e_mail']}'";
if (search_by('e_pass'))
	$conds .= " AND e_pass {$_GET['e_pass_opts']} '{$_GET['e_pass']}'";
if (search_by('e_role'))
	$conds .= " AND e_role {$_GET['e_role_opts']} '{$_GET['e_role']}'";
if (search_by('e_payroll_no'))
	$conds .= " AND e_payroll_no {$_GET['e_payroll_no_opts']} '{$_GET['e_payroll_no']}'";
?>