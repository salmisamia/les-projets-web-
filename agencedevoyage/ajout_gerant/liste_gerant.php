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

mysql_select_db($database_maconnexion, $maconnexion);
$query_liste_gerant = "SELECT * FROM gerant";
$liste_gerant = mysql_query($query_liste_gerant, $maconnexion) or die(mysql_error());
$row_liste_gerant = mysql_fetch_assoc($liste_gerant);
$totalRows_liste_gerant = mysql_num_rows($liste_gerant);
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
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
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
<form id="form1" name="form1" method="post" action=""><p align="center"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','../imagesite/cross-sell-croisieres.jpg',1)"><img src="../imagesite/1.jpg" name="Image1" width="425" height="230" border="0" align="middle" id="Image1" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','../imagesite/1212892.jpg',1)"><img src="../imagesite/tunisie.jpg" name="Image2" width="425" height="230" border="0" align="middle" id="Image2" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','../imagesite/AVION NUAGE.jpg',1)"><img src="../imagesite/1bb6ccf23c95c84c1d6b67536452d5479d934248.jpg" name="Image3" width="425" height="230" border="0" align="middle" id="Image3" /></a></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table border="1" bordercolor="#996699" bgcolor="#00CCFF">
    <tr>
      <td width="143">Id_gerant</td>
      <td width="158">Nom_gerant</td>
      <td width="178">Prenom_gerant</td>
      <td width="189">Date_nais_gerant</td>
      <td width="179">Num_tel_gerant</td>
      <td width="115">Login</td>
      <td width="146">Password</td>
      <td width="52">Modifier</td>
      <td width="113">Supprimer</td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_liste_gerant['id_gerant']; ?></td>
      <td><?php echo $row_liste_gerant['nom_gerant']; ?></td>
      <td><?php echo $row_liste_gerant['prenom_gerant']; ?></td>
      <td><?php echo $row_liste_gerant['date_nais_gerant']; ?></td>
      <td><?php echo $row_liste_gerant['num_tel_gerant']; ?></td>
      <td><?php echo $row_liste_gerant['login']; ?></td>
      <td><?php echo $row_liste_gerant['password']; ?></td>
      <td><a href="modifier_liste_gerant.php?valeur=<?php echo $row_liste_gerant['id_gerant']; ?>">Modifier</a></td>
      <td>Supprimer</td>
    </tr>
    <?php } while ($row_liste_gerant = mysql_fetch_assoc($liste_gerant)); ?>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
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
  </p>
  <p align="center">&nbsp;</p>
</form>
</body>
</html>
<?php
mysql_free_result($liste_gerant);
?>
