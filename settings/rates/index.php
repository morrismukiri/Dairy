<?php 
include '../../incl/header.incl.php';
include '../../incl/conn.incl.php';

if (isset($_GET['delete'])) {
    $id = (int) $_GET['id'];
    mysql_query("DELETE FROM `settings_rates` WHERE `id` = '$id' ");
    echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> ";
}
?>
<a class="btn btn-large btn-primary" href="new.php"><i class="icon-plus icon-white"></i>Add Rates</a><br/><br/>
<table border=1 class='table table-hover table-striped table-condensed table-bordered'>

    <thead class="" >
    <th>#</th>
    <th>From</th>
    <th>To</th>
    <th>Rate</th>
    <?php if ($current_user['role'] != 'Clerk') { ?><th style="text-align: center">Tasks</th> <?php } ?>
</thead>
<tbody>
    <?php
    $result = mysql_query("SELECT * FROM `settings_rates`") or trigger_error(mysql_error());
    $i = 0;
    while ($row = mysql_fetch_array($result)) {
        foreach ($row AS $key => $value) {
            $row[$key] = stripslashes($value);
        }
        echo "<tr>";
        echo "<td valign='top'>" . ($i + 1) . "</td>";
        echo "<td valign='top'>" . nl2br($row['from']) . "</td>";
        echo "<td valign='top'>" . nl2br($row['to']) . "</td>";
        echo "<td valign='top'>" . nl2br($row['rate']) . "</td>";
        if ($current_user['role'] == 'Manager') {
            echo '<td  style="text-align: center">
                <a href=edit.php?edit=1&id=' . $row['id'] . ' class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Edit</a> | 
                <a href=?delete=1&id=' . $row['id'] . ' class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a> 
             </td>';
        }

//        echo "<td valign='top'><a href=edit.php?id={$row['id']}>Edit</a></td><td>
//            <a href=delete.php?id={$row['id']} .'" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a> 
//                </td> ";
        echo "</tr>";
    }
    ?>
</tbody>
</table>
<?php include '../../incl/footer.incl.php'; ?>
