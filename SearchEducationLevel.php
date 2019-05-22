<?php require_once('Connections/Con1.php'); ?>
<?php require_once('Connections/con2.php'); ?>
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
//This is to display the candidate informations


if (isset($_POST['Identification_Number'])) {
 $colname_Recordset1 = $_POST['Identification_Number'];
}

mysql_select_db($database_Con1, $Con1);
$query_Recordset1 = "SELECT * FROM qualification WHERE `CGPA` = '$colname_Recordset1'";


$Recordset1 = mysql_query($query_Recordset1, $Con1) or die(mysql_error());

$row_Recordset1 = mysql_fetch_assoc($Recordset1);
//Search CGPA for candidates

$IcForCgpa=$row_Recordset1['Identification Number'];//IC Number



//Power of the code
$ChooseName2="SELECT * FROM `self-information` 
INNER JOIN qualification
ON `self-information`.`Identification Number`=qualification.`Identification Number`

where `Education Level` LIKE '$colname_Recordset1%'";



$Recordset3 = mysql_query($ChooseName2, $Con1) or die(mysql_error());
$row_Recordset3=mysql_fetch_assoc($Recordset3);

$totalRows_Recordset1 = mysql_num_rows($Recordset1);



$colname_Recordset2 = "-1";


if (isset($_POST['Identification_Number'])) {
 $colname_Recordset2 = $_POST['Identification_Number'];
}


mysql_select_db($database_con2, $con2);
$query_Recordset2 = sprintf("SELECT * FROM qualification WHERE `Education Level` = '$colname_Recordset2'", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysql_query($query_Recordset2, $con2) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}


#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
<body>
<a href="index.php"><img border="0" alt="Home" src="web-page-home_318-85928.jpg" width="100" height="100"></a>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


<table id="customers" width="200" border="1" align="center">
  <tr style="background-color:#0F3;font-size:18px;font-weight:bold;" colspan="2">
    <td>No</td>
    <td>IC NO</td>
    <td>Name</td>
    <td>Age</td>
    <td>Education Level</td>
    <td>CGPA</td>
    <td>University</td>
    <td>Marital Status</td>
  </tr>
  <?php $count=1; ?>
   <?php  do{
  ?>
   <tr>
     <td><?php echo $count++; ?></td>
  
    <td><a href="Detailinfo.php?value1=
	<?php echo $row_Recordset3['Identification Number']; ?>"><?php echo $row_Recordset3['Identification Number']; ?></td>
    <td><?php echo $row_Recordset3['First Name']; ?></td>
    <td><?php echo $row_Recordset3['Age']; ?></td>
    <td><?php echo $row_Recordset3['Education Level']; ?></td>
    <td><?php echo $row_Recordset3['CGPA']; ?></td>
    <td><?php echo $row_Recordset3['University']; ?></td>
    <td><?php echo $row_Recordset3['Marital Status']; ?></td>
  <?php 
  }while($row_Recordset3=mysql_fetch_assoc($Recordset3));?>
  <tr>
    <td>    
  </tr>
 
  
</table>

</body>
</html>