<?php require_once('Connections/maconnexion.php'); ?>
<?php
   session_start();
   if(isset($_SESSION["login"]))
     {
      unset ($_SESSION["login"]);
     }
?>
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['login'])) {
  $loginUsername=$_POST['login'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "espace_administrateur.php";
  $MM_redirectLoginFailed = "#";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_maconnexion, $maconnexion);
  
  $LoginRS__query=sprintf("SELECT login, password FROM administrateur WHERE login=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $maconnexion) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
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
	background-image: url(imagesite/macw%20c.jpg);
}
.Style3 {
	font-size: 20px;
	font-style: italic;
	font-weight: bold;
}
.Style4 {color: #6633FF}
.Style8 {font-size: 24px; font-weight: bold; color: #CC3399; }
.Style9 {color: #FF33FF}
-->
</style>
<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
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

<body onload="MM_preloadImages('imagesite/1772455.jpg','imagesite/1212892.jpg','imagesite/AVION NUAGE copie.jpg')">
<form ACTION="<?php echo $loginFormAction; ?>" method="POST" name="form1" id="form1" onsubmit="MM_validateForm('login','','RisEmail','password','','R');return document.MM_returnValue">
  <label></label>
<p>
  <label></label>
</p>
<p align="center">  <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','imagesite/1772455.jpg',1)"></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','imagesite/AVION NUAGE copie.jpg',1)"></a></p>
<p align="center"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image55','','imagesite/1212892.jpg',1)"></a></p>
<center>
<p><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','imagesite/1772455.jpg',1)"><img src="imagesite/1.jpg" alt="" name="Image4" width="430" height="231" border="0" align="middle" id="Image4" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','imagesite/1772455.jpg',1)"></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','imagesite/1212892.jpg',1)"><img src="imagesite/tunisie.jpg" alt="" name="Image6" width="425" height="231" border="0" align="middle" id="Image6" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','imagesite/1212892.jpg',1)"></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','imagesite/AVION NUAGE copie.jpg',1)"><img src="imagesite/1bb6ccf23c95c84c1d6b67536452d5479d934248.jpg" alt="" name="Image5" width="437" height="231" border="0" align="middle" id="Image5" /></a></p>
<table width="1315" border="0" bordercolor="#0066FF" bgcolor="#0033FF">
  <tr>
    <th width="214" height="48" bgcolor="#0000FF" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','accuiel1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0000FF','movie','accuiel1' ); //end AC code
       </script>
        <noscript>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
          <param name="movie" value="accuiel1.swf" />
          <param name="quality" value="high" />
          <param name="bgcolor" value="#0000FF" />
          <embed src="accuiel1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#0000FF"></embed>
        </object>
      </noscript></th>
    <th width="214" bgcolor="#0000FF" scope="col"><div align="center">
      <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','avol1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0000FF','movie','avol1' ); //end AC code
    </script>
      <noscript>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
          <param name="movie" value="avol1.swf" />
          <param name="quality" value="high" />
          <param name="bgcolor" value="#0000FF" />
          <embed src="avol1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#0000FF"></embed>
        </object>
        </noscript>
    </div></th>
    <th width="214" bgcolor="#0000FF" scope="col"><div align="center">
      <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','croisiere','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0000FF','movie','croisiere' ); //end AC code
    </script>
      <noscript>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
          <param name="movie" value="croisiere.swf" />
          <param name="quality" value="high" />
          <param name="bgcolor" value="#0000FF" />
          <embed src="croisiere.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#0000FF"></embed>
          </object>
        </noscript>
    </div></th>
    <th width="214" bgcolor="#0000FF" scope="col"><div align="center">
      <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','administrateur','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0000FF','movie','administrateur' ); //end AC code
    </script>
      <noscript>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
          <param name="movie" value="administrateur.swf" />
          <param name="quality" value="high" />
          <param name="bgcolor" value="#0000FF" />
          <embed src="administrateur.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#0000FF"></embed>
          </object>
        </noscript>
    </div></th>
    <th width="214" bgcolor="#0000FF" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','Gerant1546','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0000FF','movie','Gerant1546' ); //end AC code
</script><noscript>
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
    <param name="movie" value="Gerant1546.swf" />
    <param name="quality" value="high" />
    <param name="bgcolor" value="#0000FF" />
    <embed src="Gerant1546.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#0000FF"></embed>
  </object>
</noscript></th>
    <th width="219" bgcolor="#0000FF" scope="col"><div align="center">
      <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','contact','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0000FF','movie','contact' ); //end AC code
    </script>
      <noscript>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
          <param name="movie" value="contact.swf" />
          <param name="quality" value="high" />
          <param name="bgcolor" value="#0000FF" />
          <embed src="contact.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#0000FF"></embed>
          </object>
        </noscript>
    </div></th>
  </tr>
</table>
<p>&nbsp;</p>
</center>
  <p align="center" class="Style3">
    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','566','height','32','src','text4','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0033FF','movie','text4' ); //end AC code
</script><noscript>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="566" height="32">
  <param name="BGCOLOR" value="#0033FF" />
  <param name="movie" value="text4.swf" />
  <param name="quality" value="high" />
  <embed src="text4.swf" width="566" height="32" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#0033FF" ></embed>
</object>
</noscript>
  </p>
  <table width="394" height="166" border="8" align="center" bordercolor="#0000FF" bgcolor="#6600FF" onfocus="MM_validateForm('login','','RisEmail','password','','R');return document.MM_returnValue">
    <tr>
      <td width="127">        <label><strong>Login</strong></label>      </td>
      <td width="237"><input type="text" name="login" id="login" /></td>
    </tr>
    <tr>
      <td><label><strong>password</strong></label></td>
      <td><input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
      <td><input type="submit" name="button" id="button" value="Connexion" /></td>
      <td><input type="reset" name="button2" id="button2" value="Annuler" /></td>
    </tr>
  </table>
  <p>&nbsp; </p>
</form>
</body>
</html>
