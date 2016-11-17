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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE gerant SET nom_gerant=%s, prenom_gerant=%s, date_nais_gerant=%s, num_tel_gerant=%s, login=%s, password=%s WHERE id_gerant=%s",
                       GetSQLValueString($_POST['nom_gerant'], "text"),
                       GetSQLValueString($_POST['prenom_gerant'], "text"),
                       GetSQLValueString($_POST['date_nais_gerant'], "date"),
                       GetSQLValueString($_POST['num_tel_gerant'], "int"),
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['id_gerant'], "int"));

  mysql_select_db($database_maconnexion, $maconnexion);
  $Result1 = mysql_query($updateSQL, $maconnexion) or die(mysql_error());

  $updateGoTo = "liste_gerant.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_modfgerant = "-1";
if (isset($_GET['valeur'])) {
  $colname_modfgerant = $_GET['valeur'];
}
mysql_select_db($database_maconnexion, $maconnexion);
$query_modfgerant = sprintf("SELECT * FROM gerant WHERE id_gerant = %s", GetSQLValueString($colname_modfgerant, "int"));
$modfgerant = mysql_query($query_modfgerant, $maconnexion) or die(mysql_error());
$row_modfgerant = mysql_fetch_assoc($modfgerant);
$totalRows_modfgerant = mysql_num_rows($modfgerant);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>modifier liste gerant</title>
<style type="text/css">
<!--
body {
	background-image: url(../imagesite/macw%20c.jpg);
}
.Style15 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onload="MM_preloadImages('../imagesite/cross-sell-croisieres.jpg','../imagesite/1212892.jpg','../imagesite/AVION NUAGE.jpg')">
<p align="center"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','../imagesite/cross-sell-croisieres.jpg',1)"><img src="../imagesite/1.jpg" name="Image1" width="425" height="230" border="0" align="middle" id="Image1" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','../imagesite/1212892.jpg',1)"><img src="../imagesite/tunisie.jpg" name="Image2" width="425" height="230" border="0" align="middle" id="Image2" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','../imagesite/AVION NUAGE.jpg',1)"><img src="../imagesite/1bb6ccf23c95c84c1d6b67536452d5479d934248.jpg" name="Image3" width="425" height="230" border="0" align="middle" id="Image3" /></a></p>

<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
 <center> <table width="1311" height="39" border="0" bgcolor="#0099FF">
    <tr>
      <td width="1301"><a href="../espace_administrateur.php" class="Style15">Accuiel</a></td>
    </tr>
  </table></center>
  <p>&nbsp;</p>
  <table width="378" height="197" align="center" bgcolor="#0066FF">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Nom_gerant:</strong></td>
      <td><input type="text" name="nom_gerant" value="<?php echo htmlentities($row_modfgerant['nom_gerant'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Prenom_gerant:</strong></td>
      <td><input type="text" name="prenom_gerant" value="<?php echo htmlentities($row_modfgerant['prenom_gerant'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Date_nais_gerant:</strong></td>
      <td><input type="text" name="date_nais_gerant" value="<?php echo htmlentities($row_modfgerant['date_nais_gerant'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Num_tel_gerant:</strong></td>
      <td><input type="text" name="num_tel_gerant" value="<?php echo htmlentities($row_modfgerant['num_tel_gerant'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Login:</strong></td>
      <td><input type="text" name="login" value="<?php echo htmlentities($row_modfgerant['login'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>Password:</strong></td>
      <td><input type="text" name="password" value="<?php echo htmlentities($row_modfgerant['password'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><label>
        <input type="submit" name="button" id="button" value="Annuler" />
      </label></td>
      <td><input type="submit" value="Mettre &agrave; jour l'enregistrement" /></td>
    </tr>
  </table>
  <input type="hidden" name="id_gerant" value="<?php echo $row_modfgerant['id_gerant']; ?>" />
  <input type="hidden" name="MM_update" value="form2" />
  <input type="hidden" name="id_gerant" value="<?php echo $row_modfgerant['id_gerant']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($modfgerant);
?>