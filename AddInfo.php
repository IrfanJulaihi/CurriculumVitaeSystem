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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
//Self-information
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "AddRecord")) {
  $insertSQL = sprintf("INSERT INTO `self-information` (`Identification Number`, `First Name`, `Last Name`, DateOfBirth, Age, `Marital Status`, `Blood Type`) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['IdentificationNumber'], "text"),
                       GetSQLValueString($_POST['FirstName'], "text"),
                       GetSQLValueString("Not Applicable","text"),
                       GetSQLValueString($_POST['DateOfBirth'], "date"),
                       GetSQLValueString($_POST['Age'], "int"),
                       GetSQLValueString($_POST['MaritalStatus'], "text"),
                       GetSQLValueString($_POST['BloodType'], "text"));

  mysql_select_db($database_Con1, $Con1);
  $Result1 = mysql_query($insertSQL, $Con1) or die(mysql_error());



//Reference Person

  $insertSQL2 = sprintf("INSERT INTO reference (NameOfReferencePerson, Organization, ContactNo, `Identification Number`) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['ReferPerson'], "text"),
                       GetSQLValueString($_POST['ReferOrganize'], "text"),
                       GetSQLValueString($_POST['ReferContact'], "text"),
                       GetSQLValueString($_POST['IdentificationNumber'], "text"));

  mysql_select_db($database_Con1, $Con1);
  $Result2 = mysql_query($insertSQL2 , $Con1) or die(mysql_error());



//qualification

  $insertSQL3 = sprintf("INSERT INTO qualification (`Education Level`, Program, University, CGPA, `Identification Number`) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['EduLevel'], "text"),
                       GetSQLValueString($_POST['Program'], "text"),
                       GetSQLValueString($_POST['University'], "text"),
                       GetSQLValueString($_POST['CGPA'], "text"),
                       GetSQLValueString($_POST['IdentificationNumber'], "text"));

  mysql_select_db($database_Con1, $Con1);
  $Result3 = mysql_query($insertSQL3, $Con1) or die(mysql_error());


//Extracurricular

  

//Experience

  $insertSQL5 = sprintf("INSERT INTO experience (Internship, `Duration Intern`, `Previous Job`, `Duration PrevJob`, `Current Position`, `Project Involved`, `Area of Expertise`, `Year of Expertise`, `Identification Number`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Internship'], "text"),
                       GetSQLValueString($_POST['Duration'], "text"),
                       GetSQLValueString($_POST['PreviousJob'], "text"),
                       GetSQLValueString($_POST['PreviousJob'], "text"),
                       GetSQLValueString($_POST['CurrentJob'], "text"),
                       GetSQLValueString($_POST['ProjectExperience'], "text"),
                       GetSQLValueString($_POST['AreaOfExpertise'], "text"),
                       GetSQLValueString($_POST['YearOfExpertise'], "text"),
                       GetSQLValueString($_POST['IdentificationNumber'], "text"));

  
  
  
  
  mysql_select_db($database_Con1, $Con1);
  $Result5 = mysql_query($insertSQL5, $Con1) or die(mysql_error());


//Contact info

  $insertSQL6 = sprintf("INSERT INTO `contact-info` (`Mobile No`, Email, Address, `Identification Number`) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['MobileNo'], "int"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Address'], "text"),
                       GetSQLValueString($_POST['IdentificationNumber'], "text"));

  mysql_select_db($database_Con1, $Con1);
  $Result6 = mysql_query($insertSQL6, $Con1) or die(mysql_error());





  $insertSQL7 = sprintf("INSERT INTO certification (CertName, CertProducer, CertType, identificationNumber) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString("Not applicable", "text"),
                       GetSQLValueString("Not applicable", "text"),
                       GetSQLValueString("Not applicable", "text"),
                       GetSQLValueString($_POST['IdentificationNumber'], "text"));

  mysql_select_db($database_Con1, $Con1);
  $Result7 = mysql_query($insertSQL7, $Con1) or die(mysql_error());



//achievement

  $insertSQL8 = sprintf("INSERT INTO achievement (TypeOfAccomplishments, TypeOfReward, IdentificationNmber) VALUES (%s, %s, %s)",
                       GetSQLValueString("Not applicable", "text"),
                       GetSQLValueString("Not applicable", "text"),
                       GetSQLValueString($_POST['IdentificationNumber'], "text"));

  mysql_select_db($database_Con1, $Con1);
  $Result18 = mysql_query($insertSQL8, $Con1) or die(mysql_error());
  //skills                 ITSkills=%s, LanguageFluent=%s, OtherSkillsIT=%s,OtherSkills
  $insertSQL9 = sprintf("INSERT INTO Skills (ITSkills, LanguageFluent, OtherSkillsIT,OtherSkills,`Identification Number`) VALUES (%s, %s, %s,%s,%s)",
                       GetSQLValueString($_POST['Programming'], "text"),
                       GetSQLValueString($_POST['Language'], "text"),
					   GetSQLValueString($_POST['ITSkills'], "text"),
					   GetSQLValueString($_POST['OtherSkills'], "text"),
                       GetSQLValueString($_POST['IdentificationNumber'], "text"));

  mysql_select_db($database_Con1, $Con1);
  $Result19 = mysql_query($insertSQL9, $Con1) or die(mysql_error());
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add record</title>
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
<h1 align="center">ADD RECORDS</h1>
<script>
function Confirm(form){
	alert("update Successful");
	form.submit();
}
</script>
<form method="POST" action="<?php echo $editFormAction; ?><?php echo $editFormAction; ?>" name="AddRecord" >
<table id="customers" width="200" border="1" align="center">
    
    <tr >
   
   <td  style="background-color:#0F3;font-size:18px;font-weight:bold;" colspan="2">Personal Info</td></tr>
    <tr>
    <tr>
      <td>Name </td>
      <td><input type="text" name="FirstName" value="" size="100"></td>
    </tr>
    
    <tr>
      <td>Identification Number</td>
      <td><input type="text" name="IdentificationNumber" value=""></td>
    </tr>
    <tr>
      <td>Date Of Birth</td>
      <td><input type="date" name="DateOfBirth" value=""></td>
    </tr>
    <tr>
      <td>Age</td>
      <td><input type="text" name="Age" value=""></td>
    </tr>
    <tr>
      <td>Marital Status</td>
      <td><input type="text" name="MaritalStatus" value="">
      </td>
    </tr>
    <tr>
      <td>Blood Type</td>
      <td><input type="text" name="BloodType" value=""></td>
    </tr>
    <tr>
      <td>Education Level</td>
      <td><input type="text" name="EduLevel" value="" size="100"></td>
    </tr>
    <tr>
      <td>Program</td>
      <td><input type="text" name="Program" value="" size="100"></td>
    </tr>
    <tr>
      <td>University</td>
      <td><input type="text" name="University" value="" size="100"></td>
    </tr>
    <tr>
      <td>CGPA</td>
      <td><input type="text" name="CGPA" value=""></td>
    </tr>
     <tr >
   
   <td  style="background-color:#0F3;font-size:18px;font-weight:bold;" colspan="2">Skills</td></tr>
       <tr>
      <td>Language Fluency</td>
      <td><input type="text" name="Language" value="" size="150"></td>
    </tr>
    <tr>
      <td>Programming Language</td>
      <td><input type="text" name="Programming" value="" size="150"></td>
    </tr>
    <tr>
      <td>IT Skills</td>
      <td><input type="text" name="ITSkills" value="" size="150"></td>
    </tr> 
     <tr>
      <td>Other Skills</td>
      <td><input type="text" name="OtherSkills" value="" size="150"></td>
    </tr> 
    <tr>
      <td style="background-color:#0F3;font-size:18px;font-weight:bold;" colspan="2" >EXPERIENCE</td>
    </tr>
    <tr>
      <td>Internship</td>
      <td><input type="text" name="Internship" value="" size="100"></td>
    </tr>
    <tr>
      <td>Duration</td>
      <td><input type="text" name="Duration" value=""></td>
    </tr>
    <tr>
      <td>Previous Job</td>
      <td><input type="text" name="PreviousJob" value=""></td>
    </tr>
    <tr>
      <td>Duration</td>
      <td><input type="text" name="Duration" value=""></td>
    </tr>
    <tr>
      <td>Current Job</td>
      <td><input type="text" name="CurrentJob" value=""></td>
    </tr>
    <tr>
      <td>Working Experience</td>
      <td><input type="text" name="ProjectExperience" value="" size="200"></td>
    </tr>
    <tr>
      <td>Specialization</td>
      <td><input type="text" name="AreaOfExpertise" value="" size="50"></td>
    </tr>
    <tr>
      <td>Year of Expertise:</td>
      <td><input type="text" name="YearOfExpertise" value=""></td>
    </tr>
    <tr>
      <td style="background-color:#0F3;font-size:18px;font-weight:bold;" colspan="2" align="center">CONTACT INFO</td>
    </tr>
    <tr>
      <td>Mobile No</td>
      <td><input type="text" name="MobileNo" value=""></td>
    </tr>
    <tr>
      
      
      <td> Email </td>
      <td><input type="email" name="Email" value="" size="50"></td>
    
    
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="Address" value="" size="300"></td>
    </tr>
    
   
   
    <tr>
      <td style="background-color:#0F3;font-size:18px;font-weight:bold;"colspan="2">Reference Person</td>
    </tr>
    <tr>
      <td>Name:</td>
      <td><input type="text" name="ReferPerson" value=""></td>
    </tr>
    <tr>
      <td>Organization</td>
      <td><input type="text" name="ReferOrganize" value=""> 
	  </td>
    </tr>
    <tr>
      <td>Contact No</td>

      <td><input type="text" name="ReferContact" value=""> </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="UpdateRecord2" id="UpdateRecord" value="ADD" /></td>
    </tr>
  </table>

<input type="hidden" name="MM_insert" value="AddRecord" />
</form>
</body>
</html>