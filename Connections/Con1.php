<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Con1 = "localhost";
$database_Con1 = "curriculum vitae";
$username_Con1 = "root";
$password_Con1 = "";
$Con1 = mysql_pconnect($hostname_Con1, $username_Con1, $password_Con1) or trigger_error(mysql_error(),E_USER_ERROR); 
?>