<?php require_once('Connections/Con1.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$s=$_GET['value1'];
$editFormAction = $_SERVER['PHP_SELF'];

//Self-Information

  $deleteSQL = "DELETE FROM `self-information` WHERE `Identification Number`='$s'";
                       
  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($deleteSQL, $Con1) or die(mysql_error());


//reference

  $deleteSQL2 = "DELETE FROM reference WHERE `Identification Number`='$s'";
                       

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($deleteSQL2, $Con1) or die(mysql_error());


//qualification

  $deleteSQL3 = "DELETE FROM qualification WHERE `Identification Number`='$s'";
                      

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($deleteSQL3, $Con1) or die(mysql_error());


//extracurricular

  $deleteSQL4 = "DELETE FROM extracurricular WHERE `Identification Number`='$s'";
                     ;

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($deleteSQL4, $Con1) or die(mysql_error());


//Experience

  $deleteSQL5 = "DELETE FROM experience WHERE `Identification Number`='$s'";

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($deleteSQL5, $Con1) or die(mysql_error());

 
//contact-info

  $deleteSQL6 = "DELETE FROM `contact-info` WHERE `Identification Number`='$s'";

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($deleteSQL6, $Con1) or die(mysql_error());

 
//characteristics

  
//certification

  $deleteSQL8 = "DELETE FROM certification WHERE identificationNumber='$s'";

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($deleteSQL8, $Con1) or die(mysql_error());


//achievement

  $deleteSQL9 = "DELETE FROM achievement WHERE IdentificationNmber='$s'";

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($deleteSQL9, $Con1) or die(mysql_error());

  $deleteGoTo = "index.php";

  header(sprintf("Location: %s", $deleteGoTo));



?>
