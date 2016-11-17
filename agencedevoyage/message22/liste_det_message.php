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

mysql_select_db($database_maconnexion, $maconnexion);
$query_liste_det = "SELECT * FROM message";
$liste_det = mysql_query($query_liste_det, $maconnexion) or die(mysql_error());
$row_liste_det = mysql_fetch_assoc($liste_det);
$totalRows_liste_det = mysql_num_rows($liste_det);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>liste_detaillé</title>
<style type="text/css">
<!--
body {
	background-color: #0099FF;
	background-image: url(../imagesite/bg_2.jpg);
}
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<p align="center"><img src="../imagesite/polynesie-croisiere-archipel-bateau.jpg" alt="" width="1315" height="150" align="middle" /></p>
<p align="center">
  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','506','height','49','src','text1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#00CCFF','movie','text1' ); //end AC code
  </script>
  <noscript>
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="506" height="49">
    <param name="movie" value="text1.swf" />
    <param name="quality" value="high" />
    <param name="bgcolor" value="#00CCFF" />
    <embed src="text1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="506" height="49" bgcolor="#00CCFF"></embed>
    </object>
  </noscript>
</p>
<table width="514" height="122" border="1" align="center" bgcolor="#9966FF">
  <tr>
    <td width="122" height="44"><strong>Nom</strong></td>
    <td width="145"><strong>Prenom</strong></td>
    <td width="137"><strong>E_mail</strong></td>
    <td width="66"><strong>Lire</strong></td>
    <td width="66">Supprimer</td>
  </tr>
  <?php do { ?>
    <tr>
      <td height="70" bgcolor="#9966FF"> <?php echo $row_liste_det['nom']; ?>&nbsp;  </td>
      <td bgcolor="#9966FF"><?php echo $row_liste_det['prenom']; ?>&nbsp; </td>
      <td bgcolor="#9966FF"><?php echo $row_liste_det['e_mail']; ?>&nbsp; </td>
      <td><a href="afichage_det_mess.php?recordID=<?php echo $row_liste_det['id_message']; ?>">Lire</a></td>
      <td><a href="supprimer_mesg.php?valeur=<?php echo $row_liste_det['id_message']; ?>">Supprimer</a></td>
    </tr>
    <?php } while ($row_liste_det = mysql_fetch_assoc($liste_det)); ?>
</table>
<br />
</body>
</html>
<?php
mysql_free_result($liste_det);
?>
