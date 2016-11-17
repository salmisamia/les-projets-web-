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

$maxRows_affichageclient = 10;
$pageNum_affichageclient = 0;
if (isset($_GET['pageNum_affichageclient'])) {
  $pageNum_affichageclient = $_GET['pageNum_affichageclient'];
}
$startRow_affichageclient = $pageNum_affichageclient * $maxRows_affichageclient;

mysql_select_db($database_maconnexion, $maconnexion);
$query_affichageclient = "SELECT * FROM client";
$query_limit_affichageclient = sprintf("%s LIMIT %d, %d", $query_affichageclient, $startRow_affichageclient, $maxRows_affichageclient);
$affichageclient = mysql_query($query_limit_affichageclient, $maconnexion) or die(mysql_error());
$row_affichageclient = mysql_fetch_assoc($affichageclient);

if (isset($_GET['totalRows_affichageclient'])) {
  $totalRows_affichageclient = $_GET['totalRows_affichageclient'];
} else {
  $all_affichageclient = mysql_query($query_affichageclient);
  $totalRows_affichageclient = mysql_num_rows($all_affichageclient);
}
$totalPages_affichageclient = ceil($totalRows_affichageclient/$maxRows_affichageclient)-1;

$queryString_affichageclient = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_affichageclient") == false && 
        stristr($param, "totalRows_affichageclient") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_affichageclient = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_affichageclient = sprintf("&totalRows_affichageclient=%d%s", $totalRows_affichageclient, $queryString_affichageclient);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<table border="1" align="center">
  <tr>
    <td>nom_cl</td>
    <td>prenom_cl</td>
    <td>adr_cl</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><a href="afficage_detaille_client.php?recordID=<?php echo $row_affichageclient['code_cl']; ?>"> <?php echo $row_affichageclient['nom_cl']; ?>&nbsp; </a> </td>
      <td><?php echo $row_affichageclient['prenom_cl']; ?>&nbsp; </td>
      <td><?php echo $row_affichageclient['adr_cl']; ?>&nbsp; </td>
    </tr>
    <?php } while ($row_affichageclient = mysql_fetch_assoc($affichageclient)); ?>
</table>
<br />
<table border="0">
  <tr>
    <td><?php if ($pageNum_affichageclient > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_affichageclient=%d%s", $currentPage, 0, $queryString_affichageclient); ?>">Premier</a>
          <?php } // Show if not first page ?>
    </td>
    <td><?php if ($pageNum_affichageclient > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_affichageclient=%d%s", $currentPage, max(0, $pageNum_affichageclient - 1), $queryString_affichageclient); ?>">Précédent</a>
          <?php } // Show if not first page ?>
    </td>
    <td><?php if ($pageNum_affichageclient < $totalPages_affichageclient) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_affichageclient=%d%s", $currentPage, min($totalPages_affichageclient, $pageNum_affichageclient + 1), $queryString_affichageclient); ?>">Suivant</a>
          <?php } // Show if not last page ?>
    </td>
    <td><?php if ($pageNum_affichageclient < $totalPages_affichageclient) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_affichageclient=%d%s", $currentPage, $totalPages_affichageclient, $queryString_affichageclient); ?>">Dernier</a>
          <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
Enregistrements <?php echo ($startRow_affichageclient + 1) ?> à <?php echo min($startRow_affichageclient + $maxRows_affichageclient, $totalRows_affichageclient) ?> sur <?php echo $totalRows_affichageclient ?>
</body>
</html>
<?php
mysql_free_result($affichageclient);
?>
