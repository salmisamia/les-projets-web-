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
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="1302" height="228" border="0">
    <tr>
      <td width="1296" height="224"><p><img src="imagesite/aa_ile.JPG" alt="" width="1307" height="170" /></p>
          <div align="right">
            <p>
              <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','179','height','33','src','text3','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0099FF','movie','text3' ); //end AC code
              </script>
              <noscript>
              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="179" height="33">
                <param name="BGCOLOR" value="#0099FF" />
                <param name="movie" value="text3.swf" />
                <param name="quality" value="high" />
                <embed src="text3.swf" width="179" height="33" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#0099FF" ></embed>
              </object>
              </noscript>
            </p>
          </div></td>
    </tr>
  </table>
 <center> <table  border="0" bgcolor="#6666FF">
    <tr>
      <td width="1039" ><p align="center"><img src="imagesite/cross-sell-croisieres.jpg" alt="za" width="147" height="96" align="left" /><img src="imagesite/cross-sell-croisieres.jpg" alt="az" width="147" height="96" align="right" /></p>
          <div align="center">
            <p class="Style17 Style18">Liste des croisières disponibles</p>
        </div>
          <p>&nbsp;</p>
          <table width="794" border="1" align="center" bgcolor="#33CC66">
            <tr>
              <td><strong>Ville_depart_croisiere</strong></td>
              <td><strong>Ville_arrivee_croisiere</strong></td>
              <td><strong>Compagnie</strong></td>
              <td><strong>Prix_croisiere</strong></td>
              <td>Detail</td>
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
  </table></center>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<br />
</body>
</html>
<?php
mysql_free_result($affichcrois);
?>
