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

mysql_select_db($database_maconnexion, $maconnexion);
$query_afficher4 = "SELECT * FROM croisiere";
$afficher4 = mysql_query($query_afficher4, $maconnexion) or die(mysql_error());
$row_afficher4 = mysql_fetch_assoc($afficher4);
$totalRows_afficher4 = mysql_num_rows($afficher4);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<style type="text/css">
<!--
body {
	background-image: url(imagesite/33333.JPG);
	background-color: #FFFFFF;
}
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p align="center"><img src="imagesite/polynesie-croisiere-archipel-bateau.jpg" alt="" width="1312" height="150" align="middle" /></p>
  <table width="1311" border="0" align="center" bgcolor="#00CCFF">
    <tr>
      <td width="867" height="214"><p align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','299','height','26','src','text8','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0099FF','movie','text8' ); //end AC code
</script><noscript>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="299" height="26">
  <param name="movie" value="text8.swf" />
  <param name="quality" value="high" />
  <param name="bgcolor" value="#0099FF" />
  <embed src="text8.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="299" height="26" bgcolor="#0099FF"></embed>
</object>
</noscript>
      </p>
      <table border="2" align="center" bordercolor="#3366FF" bgcolor="#CC66FF">
        <tr>
          <td width="141"><strong>id_croisiere</strong></td>
          <td width="200"><strong>ville_depart_croisiere</strong></td>
          <td width="202"><strong>ville_arrivee_croisiere</strong></td>
          <td width="203"><strong>date_depart_croisiere</strong></td>
          <td width="210"><strong>heure_depart_croisiere</strong></td>
          <td width="200"><strong>date_retour_croisiere</strong></td>
          <td width="207"><strong>heure_retour_croisiere</strong></td>
          <td width="136"><strong>compagnie</strong></td>
          <td width="153"><strong>prix_croisiere</strong></td>
          <td width="55"><strong>Modifer</strong></td>
          <td width="66"><strong>suprimer</strong></td>
        </tr>
        <?php do { ?>
        <tr>
          <td height="43"><?php echo $row_afficher4['id_croisiere']; ?></td>
          <td><?php echo $row_afficher4['ville_depart_croisiere']; ?></td>
          <td><?php echo $row_afficher4['ville_arrivee_croisiere']; ?></td>
          <td><?php echo $row_afficher4['date_depart_croisiere']; ?></td>
          <td><?php echo $row_afficher4['heure_depart_croisiere']; ?></td>
          <td><?php echo $row_afficher4['date_retour_croisiere']; ?></td>
          <td><?php echo $row_afficher4['heure_retour_croisiere']; ?></td>
          <td><?php echo $row_afficher4['compagnie']; ?></td>
          <td><?php echo $row_afficher4['prix_croisiere']; ?></td>
          <td><a href="modifie_croisiere.php?valeur=<?php echo $row_afficher4['id_croisiere']; ?>">modifier</a></td>
          <td><a href="suprimer_croisier.php?valeur=<?php echo $row_afficher4['id_croisiere']; ?>">suprimer</a></td>
        </tr>
        <?php } while ($row_afficher4 = mysql_fetch_assoc($afficher4)); ?>
      </table>
      <p align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','button1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','button1' ); //end AC code
</script><noscript>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
  <param name="movie" value="button1.swf" />
  <param name="quality" value="high" />
  <param name="bgcolor" value="#9900FF" />
  <embed src="button1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#9900FF"></embed>
</object>
</noscript>
      </p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($afficher4);
?>
