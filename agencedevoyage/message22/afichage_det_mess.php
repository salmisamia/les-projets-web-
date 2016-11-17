<?php require_once('../Connections/maconnexion.php'); ?><?php
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

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_maconnexion, $maconnexion);
$query_DetailRS1 = sprintf("SELECT * FROM message WHERE id_message = %s", GetSQLValueString($colname_DetailRS1, "int"));
$DetailRS1 = mysql_query($query_DetailRS1, $maconnexion) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	background-color: #0099CC;
	background-image: url(../imagesite/bg_2.jpg);
}
.Style1 {
	font-size: 18px;
	font-style: italic;
	font-weight: bold;
}
.Style3 {
	font-size: 24px;
	font-style: italic;
	font-weight: bold;
	color: #0066FF;
}
.Style4 {color: #E4E7E0}
-->
</style></head>

<body>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <p align="center" class="Style3"><img src="../imagesite/polynesie-croisiere-archipel-bateau.jpg" alt="" width="1315" height="150" align="middle" /></p>
  <p align="center" class="Style3">&nbsp;</p>
  <p align="center" class="Style3">Le contenue de message</p>
  <table width="610" border="0" align="center" bgcolor="#9999FF">
    <tr>
      <td width="107"><span class="Style1">Objet</span></td>
      <td width="398" bgcolor="#FFFFFF"><?php echo $row_DetailRS1['objet']; ?> </td>
    </tr>
    <tr>
      <td height="139"><span class="Style1">Message</span></td>
      <td bgcolor="#FFFFFF"><span class="Style4"><?php echo $row_DetailRS1['message']; ?></span></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
          <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','150','height','50','align','middle','src','button2','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#CCCCCC','movie','button2' ); //end AC code
    </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="150" height="50" align="middle">
            <param name="BGCOLOR" value="#CCCCCC" />
            <param name="movie" value="button2.swf" />
            <param name="quality" value="high" />
            <embed src="button2.swf" width="150" height="50" align="middle" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#CCCCCC" ></embed>
          </object>
          </noscript>
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</html><?php
mysql_free_result($DetailRS1);
?>
