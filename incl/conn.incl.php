<?php
define('db_host', 'localhost');
define('db_user', 'root');
define('db_password', '');
define('db_database', 'dairy');
$conn= mysqli_connect(db_host, db_user, db_password, db_database);
mysqli_select_db($conn, db_database);

