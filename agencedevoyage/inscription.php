<?php require_once('Connections/connexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

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
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO client (nom_client, prenom_client, num_tel_cl, e_mail_cl, password, adress_cl) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nom_client'], "text"),
                       GetSQLValueString($_POST['prenom_client'], "text"),
                       GetSQLValueString($_POST['num_tel_cl'], "int"),
                       GetSQLValueString($_POST['e_mail_cl'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['adress_cl'], "text"));

  mysql_select_db($database_connexion, $connexion);
  $Result1 = mysql_query($insertSQL, $connexion) or die(mysql_error());

  $insertGoTo = "list_detaille_client.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>

<style type="text/css">
<!--
body {
	background-image: url(imagesite/lesiel.JPG);
}
.Style3 {
	font-size: 20px;
	font-style: italic;
	font-weight: bold;
	color: #CCCCCC;
}
-->
</style>

<style type="text/css">
<!--
.Style4 {	font-weight: bold;
	font-size: 18px;
}
.Style6 {color: #330099}
.Style7 {	font-size: 24px;
	font-weight: bold;
	font-style: italic;
	color: #00CCCC;
}
-->
</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST"><center><img src="imagesite/Lastminute_Palmblatt_CHB.jpg" width="1313" height="150" align="middle" /></center>
  <p align="center">
  </p>
  <div align="center"><div align="left">
    <p align="center">
      </p>
    <div align="center"><div align="left"></div>
    </div><center>
    <table width="1312" height="384" border="0" bgcolor="#336633">
      <tr>
        <td width="420" bgcolor="#CCFFFF"><p align="center"><span class="Style3">Veuillez remplire le formulaire</span></p>
          <div align="center"><strong>Nom* <span id="sprytextfield1">
            <input type="text" name="nom_client" id="nom_client" />
            <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></strong></div>
          <p align="center"><strong><span id="sprytextfield2">
            <label>prenom*
              <input type="text" name="prenom_client" id="prenom_client" />
            </label>
            <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></strong></p>
          <p align="center"><strong><span id="sprytextfield3">
            <label>date de naissance*
              <input type="text" name="date_nais_cl" id="date_nais_cl" />
            </label>
            <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></strong></p>
          <p align="center"><strong><span id="sprytextfield4">
            <label>Numéro de télephone*
              <input type="text" name="num_tel_cl" id="num_tel_cl" />
            </label>
            <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></strong></p>
          <p align="center"><strong><span id="sprytextfield7"><span id="sprytextfield8">
            <label>adress
              *
            <input type="text" name="adress_cl" id="adr_cl" />
            </label>
            <span class="textfieldRequiredMsg">Une valeur est requise.</span></span><span class="textfieldRequiredMsg">Une valeur est requ</span></span></strong></p>
          <p align="center"><strong><span id="sprytextfield5">
            <label>E_mail*
              <input type="text" name="e_mail_cl" id="e_mail_cl" />
            </label>
            <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></strong></p>
          <p align="center"><span id="sprytextfield6"><strong>
            <label>password*</label>
          </strong></span><span id="sprytextfield6"><span id="sprytextfield9">
          <label>
          <input name="password" type="password" id="password" onchange="MM_validateForm('e_mail_cl','','NisEmail','password','','R');return document.MM_returnValue" />
          </label>
          <span class="textfieldRequiredMsg">Une valeur est requise.</span></span><span class="textfieldRequiredMsg">Une valeur est requise.</span></span></p>
          <div align="center">
            <div align="left">
              <p align="center">&nbsp;</p>
              <p align="center">
                <label>
                <input type="reset" name="button2" id="button2" value="Annuler" />
                <input type="submit" name="button" id="button" value="valaider" />
                  </label>
              </p>
            </div>
          </div></td>
      </tr>
    </table></center>
    <div align="center"></div>
    <p>&nbsp;</p>
  
  <input type="hidden" name="MM_insert" value="form1" />
</div></div></form>
<div align="center"><div align="left"></div>
</div>
<script type="text/javascript">
<!--
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "phone_number", {format:"phone_custom"});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "date", {format:"yyyy-mm-dd"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
//-->
</script>
</body>
</html>
