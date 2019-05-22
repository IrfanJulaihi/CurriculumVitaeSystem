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
$colname_Recordset1 = "-1";
if (isset($_GET['Identification Number'])) {
  $colname_Recordset1 = $_GET['Identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$s=$_GET['value1'];
$query_RecordsetSkills = sprintf("SELECT * FROM Skills WHERE `Identification Number` = '$s'", GetSQLValueString($colname_Recordset1, "text"));
$Recordsetskills = mysql_query($query_RecordsetSkills, $Con1) or die(mysql_error());
$row_RecordsetSkills = mysql_fetch_assoc($Recordsetskills);
$totalRows_Recordset1 = mysql_num_rows($Recordsetskills);


$colname_Recordset1 = "-1";
if (isset($_GET['Identification Number'])) {
  $colname_Recordset1 = $_GET['Identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$s=$_GET['value1'];
$query_Recordset1 = sprintf("SELECT * FROM `self-information` WHERE `Identification Number` = '$s'", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $Con1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['Identification Number'])) {
  $colname_Recordset2 = $_GET['Identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$query_Recordset2 = "SELECT * FROM qualification WHERE `Identification Number` = '$s'";
$Recordset2 = mysql_query($query_Recordset2, $Con1) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_GET['Identfication Number'])) {
  $colname_Recordset3 = $_GET['Identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$query_Recordset3 = sprintf("SELECT * FROM extracurricular WHERE `Identification Number` = '$s'", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysql_query($query_Recordset3, $Con1) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

$colname_Experience = "-1";
if (isset($_GET['Identification Number'])) {
  $colname_Experience = $_GET['Identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$query_Experience = sprintf("SELECT * FROM experience WHERE `Identification Number` = '$s'", GetSQLValueString($colname_Experience, "text"));
$Experience = mysql_query($query_Experience, $Con1) or die(mysql_error());
$row_Experience = mysql_fetch_assoc($Experience);
$totalRows_Experience = mysql_num_rows($Experience);

$colname_CntctInfo = "-1";
if (isset($_GET['Identification Number'])) {
  $colname_CntctInfo = $_GET['Identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$query_CntctInfo = sprintf("SELECT * FROM `contact-info` WHERE `Identification Number` = '$s'", GetSQLValueString($colname_CntctInfo, "text"));
$CntctInfo = mysql_query($query_CntctInfo, $Con1) or die(mysql_error());
$row_CntctInfo = mysql_fetch_assoc($CntctInfo);
$totalRows_CntctInfo = mysql_num_rows($CntctInfo);

$colname_RecordsetCert = "-1";
if (isset($_GET['identificationNumber'])) {
  $colname_RecordsetCert = $_GET['identificationNumber'];
}
mysql_select_db($database_Con1, $Con1);
$query_RecordsetCert = sprintf("SELECT * FROM certification WHERE identificationNumber = '$s'", GetSQLValueString($colname_RecordsetCert, "text"));
$RecordsetCert = mysql_query($query_RecordsetCert, $Con1) or die(mysql_error());
$row_RecordsetCert = mysql_fetch_assoc($RecordsetCert);
$totalRows_RecordsetCert = mysql_num_rows($RecordsetCert);

$colname_RecordsetAchievement = "-1";
if (isset($_GET['IdentificationNmber'])) {
  $colname_RecordsetAchievement = $_GET['IdentificationNmber'];
}
mysql_select_db($database_Con1, $Con1);
$query_RecordsetAchievement = sprintf("SELECT * FROM achievement WHERE IdentificationNmber = '$s'", GetSQLValueString($colname_RecordsetAchievement, "text"));
$RecordsetAchievement = mysql_query($query_RecordsetAchievement, $Con1) or die(mysql_error());
$row_RecordsetAchievement = mysql_fetch_assoc($RecordsetAchievement);
$totalRows_RecordsetAchievement = mysql_num_rows($RecordsetAchievement);

$colname_RecordsetRefer = "-1";
if (isset($_GET['Identification Number'])) {
  $colname_RecordsetRefer = $_GET['Identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$query_RecordsetRefer = sprintf("SELECT * FROM reference WHERE `Identification Number` = '$s'", GetSQLValueString($colname_RecordsetRefer, "text"));
$RecordsetRefer = mysql_query($query_RecordsetRefer, $Con1) or die(mysql_error());
$row_RecordsetRefer = mysql_fetch_assoc($RecordsetRefer);
$totalRows_RecordsetRefer = mysql_num_rows($RecordsetRefer);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Detail Info</title>
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
<div align="center">
  <p></p>
  <p>&nbsp;</p>
  <p style="font-size:50px"><?php echo $row_Recordset1['First Name']; ?> </p>
  <p style="font-size:35px">(<?php echo $row_Recordset2['Identification Number']; ?>)</p>
  <table id="customers" width="200" border="1">
   <tr >
   
   <td  style="background-color:#0F3;font-size:18px;font-weight:bold;" colspan="2">Skills</td></tr>
       <tr>
      <td>Language</td>
      <td><?php echo $row_RecordsetSkills['LanguageFluent']; ?></td>
    </tr>
    <tr>
      <td>Programming Language</td>
      <td><?php echo $row_RecordsetSkills['ITSkills']; ?></td>
    </tr>
    <tr>
      <td>IT Skills</td>
      <td><?php echo $row_RecordsetSkills['OtherSkillsIT']; ?></td>
    </tr>
    <tr>
      <td>Other Skills</td>
      <td><?php echo $row_RecordsetSkills['OtherSkills']; ?></td>
    </tr>
   <tr >
   
   <td  style="background-color:#0F3;font-size:18px;font-weight:bold;" colspan="2">Experience</td></tr>
       <tr>
      <td>Internship</td>
      <td><?php echo $row_Experience['Internship']; ?></td>
    </tr>
    <tr>
      <td>Duration</td>
      <td><?php echo $row_Experience['Duration Intern']; ?></td>
    </tr>
    <tr>
      <td>Previous Job</td>
      <td><?php echo $row_Experience['Previous Job']; ?></td>
    </tr>
    <tr>
      <td>Duration</td>
      <td><?php echo $row_Experience['Duration PrevJob']; ?></td>
    </tr>
    <tr>
      <td>Current Job</td>
      <td><?php echo $row_Experience['Current Position']; ?></td>
    </tr>
    <tr>
      <td>Project Experienc</td>
      <td><?php echo $row_Experience['Project Involved']; ?></td>
    </tr>
    <tr>
      <td>Area of Expertise</td>
      <td><?php echo $row_Experience['Area of Expertise']; ?></td>
    </tr>
    <tr>
      <td>Year of Expertise:</td>
      <td><?php echo $row_Experience['Year of Expertise']; ?></td>
    </tr>
    
          <td style="background-color:#0F3;font-size:18px;font-weight:bold;" colspan="2" >Personal Info</td>
    </tr>
    <tr>
      <td>Date Of Birth</td>
      <td><?php echo $row_Recordset1['DateOfBirth']; ?></td>
    </tr>
    <tr>
      <td>Age</td>
      <td><?php echo $row_Recordset1['Age']; ?></td>
    </tr>
    <tr>
      <td>Marital Status</td>
      <td><?php echo $row_Recordset1['Marital Status']; ?>
      </td>
    </tr>
    
    <tr>
      <td>Education Level</td>
      <td><?php echo $row_Recordset2['Education Level']; ?></td>
    </tr>
    <tr>
      <td>Program</td>
      <td><?php echo $row_Recordset2['Program']; ?></td>
    </tr>
    <tr>
      <td>Universtiy</td>
      <td><?php echo $row_Recordset2['University']; ?></td>
    </tr>
    <tr>
      <td>CGPA</td>
      <td><?php echo $row_Recordset2['CGPA']; ?></td>
    </tr>
    <tr>
      <td  style="background-color:#0F3;font-size:18px;font-weight:bold;" colspan="2" >CONTACT INFO</td>
    </tr>
    <tr>
      <td>Mobile No</td>
      <td>0<?php echo $row_CntctInfo['Mobile No']; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $row_CntctInfo['Email']; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $row_CntctInfo['Address']; ?></td>
    </tr>
  
   
   
   
    <tr>
      <td style="background-color:#0F3;font-size:18px;font-weight:bold;"colspan="2">Reference Person</td>
    </tr>
    <tr>
      <td>Name:</td>
      <td><?php echo $row_RecordsetRefer['NameOfReferencePerson']; ?></td>
    </tr>
    <tr>
      <td>Organization</td>
      <td><?php echo $row_RecordsetRefer['Organization']; ?></td>
    </tr>
    <tr>
      <td>Contact No</td>
      <td><?php echo $row_RecordsetRefer['ContactNo']; ?></td>
    </tr>
    <tr>
      <td><a href="DeleteRecord.php?value1=
	<?php echo $row_Recordset1['Identification Number']; ?>">DELETE</td>
      <td><a href="Updateinfo.php?value1=
	<?php echo $row_Recordset1['Identification Number']; ?>">UPDATE</td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($Experience);

mysql_free_result($CntctInfo);

mysql_free_result($RecordsetCert);

mysql_free_result($RecordsetAchievement);

mysql_free_result($RecordsetRefer);
?>
