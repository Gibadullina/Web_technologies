<?php
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB_NAME", "news");
$db_connect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME); 
//mysql_selectdb(DB_NAME,$db_connect);
//mysqli_set_charset('utf8');
?>