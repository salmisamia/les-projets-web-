<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
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
	
  $logoutGoTo = "connexion_gerant.php";
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

$MM_restrictGoTo = "connexion_gerant.php";
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
	background-image: url(../imagesite/33333.JPG);
}
.Style1 {
	font-size: 24px;
	font-weight: bold;
}
.Style14 {	font-size: 38px;
	font-style: italic;
	color: #CC0000;
}
.Style15 {
	color: #3300CC;
	font-style: italic;
	font-weight: bold;
}
.Style16 {
	font-size: 36px;
	font-style: italic;
	font-weight: bold;
	color: #00FFCC;
}
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
  <p align="center"><img src="../imagesite/polynesie-croisiere-archipel-bateau.jpg" width="1315" height="150" align="middle" /></p>
  <table width="1317" align="center" bgcolor="#9900FF">
    <tr>
      <td width="319" height="37"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','260','height','50','src','accueil3','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','accueil3' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="260" height="50">
            <param name="movie" value="accueil3.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="accueil3.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="260" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="343"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','vol3','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','vol3' ); //end AC code
      </script>
        <noscript>
              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
                <param name="movie" value="vol3.swf" />
                <param name="quality" value="high" />
                <param name="bgcolor" value="#9900FF" />
                <embed src="vol3.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
                  </object>
        </noscript>
      </div></td>
      <td width="309"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','croisiere3','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','croisiere3' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="croisiere3.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="croisiere3.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="326"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','gerant3','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','gerant3' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="gerant3.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="gerant3.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
    </tr>
  </table>
    <table width="1308" height="40" border="0" align="center" bgcolor="#9966FF">
      <tr>
        <td width="1302"><div align="center"><span class="Style16"><marquee direction="left" scrolldelay="150" class="textblanc Style4" onMouseMove="stop();" onMouseOut="start();" ><strong></strong>Bien venue dans votre espace gérant</marquee> </span></div></td>
      </tr>
  </table>
    <p><span class="Style15">Bein venue dans votre espace <?php echo $_SESSION ['MM_Username'];?></span> 
  </p>
      </p>
  <table width="419" height="239" border="0" align="center" bgcolor="#00CCFF">
    <tr>
      <td width="413" height="182" background="../imagesite/sav.67622"><div align="center"><a href="../vol/liste_vol.php" class="Style14">G&eacute;rer Vol</a></div></td>
    </tr>
  </table>
  <table width="1314" border="0" align="center" bgcolor="#00CCFF">
    <tr>
      <td width="441" height="214"><div align="center"><a href="../message22/liste_det_message.php" class="Style14">Message</a></div></td>
      <td width="416"><div align="center"><img src="../imagesite/main01.jpg" alt="" width="412" height="253" align="middle" lowsrc="connexion_gerant.php" /></div></td>
      <td width="441" background="../imagesite/distance copie.jpg"><label>
        <div align="center"><a href="../liste_client.php" class="Style14">G&eacute;rer Client</a></div>
      </label></td>
    </tr>
  </table>
  <table width="422" height="235" border="0" align="center" bgcolor="#00CCFF">
    <tr>
      <td width="417" height="163" background="../imagesite/k068 .jpg"><div align="center"><a href="../liste_croisiere.php" class="Style14">G&eacute;rer Croisiére</a></div></td>
    </tr>
  </table>
  <table width="1313" height="42" border="0" align="center" bgcolor="#9999FF">
    <tr>
      <td width="1303"><div align="right" class="Style1">
        <div align="right"><a href="<?php echo $logoutAction ?>">Déconnecter</a></div>
      </div></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
