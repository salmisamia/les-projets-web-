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

if (isset($_POST['e_mail_cl'])) {
  $loginUsername=$_POST['e_mail_cl'];
  $password=$_POST['password'];
  $_SESSION['email'] = $_POST['e_mail_cl'];
  $_SESSION['pass'] = $_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "espace_client.php";
  $MM_redirectLoginFailed = "#";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_maconnexion, $maconnexion);
  
  $LoginRS__query=sprintf("SELECT e_mail_cl, password FROM client WHERE e_mail_cl=%s AND password=%s",
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
<style type="text/css">
<!--
body {
	background-color: #00FF99;
	background-image: url(imagesite/lesiel.JPG);
}
.Style5 {font-size: 18px}
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<form ACTION="<?php echo $loginFormAction; ?>" method="POST" name="form1" id="form1" onsubmit="MM_validateForm('e_mail_cl','','RisEmail','password','','R');return document.MM_returnValue">
  <label></label>
  <p>
    <label></label>
   <center> <img src="imagesite/Lastminute_Palmblatt_CHB.jpg" alt="" width="1311" height="150" />
    </center></p>
  
  <center><table width="1310" border="0" bordercolor="#FFFFFF" bgcolor="#00FF00"><tr><th width="252" height="58" bgcolor="#FFFFFF" scope="col"><table width="1310" border="0" bordercolor="#FFFFFF" bgcolor="#00FF00">
    <tr>
      <th width="254" height="36" bgcolor="#00FF00" scope="col"><span class="Style5">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','acc89','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#00FF33','movie','acc89' ); //end AC code
  </script>
        <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
          <param name="movie" value="acc89.swf" />
          <param name="quality" value="high" />
          <param name="bgcolor" value="#00FF33" />
          <embed src="acc89.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#00FF33"></embed>
        </object>
          </noscript>
      </span></th>
      <th width="252" bgcolor="#00FF00" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','vol56','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#00FF00','movie','vol56' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
        <param name="movie" value="vol56.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#00FF00" />
        <embed src="vol56.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#00FF00"></embed>
      </object></noscript></th>
      <th width="254" bgcolor="#00FF00" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','crois4595','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#00FF00','movie','crois4595' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
        <param name="movie" value="crois4595.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#00FF00" />
        <embed src="crois4595.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#00FF00"></embed>
      </object></noscript></th>
      <th width="262" bgcolor="#00FF00" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','resr125','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#00FF00','movie','resr125' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
        <param name="movie" value="resr125.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#00FF00" />
        <embed src="resr125.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#00FF00"></embed>
      </object></noscript></th>
      <th width="266" bgcolor="#00FF00" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','250','height','50','src','contact57456','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#00FF00','movie','contact57456' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="50">
        <param name="movie" value="contact57456.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#00FF00" />
        <embed src="contact57456.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="50" bgcolor="#00FF00"></embed>
      </object></noscript></th>
    </tr>
  </table>    <span class="Style5"></span></th>
      </tr>
  </table>
  </center>
  <p align="center">
    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','435','height','32','src','text12','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0066FF','movie','text12' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="435" height="32">
      <param name="movie" value="text12.swf" />
      <param name="quality" value="high" />
      <param name="bgcolor" value="#0066FF" />
      <embed src="text12.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="435" height="32" bgcolor="#0066FF"></embed>
    </object></noscript>
  </p>
  <table width="420" height="179" border="5" align="center" bordercolor="#33FF00" bgcolor="#3333CC">
    <tr>
      <td width="89" height="50" bgcolor="#00FFCC"><div align="center"><strong>E_mail</strong></div></td>
      <td width="307" bgcolor="#00FFCC"><div align="center">
        <h2>
          <input type="text" name="e_mail_cl" id="e_mail_cl" />
        </h2>
      </div></td>
    </tr>
    <tr>
      <td height="53" bgcolor="#00FFCC"><strong>
        <label>        </label>
      </strong>        <label><div align="center"><strong>password</strong></div>
      </label></td>
      <td bgcolor="#00FFCC"><div align="center">
        <input type="password" name="password" id="password" />
      </div></td>
    </tr>
    <tr>
      <td height="58" bgcolor="#00FFCC"><div align="center">
        <input type="submit" name="button" id="button" value="connecter" />
      </div></td>
      <td bgcolor="#00FFCC"><div align="center">
        <input type="reset" name="button2" id="button2" value="annuler" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
