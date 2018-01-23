<?php
include_once __DIR__.'/config.incl.php';
$conn= mysqli_connect(db_host, db_user, db_password, db_database);
mysqli_select_db($conn, db_database);

