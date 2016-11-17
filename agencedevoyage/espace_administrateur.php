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
	
  $logoutGoTo = "connexion_administrateur.php";
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

$MM_restrictGoTo = "connexion_administrateur.php";
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
<title>espace_administrateur</title>
<style type="text/css">
<!--
body {
	background-image: url(imagesite/macw%20c.jpg);
}
.Style1 {
	font-size: 24px;
	font-style: italic;
	font-weight: bold;
}
.Style2 {font-size: 30px;
	font-style: italic;
	font-weight: bold;
}
.Style3 {color: #00FF66}
.Style10 {color: #3300FF}
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
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body onload="MM_preloadImages('imagesite/cross-sell-croisieres.jpg')">
<p>
<center>
  <p><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','imagesite/cross-sell-croisieres.jpg',1)"><img src="imagesite/1.jpg" name="Image6" width="425" height="229" border="0" align="middle" id="Image6" /></a><img src="imagesite/tunisie.jpg" alt="bbb" width="439" height="231" align="middle" />
      <img src="imagesite/1bb6ccf23c95c84c1d6b67536452d5479d934248.jpg" alt="ccc" width="448" height="228" align="middle" /></p>
  <p>&nbsp;  </p>
</center>
</p>
<table width="1314" height="44" border="0" align="center">
  <tr>
    <td width="1308" bgcolor="#00CCFF"><div align="center" class="Style2">
      <marquee direction="left" class="textblanc" onmouseout="start();" onmousemove="stop();" scrolldelay="150" >
        </marquee>
      <div align="center"><span class="Style1"><marquee direction="left" scrolldelay="150" class="textblanc Style3" onMouseMove="stop();" onMouseOut="start();" >Bien venue dans l'espace administrateur</marquee>
       </span></div>
    </div></td>
  </tr>
</table><center>
</center>
<table width="1314" height="180" border="0" align="center" bgcolor="#003399">
  <tr>
    <td width="456"><img src="imagesite/123.PNG" width="460" height="281" /></td>
    <td width="384"><form id="form1" name="form1" method="post" action="">
      <p>&nbsp;</p>
      <p><table width="375" height="107" border="0" align="center">
  <tr>
    <td width="316" bgcolor="#00CCCC"><div align="center" class="Style1"><a href="ajout_gerant/liste_gerant.php">Gerer les gérant</a></div></td>
  </tr>
  <tr>
    <td bordercolor="#009999" bgcolor="#00CCcc"><div align="center" class="Style1"><a href="changemaent/cha_pw_admin.php">Changer mot de passe</a></div></td>
  </tr>
</table>
 </p>
<p>&nbsp;</p>
    </form>    </td>
    <td width="460"><img src="imagesite/7710075-computer-mouse-toy-airplane-passport-and-keyboard-placed-on-a-white-tabletop.jpg" width="460" height="280" /></td>
  </tr>
</table>
<center>
</center>
<div align="center" class="Style2">
  <marquee direction="left" class="textblanc" onmouseout="start();" onmousemove="stop();" scrolldelay="150" >
  </marquee>
  <div align="right"></div>
</div>
<table width="1314" height="44" border="0" align="center">
  <tr>
    <td width="1320" bgcolor="#00CCCC"><div align="center" class="Style2">
      <marquee direction="left" class="textblanc" onmouseout="start();" onmousemove="stop();" scrolldelay="150" >
      </marquee>
      
      <div align="right"><a href="<?php echo $logoutAction ?>">Déconnecter</a></div>
    </div></td>
  </tr>
</table>
<table width="1314" border="0" align="center" bordercolor="#0000FF">
  <tr>
    <th width="214" height="29" bgcolor="#999999" scope="col"><a href="espace_administrateur.php" class="Style10">Accuiel</a></th>
    <th width="212" bgcolor="#999999" scope="col"><a href="vol/liste_vol.php" class="Style10">Vol</a></th>
    <th width="205" bgcolor="#999999" scope="col"><a href="liste_croisiere.php" class="Style10">Croisière </a></th>
    <th width="195" bgcolor="#999999" scope="col"><a href="espace_administrateur.php" class="Style10">Administrateur</a></th>
    <th width="220" bgcolor="#999999" scope="col"><span class="Style10">Gérant</span></th>
    <th width="242" bgcolor="#999999" scope="col"><span class="Style10">Contact</span></th>
  </tr>
</table>
</body>
</html>
