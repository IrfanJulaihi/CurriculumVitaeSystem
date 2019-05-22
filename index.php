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

mysql_select_db($database_Con1, $Con1);
$query_Recordset1 = "SELECT * FROM `self-information` 
INNER JOIN qualification 
ON `self-information`.`Identification Number`=qualification.`Identification Number` 
INNER JOIN Skills
ON skills.`Identification Number`=qualification.`Identification Number` 
INNER JOIN Experience
ON experience.`Identification Number`=qualification.`Identification Number`ORDER BY qualification.CGPA DESC";
$Recordset1 = mysql_query($query_Recordset1, $Con1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);



mysql_select_db($database_con2, $con2);
$query_EduRecordset = "SELECT * FROM qualification";
$EduRecordset = mysql_query($query_EduRecordset, $con2) or die(mysql_error());
$row_EduRecordset = mysql_fetch_assoc($EduRecordset);
$totalRows_EduRecordset = mysql_num_rows($EduRecordset);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Curriculum Vitae System</title>
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
<h1 align="center">Curriculum Vitae System</h1>
<p align="center">&nbsp;</p>
<form id="form1" name="form1" method="POST" action="SearchICNO.php">
  Search:
  <label for="search"></label>

  
  <select onChange="this.form.action=this.options[this.selectedIndex].value;"name="search" id="search">
    <option value="SearchICNO.php">IC NO</option>
    <option value="SearchFirstName.php">Name</option>
    <option value="SearchUniversity.php">University</option>
    <option value="SearchEducationLevel.php">Education Level</option>
    <option value="SearchCGPA.php">CGPA</option>
    <option value="SearchAreaOfExpertise.php">Specialization</option>
  </select>
  <label for="search2"></label>
  
  <input type="text" name="Identification_Number" id="Identification_Number" />
  <input type="submit" name="submit" id="SearchButton" value="Submit" />
</form>

<table id="customers" width="200" border="1" align="center">
  <tr>
    <th>No</th>
    <th>Identification Number</th>
    <th>Name</th>
   
    <th>Age</th>
    <th>Education Level</th>
    <th>CGPA</th>
    <th>SKILL</th>
    <th>Experience</th>
    <th>Specialization</th>
    <th>Program</th>
  </tr>
  <?php $count=1; ?>
   <?php  do{
  ?>
   <tr>
  
    <td><?php echo $count++; ?></td>
    <td><a href="Detailinfo.php?value1=
	<?php echo $row_Recordset1['Identification Number']; ?>"><?php echo $row_Recordset1['Identification Number']; ?></a>
   </td>
    <td><?php echo $row_Recordset1['First Name']; ?></td>
   
    <td><?php echo $row_Recordset1['Age']; ?></td>
    <td><?php echo $row_Recordset1['Education Level']; ?></td>
    <td><?php echo $row_Recordset1['CGPA']; ?></td>
    <td><?php echo $row_Recordset1['ITSkills']; ?></td>
    <td><?php echo $row_Recordset1['Project Involved']; ?></td>
    <td><?php echo $row_Recordset1['Area of Expertise']; ?></td>
    <td><?php echo $row_Recordset1['Program']; ?></td>
  <?php 
  }while($row_Recordset1 = mysql_fetch_assoc($Recordset1));?>
  </tr>
 
  
</table>
<p>&nbsp;</p>
<p><a href="AddInfo.php">ADD RECORD</a></p><p>&nbsp;</p>

</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($EduRecordset);
?>
