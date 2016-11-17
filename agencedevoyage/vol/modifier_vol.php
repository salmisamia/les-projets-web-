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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE vol SET ville_depart_vol=%s, ville_arrivee_vol=%s, date_depart_vol=%s, heure_depart_vol=%s, date_retour_vol=%s, heure_retour_vol=%s, classe_vol=%s, type_vol=%s, compagnie=%s, prix_vol=%s WHERE id_vol=%s",
                       GetSQLValueString($_POST['ville_depart_vol'], "text"),
                       GetSQLValueString($_POST['ville_arrivee_vol'], "text"),
                       GetSQLValueString($_POST['date_depart_vol'], "date"),
                       GetSQLValueString($_POST['heure_depart_vol'], "text"),
                       GetSQLValueString($_POST['date_retour_vol'], "date"),
                       GetSQLValueString($_POST['heure_retour_vol'], "text"),
                       GetSQLValueString($_POST['classe_vol'], "text"),
                       GetSQLValueString($_POST['type_vol'], "text"),
                       GetSQLValueString($_POST['compagnie'], "text"),
                       GetSQLValueString($_POST['prix_vol'], "double"),
                       GetSQLValueString($_POST['id_vol'], "int"));

  mysql_select_db($database_maconnexion, $maconnexion);
  $Result1 = mysql_query($updateSQL, $maconnexion) or die(mysql_error());

  $updateGoTo = "liste_vol.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_modfvol = "-1";
if (isset($_GET['valeur'])) {
  $colname_modfvol = $_GET['valeur'];
}
mysql_select_db($database_maconnexion, $maconnexion);
$query_modfvol = sprintf("SELECT * FROM vol WHERE id_vol = %s", GetSQLValueString($colname_modfvol, "int"));
$modfvol = mysql_query($query_modfvol, $maconnexion) or die(mysql_error());
$row_modfvol = mysql_fetch_assoc($modfvol);
$totalRows_modfvol = mysql_num_rows($modfvol);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(../imagesite/33333.JPG);
}
.Style1 {
	color: #3366FF;
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
  <table width="1358" border="0" align="center" bgcolor="#9900FF">
    <tr>
      <td width="355" height="36">
        <div align="center">
          <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','acc4','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','acc4' ); //end AC code
        </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="acc4.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="acc4.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
        </div></td>
      <td width="349"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','vol4','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','vol4' ); //end AC code
      </script>
        <noscript>
              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
                <param name="movie" value="vol4.swf" />
                <param name="quality" value="high" />
                <param name="bgcolor" value="#9900FF" />
                <embed src="vol4.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
                  </object>
        </noscript>
      </div></td>
      <td width="324"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','crois4','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','crois4' ); //end AC code
      </script>
        <noscript>
              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
                <param name="movie" value="crois4.swf" />
                <param name="quality" value="high" />
                <param name="bgcolor" value="#9900FF" />
                <embed src="crois4.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
                  </object>
        </noscript>
      </div></td>
      <td width="312"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','gerant4','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','gerant4' ); //end AC code
</script><noscript>
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
    <param name="movie" value="gerant4.swf" />
    <param name="quality" value="high" />
    <param name="bgcolor" value="#9900FF" />
    <embed src="gerant4.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
  </object>
</noscript></td>
    </tr>
  </table>
  <p align="center" class="Style1">
    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','442','height','42','src','modfievol','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9933FF','movie','modfievol' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="442" height="42">
      <param name="movie" value="modfievol.swf" />
      <param name="quality" value="high" />
      <param name="bgcolor" value="#9933FF" />
      <embed src="modfievol.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="442" height="42" bgcolor="#9933FF"></embed>
    </object></noscript>
  </p>
  <table width="443" align="center" bgcolor="#0099FF">
    <tr valign="baseline">
      <td width="126" align="right" nowrap="nowrap"><strong>Ville_depart_vol:</strong></td>
      <td width="279"><span id="sprytextfield1">
        <input type="text" name="ville_depart_vol" value="<?php echo htmlentities($row_modfvol['ville_depart_vol'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Ville_arrivee_vol:</strong></td>
      <td><span id="sprytextfield2">
        <input type="text" name="ville_arrivee_vol" value="<?php echo htmlentities($row_modfvol['ville_arrivee_vol'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Date_depart_vol:</strong></td>
      <td><span id="sprytextfield3">
      <input type="text" name="date_depart_vol" value="<?php echo htmlentities($row_modfvol['date_depart_vol'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Heure_depart_vol:</strong></td>
      <td><span id="sprytextfield4">
      <input type="text" name="heure_depart_vol" value="<?php echo htmlentities($row_modfvol['heure_depart_vol'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Date_retour_vol:</strong></td>
      <td><span id="sprytextfield5">
      <input type="text" name="date_retour_vol" value="<?php echo htmlentities($row_modfvol['date_retour_vol'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Heure_retour_vol:</strong></td>
      <td><span id="sprytextfield6">
      <input type="text" name="heure_retour_vol" value="<?php echo htmlentities($row_modfvol['heure_retour_vol'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Classe_vol:</strong></td>
      <td><span id="sprytextfield7">
        <input type="text" name="classe_vol" value="<?php echo htmlentities($row_modfvol['classe_vol'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Type_vol:</strong></td>
      <td><span id="sprytextfield8">
        <input type="text" name="type_vol" value="<?php echo htmlentities($row_modfvol['type_vol'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Compagnie:</strong></td>
      <td><span id="sprytextfield9">
        <input type="text" name="compagnie" value="<?php echo htmlentities($row_modfvol['compagnie'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Prix_vol:</strong></td>
      <td><span id="sprytextfield10">
      <input type="text" name="prix_vol" value="<?php echo htmlentities($row_modfvol['prix_vol'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><label>
        <input type="reset" name="button" id="button" value="Annuler" />
      </label></td>
      <td><input type="submit" value="modifier" /></td>
    </tr>
  </table>
  <input type="hidden" name="id_vol" value="<?php echo $row_modfvol['id_vol']; ?>" />
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_vol" value="<?php echo $row_modfvol['id_vol']; ?>" />
</form>
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
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "real");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($modfvol);
?>
