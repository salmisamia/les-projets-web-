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
  $MM_redirectLoginSuccess = "espace_gerant.php";
  $MM_redirectLoginFailed = "#";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_maconnexion, $maconnexion);
  
  $LoginRS__query=sprintf("SELECT login, password FROM gerant WHERE login=%s AND password=%s",
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
	background-color: #CC99CC;
	background-image: url(../imagesite/33333.JPG);
}
.Style3 {	font-size: 20px;
	font-style: italic;
	font-weight: bold;
}
.Style4 {	font-size: 30px;
	color: #3366FF;
	font-weight: bold;
}
.Style5 {	font-size: 30px;
	font-weight: bold;
}
.Style6 {font-size: 18px}
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
//-->
</script>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<form action="<?php echo $loginFormAction; ?>" method="POST" name="form1" id="form1" onsubmit="MM_validateForm('login','','RisEmail','password','','R');return document.MM_returnValue">
  <label></label>
  <p>
    <label></label>
  <center> <img src="../imagesite/polynesie-croisiere-archipel-bateau.jpg" alt="" width="1327" height="159" />
  </center></p>
  
  <table width="1313" height="42" border="0" align="center" bgcolor="#9900FF">
    <tr>
      <td width="212"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','accu78','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','accu78' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
        <param name="movie" value="accu78.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#9900FF" />
        <embed src="accu78.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
      </object></noscript></td>
      <td width="268"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','vol756','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','vol756' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="vol756.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="vol756.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="362"><div align="center">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','crois156','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','crois156' ); //end AC code
      </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
            <param name="movie" value="crois156.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#9900FF" />
            <embed src="crois156.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
          </object>
          </noscript>
      </div></td>
      <td width="453"><div align="center" class="Style5">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','crois7539','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#9900FF','movie','crois7539' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
          <param name="movie" value="crois7539.swf" />
          <param name="quality" value="high" />
          <param name="bgcolor" value="#9900FF" />
          <embed src="crois7539.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#9900FF"></embed>
        </object>
      </noscript></div></td>
    </tr>
  </table>
  <p align="center">      <span class="Style3">Veuillez insérer votre Login et votre  password</span></p>
  <table width="388" height="155" border="5" align="center" bordercolor="#CC33FF" bgcolor="#0099FF">
    <tr>
      <td width="90"><span class="Style6"><strong>
        <label>        </label>
      </strong>        
          <label></label>
      </span>        <label><div align="center" class="Style6"><strong>login</strong></div>
      </label></td>
      <td width="225"><div align="center">
        <input type="text" name="login" id="login" />
      </div></td>
    </tr>
    <tr>
      <td><span class="Style6"><strong>
        <label>        </label>
      </strong>        
          <label></label>
      </span>        <label><div align="center" class="Style6">
        <div align="center"><strong>password</strong></div>
      </div>
      </label></td>
      <td>
        
        <div align="center">
          <input type="password" name="password" id="password" />
        </div></td>
    </tr>
    <tr>
      <td><div align="center" class="Style6">
        <input type="reset" name="button2" id="button2" value="Annuler" />
      </div></td>
      <td><div align="center">
        <span class="Style6"><strong>
        <input type="submit" name="button" id="button" value="Connecter" />
        </strong></span></div></td>
    </tr>
  </table>
  <p>&nbsp; </p>
</form>
</body>
</html>
