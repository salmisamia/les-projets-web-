<?php require_once('../Connections/maconnexion.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO message (id_message, nom, prenom, e_mail, objet, message) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_message'], "int"),
                       GetSQLValueString($_POST['nom'], "text"),
                       GetSQLValueString($_POST['prenom'], "text"),
                       GetSQLValueString($_POST['e_mail'], "text"),
                       GetSQLValueString($_POST['objet'], "text"),
                       GetSQLValueString($_POST['message'], "text"));

  mysql_select_db($database_maconnexion, $maconnexion);
  $Result1 = mysql_query($insertSQL, $maconnexion) or die(mysql_error());

  $insertGoTo = "confirme_mess.php";
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
<title>envoi de message </title>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(../imagesite/bg_2.jpg);
}
.Style1 {
	font-size: 24px;
	font-weight: bold;
	font-style: italic;
	color: #3366CC;
}
-->
</style></head>
<body>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
    <p class="Style1"><img src="../imagesite/polynesie-croisiere-archipel-bateau.jpg" alt="" width="1315" height="150" align="middle" />
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="180" height="35">
        <param name="movie" value="button1.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#CCCCCC" />
        <embed src="button1.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="180" height="35" bgcolor="#CCCCCC"></embed>
      </object>
    </p>
    <p align="center" class="Style1">&nbsp;</p>
    <p align="left" class="Style1">Envoi de message</p>
<table width="473" height="237" align="center" bgcolor="#0099FF">
      <tr valign="baseline">
        <td width="86" align="right" nowrap="nowrap">Nom*:</td>
        <td width="356">
          <input type="text" name="nom" value="" size="32" />
        <span class="textfieldRequiredMsg">Une valeur est requise.</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Prenom*:</td>
        <td>
          <input type="text" name="prenom" value="" size="32" />
        <span class="textfieldRequiredMsg">Une valeur est requise.</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">E_mai*l:</td>
        <td>
        <input type="text" name="e_mail" value="" size="32" />
        <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Obje*t:</td>
        <td>
          <input type="text" name="objet" value="" size="32" />
        <span class="textfieldRequiredMsg">Une valeur est requise.</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Message*:</td>
        <td>
          <label>
          <textarea name="message" id="message" cols="45" rows="5"></textarea>
          </label>
        <span class="textareaRequiredMsg">Une valeur est requise.</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right"><label>
          <input type="reset" name="button3" id="button3" value="Réinitialiser" />
        </label></td>
        <td><input type="submit" value="Envoyer" /></td>
      </tr>
    </table>
    <p>&nbsp;    </p>
    <p>
      <input type="hidden" name="id_message" value="" />
      <input type="hidden" name="MM_insert" value="form1" />
    </p>
  </form>
  <p>&nbsp;</p>
  <script type="text/javascript">
<!--
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "email");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2");
//-->
</script>
</body>
</html>
 
</body>
</html>
