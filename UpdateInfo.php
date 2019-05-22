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
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
//1.update Self Information
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "UpdateRecord")) {
  $updateSQL = sprintf("UPDATE `self-information` SET `First Name`=%s, `Last Name`=%s, DateOfBirth=%s, Age=%s, `Marital Status`=%s, `Blood Type`=%s WHERE `Identification Number`='$s'",
                       GetSQLValueString($_POST['FirstName'], "text"),
                       GetSQLValueString($_POST['LastName'], "text"),
                       GetSQLValueString($_POST['DateOfBirth'], "date"),
                       GetSQLValueString($_POST['Age'], "int"),
                       GetSQLValueString($_POST['MaritalStatus'], "text"),
                       GetSQLValueString($_POST['BloodType'], "text"));

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($updateSQL, $Con1) or die(mysql_error());

  $updateGoTo = "DetailInfo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
//2.Update Education
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "UpdateRecord")) {
  $updateSQL = sprintf("UPDATE qualification SET `Education Level`=%s, Program=%s, University=%s, CGPA=%s WHERE `Identification Number`='$s'",
                       GetSQLValueString($_POST['EducationLevel'], "text"),
                       GetSQLValueString($_POST['Program'], "text"),
                       GetSQLValueString($_POST['University'], "text"),
                       GetSQLValueString($_POST['CGPA'], "text"));

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($updateSQL, $Con1) or die(mysql_error());

  $updateGoTo = "DetailInfo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
//3.update extracurricular

//4.Update Projects
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "UpdateRecord")) {
  $updateSQL = sprintf("UPDATE experience SET Internship=%s, `Duration Intern`=%s, `Previous Job`=%s, `Duration PrevJob`=%s, `Current Position`=%s, `Project Involved`=%s, `Area of Expertise`=%s, `Year of Expertise`=%s WHERE `Identification Number`='$s'",
                       GetSQLValueString($_POST['Internship'], "text"),
                       GetSQLValueString($_POST['Duration'], "text"),
                       GetSQLValueString($_POST['PreviousJob'], "text"),
                       GetSQLValueString($_POST['PreviousJob'], "text"),
                       GetSQLValueString($_POST['CurrentJob'], "text"),
                       GetSQLValueString($_POST['ProjectExperience'], "text"),
                       GetSQLValueString($_POST['AreaOfExpertise'], "text"),
                       GetSQLValueString($_POST['YearOfExpertise'], "text"));

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($updateSQL, $Con1) or die(mysql_error());

  $updateGoTo = "DetailInfo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
//5.Update certification

//6.Achievement
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "UpdateRecord")) {
  $updateSQL = sprintf("UPDATE achievement SET TypeOfAccomplishments=%s, TypeOfReward=%s WHERE IdentificationNmber='$s'",
                       GetSQLValueString($_POST['TypeOfAccomplish'], "text"),
                       GetSQLValueString($_POST['TypeOfRewards'], "text"));

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($updateSQL, $Con1) or die(mysql_error());

  $updateGoTo = "DetailInfo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
//7.Contact
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "UpdateRecord")) {
  $updateSQL = sprintf("UPDATE `contact-info` SET `Mobile No`=%s, Email=%s, Address=%s WHERE `Identification Number`='$s'",
                       GetSQLValueString($_POST['MobileNo'], "int"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Address'], "text"));

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($updateSQL, $Con1) or die(mysql_error());

  $updateGoTo = "DetailInfo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

//.Update reference

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "UpdateRecord")) {
	
  $updateSQL = sprintf("UPDATE reference SET NameOfReferencePerson=%s, Organization=%s, ContactNo=%s WHERE `Identification Number`='$s';",
                       GetSQLValueString($_POST['ReferPerson'], "text"),
                       GetSQLValueString($_POST['ReferOrganize'], "text"),
                       GetSQLValueString($_POST['ReferContact'], "text"));
                      

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($updateSQL, $Con1) or die(mysql_error());

  $updateGoTo = "DetailInfo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
//Update Skills
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "UpdateRecord")) {
	
  $updateSQL = sprintf("UPDATE Skills SET 	ITSkills=%s, LanguageFluent=%s, OtherSkillsIT=%s,OtherSkills=%s WHERE `Identification Number`='$s';",
                       GetSQLValueString($_POST['Programming'], "text"),
                       GetSQLValueString($_POST['Language'], "text"),
                       GetSQLValueString($_POST['ITSkills'], "text"),
					   GetSQLValueString($_POST['OtherSkills'], "text"));
                      

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($updateSQL, $Con1) or die(mysql_error());

  $updateGoTo = "DetailInfo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
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

$colname_RecordsetReference = "-1";
if (isset($_GET['Identification Number'])) {
  $colname_RecordsetReference = $_GET['Identification Number'];
}

$colname_RecordsetReference = "-1";

mysql_select_db($database_Con1, $Con1);
$query_RecordsetReference = "SELECT * FROM reference WHERE `Identification Number` = '$s'";
$RecordsetReference = mysql_query($query_RecordsetReference, $Con1) or die(mysql_error());
$row_RecordsetReference = mysql_fetch_assoc($RecordsetReference);
$totalRows_RecordsetReference = mysql_num_rows($RecordsetReference);

$colname_RecordSelfInfo = "-1";
if (isset($_GET['Identification Number'])) {
  $colname_RecordSelfInfo = $_GET['Identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$query_RecordSelfInfo = sprintf("SELECT * FROM `self-information` WHERE `Identification Number` = '$s'", GetSQLValueString($colname_RecordSelfInfo, "text"));
$RecordSelfInfo = mysql_query($query_RecordSelfInfo, $Con1) or die(mysql_error());
$row_RecordSelfInfo = mysql_fetch_assoc($RecordSelfInfo);
$totalRows_RecordSelfInfo = mysql_num_rows($RecordSelfInfo);

$colname_RecordsetEdu = "-1";
if (isset($_GET['Identification Number'])) {
  $colname_RecordsetEdu = $_GET['Identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$query_RecordsetEdu = sprintf("SELECT * FROM qualification WHERE `Identification Number` ='$s'", GetSQLValueString($colname_RecordsetEdu, "text"));
$RecordsetEdu = mysql_query($query_RecordsetEdu, $Con1) or die(mysql_error());
$row_RecordsetEdu = mysql_fetch_assoc($RecordsetEdu);
$totalRows_RecordsetEdu = mysql_num_rows($RecordsetEdu);

$colname_RecordsetExtraKo = "-1";
if (isset($_GET['Identification Number'])) {
  $colname_RecordsetExtraKo = $_GET['Identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$query_RecordsetExtraKo = sprintf("SELECT * FROM extracurricular WHERE `Identification Number` = '$s'", GetSQLValueString($colname_RecordsetExtraKo, "text"));
$RecordsetExtraKo = mysql_query($query_RecordsetExtraKo, $Con1) or die(mysql_error());
$row_RecordsetExtraKo = mysql_fetch_assoc($RecordsetExtraKo);
$totalRows_RecordsetExtraKo = mysql_num_rows($RecordsetExtraKo);

$colname_RecordsetExperience = "-1";
if (isset($_GET['Identification Number'])) {
  $colname_RecordsetExperience = $_GET['Identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$query_RecordsetExperience = sprintf("SELECT * FROM experience WHERE `Identification Number` = '$s'", GetSQLValueString($colname_RecordsetExperience, "text"));
$RecordsetExperience = mysql_query($query_RecordsetExperience, $Con1) or die(mysql_error());
$row_RecordsetExperience = mysql_fetch_assoc($RecordsetExperience);
$totalRows_RecordsetExperience = mysql_num_rows($RecordsetExperience);
$colname_RecordsetExperience = "-1";

//Recordsercontactinfo
$colname_RecordsetContactInfo = "-1";
if (isset($_GET['Identification Number'])) {
  $colname_RecordsetExperience = $_GET['Identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$query_RecordsetContactInfo = sprintf("SELECT * FROM achievement WHERE `IdentificationNmber` = '$s'", GetSQLValueString($colname_RecordsetContactInfo, "text"));
$RecordsetContactInfo = mysql_query($query_RecordsetContactInfo, $Con1) or die(mysql_error());
$row_RecordsetContactInfo = mysql_fetch_assoc($RecordsetContactInfo);
$totalRows_RecordsetContactInfo = mysql_num_rows($RecordsetContactInfo);

$colname_RecordsetCnctInfo = "-1";
if (isset($_GET['Identification Number'])) {
  $colname_RecordsetCnctInfo = $_GET['Identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$query_RecordsetCnctInfo = sprintf("SELECT * FROM `contact-info` WHERE `Identification Number` = '$s'", GetSQLValueString($colname_RecordsetCnctInfo, "text"));
$RecordsetCnctInfo = mysql_query($query_RecordsetCnctInfo, $Con1) or die(mysql_error());
$row_RecordsetCnctInfo = mysql_fetch_assoc($RecordsetCnctInfo);
$totalRows_RecordsetCnctInfo = mysql_num_rows($RecordsetCnctInfo);

$colname_RecordsetCertification = "-1";
if (isset($_GET['identification Number'])) {
  $colname_RecordsetCertification = $_GET['identification Number'];
}
mysql_select_db($database_Con1, $Con1);
$query_RecordsetCertification = sprintf("SELECT * FROM certification WHERE identificationNumber = '$s'", GetSQLValueString($colname_RecordsetCertification, "text"));
$RecordsetCertification = mysql_query($query_RecordsetCertification, $Con1) or die(mysql_error());
$row_RecordsetCertification = mysql_fetch_assoc($RecordsetCertification);
$totalRows_RecordsetCertification = mysql_num_rows($RecordsetCertification);

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Info</title>
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
<script>
function Confirm(form){
	alert("update Successful");
	form.submit();
}
</script>
<form method="POST" action="<?php echo $editFormAction; ?>" name="UpdateRecord" id="updateRecord" action="UpdateRecord">
<table id="customers" width="200" border="1" align="center">
   <tr >
   
   <td  style="background-color:#0F3;font-size:18px;font-weight:bold;" colspan="2">Skills</td></tr>
       <tr>
      <td>Language Fluency</td>
      <td><input type="text" name="Language" value="<?php echo  $row_RecordsetSkills['LanguageFluent']; ?>" size="150"></td>
    </tr>
    <tr>
      <td>Programming Language</td>
      <td><input type="text" name="Programming" value="<?php echo $row_RecordsetSkills['ITSkills']; ?>" size="150"></td>
    </tr>
    <tr>
      <td>IT Skills</td>
      <td><input type="text" name="ITSkills" value="<?php echo $row_RecordsetSkills['OtherSkillsIT']; ?>" size="150"></td>
    </tr> 
     <tr>
      <td>Other Skills</td>
      <td><input type="text" name="OtherSkills" value="<?php echo $row_RecordsetSkills['OtherSkills']; ?>" size="150"></td>
    </tr> 
    <tr >
   
   <td  style="background-color:#0F3;font-size:18px;font-weight:bold;" colspan="2">Experience</td></tr>
    <tr>
     <tr>
      <td>Internship</td>
      <td><input type="text" name="Internship" value="<?php echo $row_RecordsetExperience['Internship']; ?>" size="150"></td>
    </tr>
    <tr>
      <td>Duration</td>
      <td><input type="text" name="Duration" value="<?php echo $row_RecordsetExperience['Duration Intern']; ?>"></td>
    </tr>
    <tr>
      <td>Previous Job</td>
      <td><input type="text" name="PreviousJob" value="<?php echo $row_RecordsetExperience['Previous Job']; ?>"></td>
    </tr>
    <tr>
      <td>Duration</td>
      <td><input type="text" name="Duration" value="<?php echo $row_RecordsetExperience['Duration PrevJob']; ?>"></td>
    </tr>
    <tr>
      <td>Current Job</td>
      <td><input type="text" name="CurrentJob" value="<?php echo $row_RecordsetExperience['Current Position']; ?>"></td>
    </tr>
    <tr>
      <td> Experience in Work</td>
      <td><input type="text" name="ProjectExperience" value="<?php echo $row_RecordsetExperience['Project Involved']; ?>" size="150"></td>
    </tr>
    <tr>
      <td>Specialization</td>
      <td><input type="text" name="AreaOfExpertise" value="<?php echo $row_RecordsetExperience['Area of Expertise']; ?>"></td>
    </tr>
    <tr>
      <td>Year of Expertise:</td>
      <td><input type="text" name="YearOfExpertise" value="<?php echo $row_RecordsetExperience['Year of Expertise']; ?>"></td>
    </tr>
    
   
    <tr>
      <td style="background-color:#0F3;font-size:18px;font-weight:bold;" colspan="2" >PERSONAL INFO</td>
    </tr>
    <tr>
      <td>First Name </td>
      <td><input type="text" name="FirstName" value="<?php echo $row_RecordSelfInfo['First Name']; ?>"></td>
    </tr>
    
    <tr>
      <td>Identification Number</td>
      <td><?php echo $row_RecordSelfInfo['Identification Number']; ?></td>
    </tr>
    <tr>
      <td>Date Of Birth</td>
      <td><input type="text" name="DateOfBirth" value="<?php echo $row_RecordSelfInfo['DateOfBirth']; ?>"></td>
    </tr>
    <tr>
      <td>Age</td>
      <td><input type="text" name="Age" value="<?php echo $row_RecordSelfInfo['Age']; ?>"></td>
    </tr>
    <tr>
      <td>Marital Status</td>
      <td><input type="text" name="MaritalStatus" value="<?php echo $row_RecordSelfInfo['Marital Status']; ?>">
      </td>
    </tr>
    <tr>
      <td>CGPA</td>
      <td><input type="text" name="CGPA" value="<?php echo $row_RecordsetEdu['CGPA']; ?>"></td>
    </tr>
    <tr>
      <td>Education Level</td>
      <td><input type="text" name="EducationLevel" value="<?php echo $row_RecordsetEdu['Education Level']; ?>"></td>
    </tr>
    <tr>
      <td>Program</td>
      <td><input type="text" name="Program" value="<?php echo $row_RecordsetEdu['Program']; ?>"></td>
    </tr>
    <tr>
      <td>University</td>
      <td><input type="text" name="University" value="<?php echo $row_RecordsetEdu['University']; ?>"></td>
    </tr>
   
    <tr>
      <td style="background-color:#0F3;font-size:18px;font-weight:bold;" colspan="2" >CONTACT INFO</td>
    </tr>
    <tr>
      <td>Mobile No</td>
      <td><input type="text" name="MobileNo" value="0<?php echo $row_RecordsetCnctInfo['Mobile No']; ?>"></td>
    </tr>
    <tr>
      
      
      <td> Email </td>
      <td><input type="email" name="Email" value="<?php echo $row_RecordsetCnctInfo['Email']; ?>"></td>
    
    
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="Address" value="<?php echo $row_RecordsetCnctInfo['Address']; ?>" size="250"></td>
    </tr>
   
  
    <tr>
      <td style="background-color:#0F3;font-size:18px;font-weight:bold;"colspan="2">Reference Person</td>
    </tr>
    <tr>
      <td>Name:</td>
      <td><input type="text" name="ReferPerson" value="<?php echo $row_RecordsetReference['NameOfReferencePerson']; ?>"></td>
    </tr>
    <tr>
      <td>Organization</td>
      <td><input type="text" name="ReferOrganize" value="<?php echo    $row_RecordsetReference['Organization']; ?>"> 
	  </td>
    </tr>
    <tr>
      <td>Contact No</td>

      <td><input type="text" name="ReferContact" value="<?php echo    $row_RecordsetReference['ContactNo']; ?>"> </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="UpdateRecord" id="UpdateRecord" value="Submit" onClick="Confirm(this.form)"/></td>
    </tr>
  </table>
<input type="hidden" name="MM_update" value="UpdateRecord" />
  </form>
</body>
</html>
<?php
mysql_free_result($RecordsetReference);

mysql_free_result($RecordSelfInfo);

mysql_free_result($RecordsetEdu);

mysql_free_result($RecordsetExtraKo);

mysql_free_result($RecordsetContactInfo);

mysql_free_result($RecordsetCnctInfo);

mysql_free_result($RecordsetCertification);

mysql_free_result($RecordsetExperience);
?>
