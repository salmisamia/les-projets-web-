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

$maxRows_affichegerant = 10;
$pageNum_affichegerant = 0;
if (isset($_GET['pageNum_affichegerant'])) {
  $pageNum_affichegerant = $_GET['pageNum_affichegerant'];
}
$startRow_affichegerant = $pageNum_affichegerant * $maxRows_affichegerant;

mysql_select_db($database_maconnexion, $maconnexion);
$query_affichegerant = "SELECT * FROM gerant";
$query_limit_affichegerant = sprintf("%s LIMIT %d, %d", $query_affichegerant, $startRow_affichegerant, $maxRows_affichegerant);
$affichegerant = mysql_query($query_limit_affichegerant, $maconnexion) or die(mysql_error());
$row_affichegerant = mysql_fetch_assoc($affichegerant);

if (isset($_GET['totalRows_affichegerant'])) {
  $totalRows_affichegerant = $_GET['totalRows_affichegerant'];
} else {
  $all_affichegerant = mysql_query($query_affichegerant);
  $totalRows_affichegerant = mysql_num_rows($all_affichegerant);
}
$totalPages_affichegerant = ceil($totalRows_affichegerant/$maxRows_affichegerant)-1;

$queryString_affichegerant = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_affichegerant") == false && 
        stristr($param, "totalRows_affichegerant") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_affichegerant = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_affichegerant = sprintf("&totalRows_affichegerant=%d%s", $totalRows_affichegerant, $queryString_affichegerant);

$currentPage = $_SERVER["PHP_SELF"];

$queryString_aff = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_aff") == false && 
        stristr($param, "totalRows_aff") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_aff = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_aff = sprintf("&totalRows_aff=%d%s", $totalRows_aff, $queryString_aff);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<br />
<table border="1" align="center">
  <tr>
    <td>nom_gerant</td>
    <td>prenom_gerant</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><a href="affichage_detaill.php?recordID=<?php echo $row_affichegerant['id_gerant']; ?>"> <?php echo $row_affichegerant['nom_gerant']; ?>&nbsp; </a> </td>
      <td><?php echo $row_affichegerant['prenom_gerant']; ?>&nbsp; </td>
    </tr>
    <?php } while ($row_affichegerant = mysql_fetch_assoc($affichegerant)); ?>
</table>
<br />
<table border="0">
  <tr>
    <td><?php if ($pageNum_affichegerant > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_affichegerant=%d%s", $currentPage, 0, $queryString_affichegerant); ?>">Premier</a>
          <?php } // Show if not first page ?>
    </td>
    <td><?php if ($pageNum_affichegerant > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_affichegerant=%d%s", $currentPage, max(0, $pageNum_affichegerant - 1), $queryString_affichegerant); ?>">Précédent</a>
          <?php } // Show if not first page ?>
    </td>
    <td><?php if ($pageNum_affichegerant < $totalPages_affichegerant) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_affichegerant=%d%s", $currentPage, min($totalPages_affichegerant, $pageNum_affichegerant + 1), $queryString_affichegerant); ?>">Suivant</a>
          <?php } // Show if not last page ?>
    </td>
    <td><?php if ($pageNum_affichegerant < $totalPages_affichegerant) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_affichegerant=%d%s", $currentPage, $totalPages_affichegerant, $queryString_affichegerant); ?>">Dernier</a>
          <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
Enregistrements <?php echo ($startRow_affichegerant + 1) ?> à <?php echo min($startRow_affichegerant + $maxRows_affichegerant, $totalRows_affichegerant) ?> sur <?php echo $totalRows_affichegerant ?>
</body>
</html>
<?php
mysql_free_result($affichegerant);
?>