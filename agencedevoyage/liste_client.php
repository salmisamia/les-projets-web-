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
$query_liste_client = "SELECT * FROM client";
$liste_client = mysql_query($query_liste_client, $maconnexion) or die(mysql_error());
$row_liste_client = mysql_fetch_assoc($liste_client);
$totalRows_liste_client = mysql_num_rows($liste_client);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<style type="text/css">
<!--
body {
	background-image: url(imagesite/33333.JPG);
	background-color: #993366;
}
.Style4 {font-size: 30px;
	color: #3366FF;
	font-weight: bold;
}
.Style5 {font-size: 30px;
	font-weight: bold;
}
.Style3 {
	font-size: 24px;
	font-style: italic;
	font-weight: bold;
	color: #993300;
}
.Style9 {font-size: 40px}
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p><img src="imagesite/polynesie-croisiere-archipel-bateau.jpg" alt="" width="1311" height="150" /></p>
  <table width="1309" height="42" border="0" align="center" bgcolor="#9900FF">
    <tr>
      <td width="334"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','button3','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','button3' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="button3.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="button3.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="276"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','vo789','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','vo789' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="vo789.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="vo789.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="325"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','croisiere75624','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','croisiere75624' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="croisiere75624.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="croisiere75624.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="356"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','gerant75642336','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','gerant75642336' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
        <param name="movie" value="gerant75642336.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#9900FF" />
        <embed src="gerant75642336.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
      </object></noscript></td>
    </tr>
  </table>
  <table width="1309" height="383" border="0" align="center" bgcolor="#00CCFF">
    <tr>
      <td width="1032" height="214"><p align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','327','height','34','src','text9','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#33FF33','movie','text9' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="327" height="34">
          <param name="movie" value="text9.swf" />
          <param name="quality" value="high" />
          <param name="bgcolor" value="#33FF33" />
          <embed src="text9.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="327" height="34" bgcolor="#33FF33"></embed>
        </object></noscript>
        <p align="center">
        <p align="center">        
        <p align="center">
        <center>  <table border="1">
        <tr>
          <td width="129"><strong>Code_cl</strong></td>
          <td width="125"><strong>Nom_cl</strong></td>
          <td width="145"><strong>Prenom_cl</strong></td>
          <td width="156"><strong>Date_nais_cl</strong></td>
          <td width="146"><strong>Num_tel_cl</strong></td>
          <td width="119"><strong>Adr_cl</strong></td>
          <td width="138"><strong>E_mail_cl</strong></td>
          <td width="140"><strong>Password</strong></td>
          <td width="72"><strong>Supprimer</strong></td>
        </tr>
        <?php do { ?>
        <tr>
          <td height="34"><?php echo $row_liste_client['code_cl']; ?></td>
          <td><?php echo $row_liste_client['nom_cl']; ?></td>
          <td><?php echo $row_liste_client['prenom_cl']; ?></td>
          <td><?php echo $row_liste_client['date_nais_cl']; ?></td>
          <td><?php echo $row_liste_client['num_tel_cl']; ?></td>
          <td><?php echo $row_liste_client['adr_cl']; ?></td>
          <td><?php echo $row_liste_client['e_mail_cl']; ?></td>
          <td><?php echo $row_liste_client['password']; ?></td>
          <td><strong><a href="./?<?php echo $row_liste_client['code_cl']; ?>=">Supprimer</a></strong></td>
        </tr>
        <?php } while ($row_liste_client = mysql_fetch_assoc($liste_client)); ?>
      </table>
    </center>      
      <p>&nbsp;</p></td>
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
mysql_free_result($liste_client);
?>