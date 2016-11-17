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
$query_liste_res1 = "SELECT * FROM reservation1";
$liste_res1 = mysql_query($query_liste_res1, $maconnexion) or die(mysql_error());
$row_liste_res1 = mysql_fetch_assoc($liste_res1);
$totalRows_liste_res1 = mysql_num_rows($liste_res1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	background-image: url(../imagesite/lesiel.JPG);
}
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p align="center">
    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','208','height','26','src','text1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#996666','movie','text1' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="208" height="26">
      <param name="movie" value="text1.swf" />
      <param name="quality" value="high" />
      <param name="bgcolor" value="#996666" />
      <embed src="text1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="208" height="26" bgcolor="#996666"></embed>
    </object></noscript>
  </p>
  <p>&nbsp;</p>
  <table border="1" align="center" bgcolor="#0066FF">
    <tr>
      <td>Id_res</td>
      <td>code_cl</td>
      <td>Id_vol</td>
      <td>Id_croisiere</td>
      <td>Date_res</td>
      <td>ville_depart</td>
      <td>ville_arrivee</td>
      <td>date_depart</td>
      <td>nb_place</td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_liste_res1['Id_res']; ?></td>
      <td><?php echo $row_liste_res1['code_cl']; ?></td>
      <td><?php echo $row_liste_res1['Id_vol']; ?></td>
      <td><?php echo $row_liste_res1['Id_croisiere']; ?></td>
      <td><?php echo $row_liste_res1['Date_res']; ?></td>
      <td><?php echo $row_liste_res1['ville_depart']; ?></td>
      <td><?php echo $row_liste_res1['ville_arrivee']; ?></td>
      <td><?php echo $row_liste_res1['date_depart']; ?></td>
      <td><?php echo $row_liste_res1['nb_place']; ?></td>
    </tr>
    <?php } while ($row_liste_res1 = mysql_fetch_assoc($liste_res1)); ?>
  </table>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($liste_res1);
?>
