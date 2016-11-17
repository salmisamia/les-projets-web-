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
$query_afficher = "SELECT * FROM vol";
$afficher = mysql_query($query_afficher, $maconnexion) or die(mysql_error());
$row_afficher = mysql_fetch_assoc($afficher);
$totalRows_afficher = mysql_num_rows($afficher);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<style type="text/css">
<!--
body {
	background-image: url(../imagesite/33333.JPG);
	background-color: #FFFFFF;
}
.Style3 {	font-size: 24px;
	font-style: italic;
	font-weight: bold;
	color: #993300;
}
.Style9 {font-size: 40px}
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p><img src="../imagesite/polynesie-croisiere-archipel-bateau.jpg" alt="" width="1359" height="150" /></p>
 
 <center>
 </center>
  <table width="1314" border="0" align="center">
    <tr>
      <td width="325" height="38" bgcolor="#9900FF">
        <div align="center">
          <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','aac25','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','aac25' ); //end AC code
        </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="aac25.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="aac25.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
        </div></td>
      <td width="306" bgcolor="#9900FF"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','vol452','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','vol452' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="vol452.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="vol452.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="318" bgcolor="#9900FF"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','crois1256','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','crois1256' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="crois1256.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="crois1256.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="347" bgcolor="#9900FF"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','gerant45878','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','gerant45878' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="gerant45878.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="gerant45878.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
    </tr>
  </table>
<table width="1311" border="0" align="center" bgcolor="#00CCFF">
     <tr>
       <td width="867" height="214"><center>
           <p>
             <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','1203','height','30','align','middle','src','../text2','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0099FF','movie','../text2' ); //end AC code
             </script>
             <noscript>
             <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="1203" height="30" align="middle">
               <param name="movie" value="../text2.swf" />
               <param name="quality" value="high" />
               <param name="bgcolor" value="#0099FF" />
               <embed src="../text2.swf" width="1203" height="30" align="middle" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#0099FF"></embed>
             </object>
             </noscript>
           </p>
          <table  border="10"  bordercolor="#33FF33" bgcolor="#9933CC">
         <tr>
           <td width="100">id_vol</td>
           <td width="159">ville_depart_vol</td>
           <td width="161">ville_arrivee_vol</td>
           <td width="162">date_depart_vol</td>
           <td width="169">heure_depart_vol</td>
           <td width="159">date_retour_vol</td>
           <td width="166"><div align="left">heure_retour_vol</div></td>
           <td width="125">classe_vol</td>
           <td width="115">type_vol</td>
           <td width="128">compagnie</td>
           <td width="112">prix_vol </td>
           <td width="52">Modifier</td>
           <td width="67">suprimer</td>
         </tr>
         <?php do { ?>
         <tr>
           <td height="36"><?php echo $row_afficher['id_vol']; ?></td>
           <td><?php echo $row_afficher['ville_depart_vol']; ?></td>
           <td><?php echo $row_afficher['ville_arrivee_vol']; ?></td>
           <td><?php echo $row_afficher['date_depart_vol']; ?></td>
           <td><?php echo $row_afficher['heure_depart_vol']; ?></td>
           <td><?php echo $row_afficher['date_retour_vol']; ?></td>
           <td><div align="center"><?php echo $row_afficher['heure_retour_vol']; ?></div></td>
           <td><?php echo $row_afficher['classe_vol']; ?></td>
           <td><?php echo $row_afficher['type_vol']; ?></td>
           <td><?php echo $row_afficher['compagnie']; ?></td>
           <td><?php echo $row_afficher['prix_vol']; ?></td>
           <td><a href="modifier_vol.php?valeur=<?php echo $row_afficher['id_vol']; ?>">modifie</a></td>
           <td><a href="suprimer_vol.php?valeur=<?php echo $row_afficher['id_vol']; ?>">suprimer</a></td>
         </tr>
         <?php } while ($row_afficher = mysql_fetch_assoc($afficher)); ?>
       </table>
           <p>&nbsp;</p>
           <p>&nbsp;</p>
           <p>
             <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','aj_vol','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9933FF','movie','aj_vol' ); //end AC code
           </script>
             <noscript>
             <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
               <param name="movie" value="aj_vol.swf" />
               <param name="quality" value="high" />
               <param name="bgcolor" value="#9933FF" />
               <embed src="aj_vol.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#9933FF"></embed>
             </object>
             </noscript>
               </p>
       </center>       </td>
     </tr>
   </table>
   <p align="center">&nbsp;</p>
   <p align="center">&nbsp;</p>
  <p>&nbsp;   </p>
</form>
</body>
</html>
<?php
mysql_free_result($afficher);
?>
