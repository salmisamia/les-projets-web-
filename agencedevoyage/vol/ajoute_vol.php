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
  $insertSQL = sprintf("INSERT INTO vol (id_vol, ville_depart_vol, ville_arrivee_vol, date_depart_vol, heure_depart_vol, date_retour_vol, heure_retour_vol, classe_vol, type_vol, compagnie, prix_vol) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_vol'], "int"),
                       GetSQLValueString($_POST['ville_depart_vol'], "text"),
                       GetSQLValueString($_POST['ville_arrivee_vol'], "text"),
                       GetSQLValueString($_POST['date_depart_vol'], "date"),
                       GetSQLValueString($_POST['heure_depart_vol'], "text"),
                       GetSQLValueString($_POST['date_retour_vol'], "date"),
                       GetSQLValueString($_POST['heure_retour_vol'], "text"),
                       GetSQLValueString($_POST['classe_vol'], "text"),
                       GetSQLValueString($_POST['type_vol'], "text"),
                       GetSQLValueString($_POST['compagnie'], "text"),
                       GetSQLValueString($_POST['prix_vol'], "double"));

  mysql_select_db($database_maconnexion, $maconnexion);
  $Result1 = mysql_query($insertSQL, $maconnexion) or die(mysql_error());

  $insertGoTo = "conf_ajout_vol.php";
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
<title>ajouter un vol</title>
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	background-image: url(../imagesite/33333.JPG);
}
-->
</style>

<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Style1 {	color: #3366FF;
	font-style: italic;
	font-weight: bold;
	font-size: 36px;
}
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <p align="center"><img src="../imagesite/polynesie-croisiere-archipel-bateau.jpg" alt="" width="1359" height="150" align="middle" /></p>
  <table width="1311" border="0" align="center" bgcolor="#9900FF">
    <tr>
      <td width="313" height="36"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','acc5','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','acc5' ); //end AC code
      </script>
        <noscript>
              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
                <param name="movie" value="acc5.swf" />
                <param name="quality" value="high" />
                <param name="bgcolor" value="#9900FF" />
                <embed src="acc5.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
                  </object>
        </noscript>
      </div></td>
      <td width="331"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','button1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','button1' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="BGCOLOR" value="#9900FF" />
            <param name="movie" value="button1.swf" />
            <param name="quality" value="high" />
            <embed src="button1.swf" width="250" height="50" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#9900FF" ></embed>
          </object>
          </noscript>
      </div></td>
      <td width="331"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','crois5','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','crois5' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="crois5.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="crois5.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="318"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','gert5','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','gert5' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="gert5.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="gert5.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
    </tr>
  </table>
  <p align="center">&nbsp;</p>
  <p align="center">
    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','434','height','51','src','te45','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','te45' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="434" height="51">
      <param name="movie" value="te45.swf" />
      <param name="quality" value="high" />
      <param name="bgcolor" value="#9900FF" />
      <embed src="te45.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="434" height="51" bgcolor="#9900FF"></embed>
    </object></noscript>
  </p>
  <table align="center" bgcolor="#00CCFF">
    <tr valign="baseline">
      <td width="126" align="right" nowrap="nowrap"><strong>Ville_depart_vol:</strong></td>
      <td width="292"><span id="sprytextfield1">
        <input type="text" name="ville_depart_vol" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Ville_arrivee_vol:</strong></td>
      <td><span id="sprytextfield2">
        <input type="text" name="ville_arrivee_vol" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Date_depart_vol:</strong></td>
      <td><span id="sprytextfield3">
      <input type="text" name="date_depart_vol" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Heure_depart_vol:</strong></td>
      <td><span id="sprytextfield4">
      <input type="text" name="heure_depart_vol" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Date_retour_vol:</strong></td>
      <td><span id="sprytextfield5">
      <input type="text" name="date_retour_vol" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Heure_retour_vol:</strong></td>
      <td><span id="sprytextfield6">
      <input type="text" name="heure_retour_vol" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Classe_vol:</strong></td>
      <td><span id="sprytextfield7">
        <input type="text" name="classe_vol" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Type_vol:</strong></td>
      <td><span id="sprytextfield8">
        <input type="text" name="type_vol" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Compagnie:</strong></td>
      <td><span id="sprytextfield9">
        <input type="text" name="compagnie" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Prix_vol:</strong></td>
      <td><span id="sprytextfield10">
      <input type="text" name="prix_vol" value="" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><label>
        <input type="reset" name="button" id="button" value="Annuler" />
      </label></td>
      <td><div align="center">
        <input type="submit" value="Ajouter" />
      </div></td>
    </tr>
  </table>
  <input type="hidden" name="id_vol" value="" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<form id="form2" name="form2" method="post" action="conf_ajout_vol.php">
<p>&nbsp;</p>

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "date", {format:"yyyy-mm-dd"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "time");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "date", {format:"yyyy-mm-dd"});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "time");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "currency");
//-->
</script>
</body>
</html>
