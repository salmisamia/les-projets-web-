<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
include("Connections/maconnexion.php");

 $email = $_SESSION['email'];
 $pass =  $_SESSION['pass'];

 $sql = mysql_query("SELECT code_cl FROM client WHERE e_mail_cl LIKE '%$email%' AND password LIKE '%$pass%'");
  
  $_SESSION['code_cl'] = $data['code_cl'];
  


}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "connexion_client.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "connexion_client.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<style type="text/css">
<!--
body {
	background-image: url(imagesite/lesiel.JPG);
}
.Style1 {
	font-size: 36px;
	font-weight: bold;
	font-style: italic;
}
.Style2 {
	font-size: 16px;
	font-style: italic;
	font-weight: bold;
}
.Style3 {
	font-size: 30px
}
.Style5 {
	color: #9900CC
}
.Style7 {
	color: #FF33FF;
	font-size: 24px;
}
.Style8 {font-style: italic}
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p><img src="imagesite/Lastminute_Palmblatt_CHB.jpg" width="1313" height="150" /></p>

  <table width="1316" border="0" bordercolor="#99CC00" bgcolor="#33FF66">
    <tr>
      <th width="266" height="39" bgcolor="#00CC00" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','accuiel2','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#00CC00','movie','accuiel2' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
        <param name="movie" value="accuiel2.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#00CC00" />
        <embed src="accuiel2.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#00CC00"></embed>
      </object></noscript></th>
      <th width="258" bgcolor="#00CC00" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','vol2','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#00CC00','movie','vol2' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
        <param name="movie" value="vol2.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#00CC00" />
        <embed src="vol2.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#00CC00"></embed>
      </object></noscript></th>
      <th width="264" bgcolor="#00CC00" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','croisiere2','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#00CC00','movie','croisiere2' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
        <param name="movie" value="croisiere2.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#00CC00" />
        <embed src="croisiere2.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#00CC00"></embed>
      </object></noscript></th>
      <th width="232" bgcolor="#00CC00" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','resevation','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#00CC00','movie','resevation' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
        <param name="movie" value="resevation.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#00CC00" />
        <embed src="resevation.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#00CC00"></embed>
      </object></noscript></th>
      <th width="274" bgcolor="#00CC00" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','contact2','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#00CC00','movie','contact2' ); //end AC code
</script>
      <noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
        <param name="movie" value="contact2.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#00CC00" />
        <embed src="contact2.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#00CC00"></embed>
      </object></noscript></th>
    </tr>
  </table></form>
  <table width="1315" height="36" border="0">
    <tr>
      <td width="1309" bgcolor="#00FF99"><div align="center"><span class="Style1">       <marquee direction="left" scrolldelay="150" class="textblanc Style5" onmousemove="stop();" onmouseout="start();" >
        Bienvenue dans l'espace client
      </marquee>
      </span></div></td>
    </tr>
  </table>
    <table width="1312" height="384" border="0" bgcolor="#336633">
    <tr>
      <td width="420"><img src="imagesite/123.jpg" width="420" height="380" /></td>
          <td width="450"> <p align="center"><span class="Style7">vous ête dans l'espace de: </span></p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <form id="type" name="type" method="post" action="recherche/resultat_recherche.php">
              <p align="center">
         <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','318','height','58','src','rech101','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9966FF','movie','rech101' ); //end AC code
</script><noscript>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="318" height="58">
  <param name="movie" value="rech101.swf" />
  <param name="quality" value="high" />
  <param name="bgcolor" value="#9966FF" />
  <embed src="rech101.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="318" height="58" bgcolor="#9966FF"></embed>
</object>
</noscript>
       </p>
       <table width="312" height="86" border="0" align="center" bgcolor="#6666CC">
         <tr>
           <td width="143" height="24"><span class="Style8">
             <label>
             <div align="center"><strong>Type  recherche</strong></div>
             </label>
           </span></td>
           <td width="143"><select name="type" id="type">
             <option value="vol">vol</option>
             <option value="croisiere">croisiere</option>
                      </select></td>
         </tr>
         <tr>
           <td height="29"><label>
             <div align="center">
               <input type="submit" name="button2" id="button2" value="Annuler" />
              </div>
           </label></td>
           <td><label>
             <div align="center">
               <input type="submit" name="button" id="button" value="rechercher" />
              </div>
           </label></td>
         </tr>
       </table>
            <p>&nbsp;</p>
     </form>
      </td>
      <td width="420"><img src="imagesite/09336332_PVI_0001_HOME.jpg" width="420" height="380" align="right" /></td>
    </tr>
  </table>
  <div align="center"></div>
  <table width="1313" height="60" border="0">
    <tr>
      <td width="1307" height="56" bgcolor="#99FF33"><div align="right" class="Style2"><a href="<?php echo $logoutAction ?>" class="Style3">Déconnecter</a></div></td>
    </tr>
  </table>
  

<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
