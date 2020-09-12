<?php

$db_host = "localhost";
$db_user = "root";
$db_name = "bl";
$db_pass = "";
$connect = mysql_connect($db_host,$db_user,$db_pass);
$cekdb = mysql_select_db($connect,$db_name);

?>