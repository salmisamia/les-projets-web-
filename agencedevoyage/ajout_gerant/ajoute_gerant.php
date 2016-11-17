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
  $insertSQL = sprintf("INSERT INTO gerant (id_gerant, nom_gerant, prenom_gerant, date_nais_gerant, num_tel_gerant, login, password) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_gerant'], "int"),
                       GetSQLValueString($_POST['nom_gerant'], "text"),
                       GetSQLValueString($_POST['prenom_gerant'], "text"),
                       GetSQLValueString($_POST['date_nais_gerant'], "date"),
                       GetSQLValueString($_POST['num_tel_gerant'], "int"),
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_maconnexion, $maconnexion);
  $Result1 = mysql_query($insertSQL, $maconnexion) or die(mysql_error());

  $insertGoTo = "confirme_ajout_geant.php";
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
	background-image: url(../imagesite/gazouz.jpg);
}
.Style17 {
	font-size: 18px;
	font-weight: bold;
}
.Style18 {
	font-size: 24px;
	font-weight: bold;
	color: #6633FF;
}
.Style19 {
	font-size: 24px;
	color: #9933FF;
}
.Style20 {font-size: 36px}
-->
</style>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body onload="MM_preloadImages('../imagesite/cross-sell-croisieres.jpg','../imagesite/1212892.jpg','../imagesite/AVION NUAGE.jpg')">
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <p align="center"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','../imagesite/cross-sell-croisieres.jpg',1)"><img src="../imagesite/1.jpg" name="Image1" width="425" height="229" border="0" align="middle" id="Image1" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','../imagesite/1212892.jpg',1)"><img src="../imagesite/tunisie.jpg" name="Image2" width="425" height="230" border="0" align="middle" id="Image2" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','../imagesite/AVION NUAGE.jpg',1)"><img src="../imagesite/1bb6ccf23c95c84c1d6b67536452d5479d934248.jpg" name="Image3" width="425" height="230" border="0" align="middle" id="Image3" /></a></p>
  <table width="1314" border="0">
    <tr>
      <td width="1306" height="35" bgcolor="#0066FF"><div align="left" class="Style17 Style19">Accuiel</div></td>
    </tr>
  </table>
  <table width="1314" height="47" border="0">
    <tr>
      <td width="1144" bgcolor="#0099FF"><div align="center" class="Style18"><marquee direction="left" scrolldelay="150" class="textblanc Style4 Style20" onMouseMove="stop();" onMouseOut="start();" >Ajouter un gérant</marquee>
      </div></td>
    </tr>
  </table>
  <table width="515" height="265" border="1" align="center" bordercolor="#66CC99" bgcolor="#0000FF">
    <tr valign="baseline">
      <td width="134" align="right" nowrap="nowrap"><strong>Nom_gerant:</strong></td>
      <td width="304"><span id="sprytextfield1">
        <input type="text" name="nom_gerant" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Prenom_gerant:</strong></td>
      <td><span id="sprytextfield2">
        <input type="text" name="prenom_gerant" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Date_nais_gerant:</strong></td>
      <td><span id="sprytextfield3">
      <input type="text" name="date_nais_gerant" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Num_tel_gerant:</strong></td>
      <td><span id="sprytextfield4">
      <input type="text" name="num_tel_gerant" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Login:</strong></td>
      <td><span id="sprytextfield5">
      <input type="text" name="login" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Password:</strong></td>
      <td><span id="sprytextfield6">
        <input type="password" name="password" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><label>
        <div align="center">
          <input type="reset" name="button" id="button" value="Annuler" />
          </div>
      </label></td>
      <td><div align="center">
        <input name="Envoyer" type="submit" value="Valider" />
      </div></td>
    </tr>
  </table>
  <input type="hidden" name="id_gerant" value="" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "date", {format:"yyyy-mm-dd"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "phone_number", {format:"phone_custom", pattern:"0000000000"});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
//-->
</script>
</body>
</html>
