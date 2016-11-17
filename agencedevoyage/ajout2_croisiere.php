<?php require_once('Connections/maconnexion.php'); ?>
<?php require_once('Connections/connexion.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

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
  $insertSQL = sprintf("INSERT INTO croisiere (id_croisiere, ville_depart_croisiere, ville_arrivee_croisiere, date_depart_croisiere, heure_depart_croisiere, date_retour_croisiere, heure_retour_croisiere, compagnie, prix_croisiere) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_croisiere'], "int"),
                       GetSQLValueString($_POST['ville_depart_croisiere'], "text"),
                       GetSQLValueString($_POST['ville_arrivee_croisiere'], "text"),
                       GetSQLValueString($_POST['date_depart_croisiere'], "date"),
                       GetSQLValueString($_POST['heure_depart_croisiere'], "text"),
                       GetSQLValueString($_POST['date_retour_croisiere'], "date"),
                       GetSQLValueString($_POST['heure_retour_croisiere'], "text"),
                       GetSQLValueString($_POST['compagnie'], "text"),
                       GetSQLValueString($_POST['prix_croisiere'], "double"));

  mysql_select_db($database_maconnexion, $maconnexion);
  $Result1 = mysql_query($insertSQL, $maconnexion) or die(mysql_error());

  $insertGoTo = "liste_croisiere.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO croisiere (id_croisiere, ville_depart_croisiere, ville_arrivee_croisiere, date_depart_croisiere, date_retour_croisiere, heure_depart_croisiere, heure_retour_croisiere, compagnie, nb_plass_croisiere, prix_croisiere) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_croisiere'], "text"),
                       GetSQLValueString($_POST['ville_depart_croisiere'], "text"),
                       GetSQLValueString($_POST['ville_arrivee_croisiere'], "text"),
                       GetSQLValueString($_POST['date_depart_croisiere'], "date"),
                       GetSQLValueString($_POST['date_retour_croisiere'], "date"),
                       GetSQLValueString($_POST['heure_depart_croisiere'], "date"),
                       GetSQLValueString($_POST['heure_retour_croisiere'], "date"),
                       GetSQLValueString($_POST['compagnie'], "text"),
                       GetSQLValueString($_POST['nb_plass_croisiere'], "int"),
                       GetSQLValueString($_POST['prix_croisiere'], "double"));

  mysql_select_db($database_connexion, $connexion);
  $Result1 = mysql_query($insertSQL, $connexion) or die(mysql_error());

  $insertGoTo = "ajout2_croisiere.php";
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
<style type="text/css">
<!--
body {
	background-image: url(imagesite/33333.JPG);
}
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
)
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <p><img src="imagesite/polynesie-croisiere-archipel-bateau.jpg" alt="" width="1353" height="150" align="middle" /></p>
   <table width="1359" border="0" bgcolor="#9900FF">
    <tr>
      <td width="340" height="33"><div align="center">
          <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','ac12','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','ac12' ); //end AC code
      </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="ac12.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="ac12.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="340"><div align="center">
          <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','vo45','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','vo45' ); //end AC code
      </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="vo45.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="vo45.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="340"><div align="center">
          <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','cro1265','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','cro1265' ); //end AC code
      </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="cro1265.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="cro1265.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="321"><div align="center">
          <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','gert45','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','gert45' ); //end AC code
      </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="gert45.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="gert45.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
    </tr>
  </table>
  <p align="center">
    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','391','height','42','src','text11','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#3366FF','movie','text11' ); //end AC code
</script><noscript>
<p>
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="391" height="42">
    <param name="movie" value="text11.swf" />
    <param name="quality" value="high" />
    <param name="bgcolor" value="#3366FF" />
    <embed src="text11.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="391" height="42" bgcolor="#3366FF"></embed>
  </object>
</p>
</noscript>
  <p></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
<form method="post" name="form2" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Ville_depart_croisiere:</td>
      <td><input type="text" name="ville_depart_croisiere" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ville_arrivee_croisiere:</td>
      <td><input type="text" name="ville_arrivee_croisiere" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Date_depart_croisiere:</td>
      <td><input type="text" name="date_depart_croisiere" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Date_retour_croisiere:</td>
      <td><input type="text" name="date_retour_croisiere" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Heure_depart_croisiere:</td>
      <td><input type="text" name="heure_depart_croisiere" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Heure_retour_croisiere:</td>
      <td><input type="text" name="heure_retour_croisiere" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Compagnie:</td>
      <td><input type="text" name="compagnie" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nb_plass_croisiere:</td>
      <td><input type="text" name="nb_plass_croisiere" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Prix_croisiere:</td>
      <td><input type="text" name="prix_croisiere" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="ajouté"></td>
    </tr>
  </table>
  <input type="hidden" name="id_croisiere" value="">
  <input type="hidden" name="MM_insert" value="form2">
</form>
<p>&nbsp;</p>
  <script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
//-->
</script>
</body>
</html>
