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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE croisiere SET ville_depart_croisiere=%s, ville_arrivee_croisiere=%s, date_depart_croisiere=%s, heure_depart_croisiere=%s, date_retour_croisiere=%s, heure_retour_croisiere=%s, compagnie=%s, prix_croisiere=%s WHERE id_croisiere=%s",
                       GetSQLValueString($_POST['ville_depart_croisiere'], "text"),
                       GetSQLValueString($_POST['ville_arrivee_croisiere'], "text"),
                       GetSQLValueString($_POST['date_depart_croisiere'], "date"),
                       GetSQLValueString($_POST['heure_depart_croisiere'], "text"),
                       GetSQLValueString($_POST['date_retour_croisiere'], "date"),
                       GetSQLValueString($_POST['heure_retour_croisiere'], "text"),
                       GetSQLValueString($_POST['compagnie'], "text"),
                       GetSQLValueString($_POST['prix_croisiere'], "double"),
                       GetSQLValueString($_POST['id_croisiere'], "int"));

  mysql_select_db($database_maconnexion, $maconnexion);
  $Result1 = mysql_query($updateSQL, $maconnexion) or die(mysql_error());

  $updateGoTo = "liste_croisiere.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_maconnexion, $maconnexion);
$query_mod = "SELECT * FROM croisiere";
$mod = mysql_query($query_mod, $maconnexion) or die(mysql_error());
$row_mod = mysql_fetch_assoc($mod);
$totalRows_mod = mysql_num_rows($mod);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	background-image: url(imagesite/33333.JPG);
}
-->
</style></head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <p align="center"><img src="imagesite/polynesie-croisiere-archipel-bateau.jpg" alt="" width="1359" height="150" align="middle" /></p>
  <table width="1360" border="0" align="center" bgcolor="#9900FF">
    <tr>
      <td width="334" height="32"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','acc756','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','acc756' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="acc756.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="acc756.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="343"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','v1245','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','v1245' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
          <param name="movie" value="v1245.swf" />
          <param name="quality" value="high" />
          <param name="bgcolor" value="#9900FF" />
          <embed src="v1245.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
        </object>
      </noscript></div></td>
      <td width="335"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','croi456','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','croi456' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
          <param name="movie" value="croi456.swf" />
          <param name="quality" value="high" />
          <param name="bgcolor" value="#9900FF" />
          <embed src="croi456.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
        </object>
      </noscript></div></td>
      <td width="330"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','gert1465','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','gert1465' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
          <param name="movie" value="gert1465.swf" />
          <param name="quality" value="high" />
          <param name="bgcolor" value="#9900FF" />
          <embed src="gert1465.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
        </object>
      </noscript></div></td>
    </tr>
  </table>
  <p align="center">
    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','387','height','32','src','text10','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#CC66FF','movie','text10' ); //end AC code
    </script>
  <noscript>
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="387" height="32">
      <param name="movie" value="text10.swf" />
      <param name="quality" value="high" />
      <param name="bgcolor" value="#CC66FF" />
      <embed src="text10.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="387" height="32" bgcolor="#CC66FF"></embed>
    </object>
    </noscript>
  </p>
  <table width="401" height="273" align="center" bgcolor="#33CCFF">
    <tr valign="baseline">
      <td width="164" align="right" nowrap="nowrap"><strong>Ville_depart_croisiere:</strong></td>
      <td width="215"><input type="text" name="ville_depart_croisiere" value="<?php echo htmlentities($row_mod['ville_depart_croisiere'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Ville_arrivee_croisiere:</strong></td>
      <td><input type="text" name="ville_arrivee_croisiere" value="<?php echo htmlentities($row_mod['ville_arrivee_croisiere'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Date_depart_croisiere:</strong></td>
      <td><input type="text" name="date_depart_croisiere" value="<?php echo htmlentities($row_mod['date_depart_croisiere'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Heure_depart_croisiere:</strong></td>
      <td><input type="text" name="heure_depart_croisiere" value="<?php echo htmlentities($row_mod['heure_depart_croisiere'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Date_retour_croisiere:</strong></td>
      <td><input type="text" name="date_retour_croisiere" value="<?php echo htmlentities($row_mod['date_retour_croisiere'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Heure_retour_croisiere:</strong></td>
      <td><input type="text" name="heure_retour_croisiere" value="<?php echo htmlentities($row_mod['heure_retour_croisiere'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Compagnie:</strong></td>
      <td><input type="text" name="compagnie" value="<?php echo htmlentities($row_mod['compagnie'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Prix_croisiere:</strong></td>
      <td><input type="text" name="prix_croisiere" value="<?php echo htmlentities($row_mod['prix_croisiere'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><label>
        <input type="reset" name="button" id="button" value="Annuler" />
      </label></td>
      <td><input type="submit" value="modifier" /></td>
    </tr>
  </table>
  <input type="hidden" name="id_croisiere" value="<?php echo $row_mod['id_croisiere']; ?>" />
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_croisiere" value="<?php echo $row_mod['id_croisiere']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($mod);
?>
