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
$query_recherche = sprintf("SELECT * FROM croisiere WHERE ville_depart_croisiere = %s", GetSQLValueString($colname_recherche, "text"));
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
<form id="form1" name="form1" method="post" action="resultat_croisiere.php?valeur=<?php echo $row_recherche['ville_depart_croisiere']; ?>">
  <label>recherche croisiere
  <input type="text" name="valeur" id="valeur" />
  </label>
  <label>
  <input type="submit" name="button" id="button" value="rechercher" />
  </label>
</form>
</body>
</html>
<?php
mysql_free_result($recherche);
?>
