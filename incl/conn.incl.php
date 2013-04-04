<?php
define('db_host', 'localhost');
define('db_user', 'root');
define('db_password', '');
define('db_database', 'dairy');
$conn= mysql_connect(db_host, db_user, db_password, db_database);
mysql_select_db(db_database);

