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

$colname_recherche = "-1";
if (isset($_POST['valeur'])) {
  $colname_recherche = $_POST['valeur'];
}
mysql_select_db($database_maconnexion, $maconnexion);
$query_recherche = sprintf("SELECT * FROM croisiere WHERE ville_depart_croisiere LIKE %s", GetSQLValueString("%" . $colname_recherche . "%", "text"));
$recherche = mysql_query($query_recherche, $maconnexion) or die(mysql_error());
$row_recherche = mysql_fetch_assoc($recherche);
$totalRows_recherche = mysql_num_rows($recherche);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<table border="1">
  <tr>
    <td>id_croisiere</td>
    <td>ville_depart_croisiere</td>
    <td>ville_arrivee_croisiere</td>
    <td>date_depart_croisiere</td>
    <td>heure_depart_croisiere</td>
    <td>date_retour_croisiere</td>
    <td>heure_retour_croisiere</td>
    <td>compagnie</td>
    <td>prix_croisiere</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_recherche['id_croisiere']; ?></td>
      <td><?php echo $row_recherche['ville_depart_croisiere']; ?></td>
      <td><?php echo $row_recherche['ville_arrivee_croisiere']; ?></td>
      <td><?php echo $row_recherche['date_depart_croisiere']; ?></td>
      <td><?php echo $row_recherche['heure_depart_croisiere']; ?></td>
      <td><?php echo $row_recherche['date_retour_croisiere']; ?></td>
      <td><?php echo $row_recherche['heure_retour_croisiere']; ?></td>
      <td><?php echo $row_recherche['compagnie']; ?></td>
      <td><?php echo $row_recherche['prix_croisiere']; ?></td>
    </tr>
    <?php } while ($row_recherche = mysql_fetch_assoc($recherche)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($recherche);
?>
