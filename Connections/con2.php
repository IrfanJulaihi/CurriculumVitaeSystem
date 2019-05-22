<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_con2 = "localhost";
$database_con2 = "curriculum vitae";
$username_con2 = "root";
$password_con2 = "";
$con2 = mysql_pconnect($hostname_con2, $username_con2, $password_con2) or trigger_error(mysql_error(),E_USER_ERROR); 
?>