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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_affvol = 10;
$pageNum_affvol = 0;
if (isset($_GET['pageNum_affvol'])) {
  $pageNum_affvol = $_GET['pageNum_affvol'];
}
$startRow_affvol = $pageNum_affvol * $maxRows_affvol;

mysql_select_db($database_maconnexion, $maconnexion);
$query_affvol = "SELECT * FROM vol";
$query_limit_affvol = sprintf("%s LIMIT %d, %d", $query_affvol, $startRow_affvol, $maxRows_affvol);
$affvol = mysql_query($query_limit_affvol, $maconnexion) or die(mysql_error());
$row_affvol = mysql_fetch_assoc($affvol);

if (isset($_GET['totalRows_affvol'])) {
  $totalRows_affvol = $_GET['totalRows_affvol'];
} else {
  $all_affvol = mysql_query($query_affvol);
  $totalRows_affvol = mysql_num_rows($all_affvol);
}
$totalPages_affvol = ceil($totalRows_affvol/$maxRows_affvol)-1;

$queryString_affvol = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_affvol") == false && 
        stristr($param, "totalRows_affvol") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_affvol = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_affvol = sprintf("&totalRows_affvol=%d%s", $totalRows_affvol, $queryString_affvol);
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
.Style17 {
	font-size: 36px;
	font-style: italic;
	font-weight: bold;
	color: #99FF66;
}
.Style18 {
	color: #0033FF;
	font-size: 30px;
}
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<br />
<form id="form1" name="form1" method="post" action="">
 <center>
   <table width="1315" height="160" border="0">
     <tr>
       <td width="1305" height="156" background="../imagesite/aabbb.jpg">&nbsp;</td>
     </tr>
   </table> <table width="1305" height="44" border="0">
      <tr>
        <td width="1299" bgcolor="#00CCFF"><div align="center" class="Style1"><marquee direction="left" scrolldelay="150" class="textblanc Style4 Style18" onMouseMove="stop();" onMouseOut="start();" >
          <strong>          <em>Bien venue dans notre agence de voyage </em>          </strong>
        </marquee>
        </div></td>
      </tr>
    </table>
 </center>
  <center><table  border="0" bgcolor="#3366FF">
    <tr>    
      <td width="1003" ><p align="center"><img src="../imagesite/11641174-avion-ciel-et-les-nuages.jpg" width="147" height="96" align="left" /><img src="../imagesite/11641174-avion-ciel-et-les-nuages.jpg" alt="" width="147" height="96" align="right" /></p>
        <div align="center">
          <p class="Style17">Liste des vols disponibles</p>
        </div>
        <p align="center"><span class="Style1">
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="200" height="40">
            <param name="movie" value="button4.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#0066FF" />
            <embed src="button4.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="200" height="40" bgcolor="#0066FF"></embed>
          </object>
        </span></p>
        <p>&nbsp;</p>
        <table width="656" height="102" border="1" align="center" bgcolor="#CC66FF">
        <tr>
          <td width="158"><strong>ville_depart_vol</strong></td>
          <td width="160"><strong>ville_arrivee_vol</strong></td>
          <td width="113"><strong>type_vol</strong></td>
          <td width="125"><strong>compagnie</strong></td>
          <td width="66">Detaille</td>
          </tr>
        <?php do { ?>
        <tr>
          <td> <?php echo $row_affvol['ville_depart_vol']; ?>  </td>
          <td><?php echo $row_affvol['ville_arrivee_vol']; ?>&nbsp; </td>
          <td><?php echo $row_affvol['type_vol']; ?>&nbsp; </td>
          <td><?php echo $row_affvol['compagnie']; ?>&nbsp; </td>
          <td><a href="affich_detaillvol.php?recordID=<?php echo $row_affvol['id_vol']; ?>">Detaille</a></td>
          </tr>
        <?php } while ($row_affvol = mysql_fetch_assoc($affvol)); ?>
      </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p></td>
    </tr>
  </table>
  </center>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php
mysql_free_result($affvol);
?>