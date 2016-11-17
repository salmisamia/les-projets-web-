<?php require_once('Connections/maconnexion.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO client (code_cl, nom_cl, prenom_cl, date_nais_cl, num_tel_cl, e_mail_cl, password, adr_cl) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['code_cl'], "int"),
                       GetSQLValueString($_POST['nom_cl'], "text"),
                       GetSQLValueString($_POST['prenom_cl'], "text"),
                       GetSQLValueString($_POST['date_nais_cl'], "date"),
                       GetSQLValueString($_POST['num_tel_cl'], "int"),
                       GetSQLValueString($_POST['e_mail_cl'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['adr_cl'], "text"));

  mysql_select_db($database_maconnexion, $maconnexion);
  $Result1 = mysql_query($insertSQL, $maconnexion) or die(mysql_error());

  $insertGoTo = "liste_client.php";
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
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nom_cl:</td>
      <td><span id="sprytextfield1">
        <label>
        <input type="text" name="nom_cl" id="nom_cl" />
        </label>
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Prenom_cl:</td>
      <td><span id="sprytextfield2">
        <label>
        <input type="text" name="prenom_cl" id="prenom_cl" />
        </label>
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Date_nais_cl:</td>
      <td><span id="sprytextfield3">
      <label>
      <input type="text" name="date_nais_cl" id="date_nais_cl" />
      </label>
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Num_tel_cl:</td>
      <td><span id="sprytextfield4">
      <label>
      <input type="text" name="num_tel_cl" id="num_tel_cl" />
      </label>
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">E_mail_cl:</td>
      <td><span id="sprytextfield5">
        <label>
        <input type="text" name="e_mail_cl" id="e_mail_cl" />
        </label>
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Password:</td>
      <td><span id="sprytextfield6">
        <label>
        <input name="password" type="password" id="password" maxlength="10" />
        </label>
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Adr_cl:</td>
      <td><span id="sprytextfield7">
        <label>
        <input type="text" name="adr_cl" id="adr_cl" />
        </label>
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Valider" /></td>
    </tr>
  </table>
  <input type="hidden" name="code_cl" value="" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "date", {format:"yyyy-mm-dd"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "phone_number", {format:"phone_custom", pattern:"0000000000"});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
//-->
</script>
</body>
</html>
