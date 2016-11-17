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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_affichcrois = 10;
$pageNum_affichcrois = 0;
if (isset($_GET['pageNum_affichcrois'])) {
  $pageNum_affichcrois = $_GET['pageNum_affichcrois'];
}
$startRow_affichcrois = $pageNum_affichcrois * $maxRows_affichcrois;

mysql_select_db($database_maconnexion, $maconnexion);
$query_affichcrois = "SELECT * FROM croisiere";
$query_limit_affichcrois = sprintf("%s LIMIT %d, %d", $query_affichcrois, $startRow_affichcrois, $maxRows_affichcrois);
$affichcrois = mysql_query($query_limit_affichcrois, $maconnexion) or die(mysql_error());
$row_affichcrois = mysql_fetch_assoc($affichcrois);

if (isset($_GET['totalRows_affichcrois'])) {
  $totalRows_affichcrois = $_GET['totalRows_affichcrois'];
} else {
  $all_affichcrois = mysql_query($query_affichcrois);
  $totalRows_affichcrois = mysql_num_rows($all_affichcrois);
}
$totalPages_affichcrois = ceil($totalRows_affichcrois/$maxRows_affichcrois)-1;

$queryString_affichcrois = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_affichcrois") == false && 
        stristr($param, "totalRows_affichcrois") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_affichcrois = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_affichcrois = sprintf("&totalRows_affichcrois=%d%s", $totalRows_affichcrois, $queryString_affichcrois);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	background-image: url(imagesite/gazouz.jpg);
}
.Style17 {font-size: 36px;
	font-style: italic;
	font-weight: bold;
	color: #99FF66;
}
.Style18 {color: #CC6600}
.Style21 {
	color: #0000FF;
	font-size: 30px;
	font-weight: bold;
}
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="1302" height="228" border="0">
    <tr>
      <td width="1296" height="224"><p><img src="imagesite/aa_ile.JPG" alt="" width="1307" height="170" /></p>
             <table width="1305" height="44" border="0">
      <tr>
        <td width="1299" bgcolor="#00CCFF"><div align="center" class="Style1"><marquee direction="left" scrolldelay="150" class="Style4 textblanc  Style21" onMouseMove="stop();" onMouseOut="start();" >
          <em>Bien venue dans notre agence de voyage </em>
        </marquee> 
        </div></td>
      </tr>
    </table></td>
    </tr>
  </table>
 <center> <table  border="0" bgcolor="#6666FF">
    <tr>
      <td width="1039" ><p align="center"><img src="imagesite/cross-sell-croisieres.jpg" alt="za" width="147" height="96" align="left" /><img src="imagesite/cross-sell-croisieres.jpg" alt="az" width="147" height="96" align="right" /></p>
          <div align="center">
            <p class="Style17 Style18">Liste des croisières disponibles</p>
        </div>
          <p align="center">
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="200" height="50">
              <param name="movie" value="button5.swf" />
              <param name="quality" value="high" />
              <param name="bgcolor" value="#0066FF" />
              <embed src="button5.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="200" height="50" bgcolor="#0066FF"></embed>
            </object>
          </p>
          <table width="855" border="1" align="center" bgcolor="#33CC66">
            <tr>
              <td width="217"><strong>ville_depart_croisiere</strong></td>
              <td width="217"><strong>ville_arrivee_croisiere</strong></td>
              <td width="149"><strong>compagnie</strong></td>
              <td width="170"><strong>prix_croisiere</strong></td>
              <td width="68">Detail</td>
            </tr>
            <?php do { ?>
            <tr>
              <td height="40"> <?php echo $row_affichcrois['ville_depart_croisiere']; ?><a href="affichcrois_detaill.php?recordID=<?php echo $row_affichcrois['id_croisiere']; ?>">&nbsp; </a> </td>
              <td><?php echo $row_affichcrois['ville_arrivee_croisiere']; ?>&nbsp; </td>
              <td><?php echo $row_affichcrois['compagnie']; ?>&nbsp; </td>
              <td><?php echo $row_affichcrois['prix_croisiere']; ?>&nbsp; </td>
              <td><a href="affichcrois_detaill.php?recordID=<?php echo $row_affichcrois['id_croisiere']; ?>">Detail</a></td>
            </tr>
            <?php } while ($row_affichcrois = mysql_fetch_assoc($affichcrois)); ?>
          </table>
        <p class="Style18">&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p></td>
    </tr>
  </table>
 </center>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<br />
</body>
</html>
<?php
mysql_free_result($affichcrois);
?>
