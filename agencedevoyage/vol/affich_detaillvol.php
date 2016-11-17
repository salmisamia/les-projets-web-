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

$maxRows_DetailRS1 = 10;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_maconnexion, $maconnexion);
$query_DetailRS1 = sprintf("SELECT * FROM vol WHERE id_vol = %s", GetSQLValueString($colname_DetailRS1, "int"));
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysql_query($query_limit_DetailRS1, $maconnexion) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysql_query($query_DetailRS1);
  $totalRows_DetailRS1 = mysql_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;

$maxRows_DetailRS2 = 10;
$pageNum_DetailRS2 = 0;
if (isset($_GET['pageNum_DetailRS2'])) {
  $pageNum_DetailRS2 = $_GET['pageNum_DetailRS2'];
}
$startRow_DetailRS2 = $pageNum_DetailRS2 * $maxRows_DetailRS2;

$colname_DetailRS2 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS2 = $_GET['recordID'];
}
mysql_select_db($database_maconnexion, $maconnexion);
$query_DetailRS2 = sprintf("SELECT * FROM vol WHERE id_vol = %s", GetSQLValueString($colname_DetailRS2, "int"));
$query_limit_DetailRS2 = sprintf("%s LIMIT %d, %d", $query_DetailRS2, $startRow_DetailRS2, $maxRows_DetailRS2);
$DetailRS2 = mysql_query($query_limit_DetailRS2, $maconnexion) or die(mysql_error());
$row_DetailRS2 = mysql_fetch_assoc($DetailRS2);

if (isset($_GET['totalRows_DetailRS2'])) {
  $totalRows_DetailRS2 = $_GET['totalRows_DetailRS2'];
} else {
  $all_DetailRS2 = mysql_query($query_DetailRS2);
  $totalRows_DetailRS2 = mysql_num_rows($all_DetailRS2);
}
$totalPages_DetailRS2 = ceil($totalRows_DetailRS2/$maxRows_DetailRS2)-1;
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
.Style17 {	font-size: 36px;
	font-style: italic;
	font-weight: bold;
	color: #99FF66;
}
.Style18 {
	font-size: 30px;
	color: #0033FF;
}
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="1315" height="160" border="0">
    <tr>
      <td width="1305" height="156" background="../imagesite/aabbb.jpg">&nbsp;</td>
    </tr>
  </table>
   <table width="1305" height="44" border="0">
      <tr>
        <td width="1299" bgcolor="#00CCFF"><div align="center" class="Style1"><marquee direction="left" scrolldelay="150" class="textblanc Style4 Style18" onMouseMove="stop();" onMouseOut="start();" >
          <strong>          <em>Bien venue dans notre agence de voyage </em>          </strong>
        </marquee> 
        </div></td>
      </tr>
    </table>
  <center>  <table  border="0" bgcolor="#3366FF">
    <tr>
      <td width="1003" ><p align="center"><img src="../imagesite/11641174-avion-ciel-et-les-nuages.jpg" alt="22" width="147" height="96" align="left" /><img src="../imagesite/11641174-avion-ciel-et-les-nuages.jpg" alt="11" width="147" height="96" align="right" /></p>
          <div align="center">
            <p class="Style17">Les détailles sur les vols </p>
          </div>
        <table width="564" height="254" border="1" align="center" bgcolor="#FFCCFF">
          <tr>
            <td width="211"><strong>ville_depart_vol</strong></td>
            <td width="337"><?php echo $row_DetailRS2['ville_depart_vol']; ?> </td>
          </tr>
          <tr>
            <td><strong>ville_arrivee_vol</strong></td>
            <td><?php echo $row_DetailRS2['ville_arrivee_vol']; ?> </td>
          </tr>
          <tr>
            <td><strong>date_depart_vol</strong></td>
            <td><?php echo $row_DetailRS2['date_depart_vol']; ?> </td>
          </tr>
          <tr>
            <td><strong>heure_depart_vol</strong></td>
            <td><?php echo $row_DetailRS2['heure_depart_vol']; ?> </td>
          </tr>
          <tr>
            <td><strong>date_retour_vol</strong></td>
            <td><?php echo $row_DetailRS2['date_retour_vol']; ?> </td>
          </tr>
          <tr>
            <td><strong>heure_retour_vol</strong></td>
            <td><?php echo $row_DetailRS2['heure_retour_vol']; ?> </td>
          </tr>
          <tr>
            <td><strong>classe_vol</strong></td>
            <td><?php echo $row_DetailRS2['classe_vol']; ?> </td>
          </tr>
          <tr>
            <td><strong>type_vol</strong></td>
            <td><?php echo $row_DetailRS2['type_vol']; ?> </td>
          </tr>
          <tr>
            <td><strong>compagnie</strong></td>
            <td><?php echo $row_DetailRS2['compagnie']; ?> </td>
          </tr>
          <tr>
            <td height="23"><strong>prix_vol</strong></td>
            <td><?php echo $row_DetailRS2['prix_vol']; ?> </td>
          </tr>
        </table>
        <p align="center">
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="150" height="40">
            <param name="movie" value="button3.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#0033FF" />
            <embed src="button3.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="150" height="40" bgcolor="#0033FF"></embed>
          </object>
        </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p></td>
    </tr>
  </table></center>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html><?php
mysql_free_result($DetailRS1);

mysql_free_result($DetailRS2);
?>
