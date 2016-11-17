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
<title>accuiel</title>
<style type="text/css">
<!--
body {
	background-image: url(imagesite/gazouz.jpg);
}
.Style1 {
	font-size: 30px;
	font-style: italic;
	font-weight: bold;
}
.Style2 {
	color: #0099FF;
	font-weight: bold;
}
.Style3 {
	font-size: 24px;
	font-style: italic;
	font-weight: bold;
	color: #9966FF;
}
.Style4 {color: #6633FF}
.Style5 {
	color: #CC66FF;
	font-style: italic;
}
.Style8 {font-size: 24px; font-weight: bold; color: #CC3399; }
-->
</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
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
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Style10 {color: #3366FF}
.Style12 {
	font-size: 24px;
	font-weight: bold;
	color: #3366FF;
}
-->
</style>
<style type="text/css">
<!--
.Style15 {
	font-size: 18px;
	font-style: italic;
	font-weight: bold;
}
.Style17 {
	font-size: 18px;
	color: #0033FF;
}
.Style23 {font-size: 14px}
.Style24 {font-size: 24px}
.Style25 {color: #3006FF}
.Style26 {color: #660099}
-->
</style>
</head>
<body onload="MM_preloadImages('imagesite/cross-sell-croisieres.jpg','imagesite/1212892.jpg','imagesite/AVION NUAGE.jpg')">
<center><p><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image11','','imagesite/cross-sell-croisieres.jpg',1)"><img src="imagesite/1.jpg" name="Image11" width="432" height="210" border="0" align="middle" id="Image11" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image12','','imagesite/1212892.jpg',1)"><img src="imagesite/tunisie.jpg" name="Image12" width="432" height="210" border="0" align="middle" id="Image12" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image13','','imagesite/AVION NUAGE.jpg',1)"><img src="imagesite/1bb6ccf23c95c84c1d6b67536452d5479d934248.jpg" name="Image13" width="432" height="210" border="0" align="middle" id="Image13" /></a></p>
    <table width="1306" border="0" bordercolor="#0066FF" bgcolor="#0033FF">
      <tr>
        <th width="214" height="48" bgcolor="#0000FF" scope="col"><div align="center">
          <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','accuiel1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0000FF','movie','accuiel1' ); //end AC code
        </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
            <param name="movie" value="accuiel1.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#0000FF" />
            <embed src="accuiel1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#0000FF"></embed>
          </object>
            </noscript>
        </div></th>
        <th width="214" bgcolor="#0000FF" scope="col"><div align="center">
          <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','aavol1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0000FF','movie','aavol1' ); //end AC code
        </script>
          <noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
              <param name="movie" value="aavol1.swf" />
              <param name="quality" value="high" />
              <param name="bgcolor" value="#0000FF" />
              <embed src="aavol1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#0000FF"></embed>
            </object>
          </noscript>
        </div></th>
        <th width="214" bgcolor="#0000FF" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','croisiere','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0000FF','movie','croisiere' ); //end AC code
    </script>
            <noscript>
              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
              <param name="movie" value="croisiere.swf" />
              <param name="quality" value="high" />
              <param name="bgcolor" value="#0000FF" />
              <embed src="croisiere.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#0000FF"></embed>
            </object>
            </noscript></th>
        <th width="214" bgcolor="#0000FF" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','administrateur','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0000FF','movie','administrateur' ); //end AC code
    </script>
            <noscript>
              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
              <param name="movie" value="administrateur.swf" />
              <param name="quality" value="high" />
              <param name="bgcolor" value="#0000FF" />
              <embed src="administrateur.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#0000FF"></embed>
            </object>
            </noscript></th>
        <th width="214" bgcolor="#0000FF" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','gerant12','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0000FF','movie','gerant12' ); //end AC code
</script><noscript>
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
    <param name="movie" value="gerant12.swf" />
    <param name="quality" value="high" />
    <param name="bgcolor" value="#0000FF" />
    <embed src="gerant12.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#0000FF"></embed>
  </object>
</noscript></th>
        <th width="210" bgcolor="#0000FF" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','210','height','50','src','button2','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0000FF','movie','button2' ); //end AC code
</script><noscript>
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="210" height="50">
    <param name="movie" value="button2.swf" />
    <param name="quality" value="high" />
    <param name="bgcolor" value="#0000FF" />
    <embed src="button2.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="210" height="50" bgcolor="#0000FF"></embed>
  </object>
</noscript></th>
      </tr>
    </table>
    <table width="1305" height="44" border="0">
      <tr>
        <td width="1299" bgcolor="#00CCFF"><div align="center" class="Style1"><marquee direction="left" scrolldelay="150" class="textblanc Style4" onMouseMove="stop();" onMouseOut="start();" >Bien venue dans notre agence de voyage </marquee> 
        </div></td>
      </tr>
    </table>
   
</center>
  <center>
  </center>
  
  <table width="1313" height="303" border="0" align="center">
    <tr>
      <td width="335" height="299" bordercolor="#0066FF"><p><strong><em><span class="Style23"><span class="Style26">pour reserver il faut s'inscrire</span>  en cliquant</span> <span class="Style17"><a href="inscription.php">ici</a></span>        </em></strong></p>
        <p>
          <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','333','height','245','align','left','src','imagesite/753159','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','imagesite/753159' ); //end AC code
        </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="333" height="245" align="left">
            <param name="movie" value="imagesite/753159.swf" />
            <param name="quality" value="high" />
              
            <embed src="imagesite/753159.swf" width="333" height="245" align="left" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"></embed>
          </object>
          </noscript>
        </p></td>
      <td width="306"><p align="center">&nbsp;
          </p>
        <p align="center">
          <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','262','height','50','src','recherche/recherche','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#0099FF','movie','recherche/recherche' ); //end AC code
          </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="262" height="50">
            <param name="BGCOLOR" value="#0099FF" />
            <param name="movie" value="recherche/recherche.swf" />
            <param name="quality" value="high" />
            <embed src="recherche/recherche.swf" width="262" height="50" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#0099FF" ></embed>
          </object>
          </noscript>
        </p>
          <form action="recherche/resultat_recherche2.php" method="POST">
            <table width="304" height="114" border="0" align="center" bgcolor="#999999">
              <tr>
                <td width="127" height="43"><div align="center"><strong>Type recherche </strong></div></td>
                <td width="154"><label>
                  <select name="type" id="type">
                    <option value="vol">Vol</option>
                    <option value="croisiere">Croisiere</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td height="65"><label> </label>
                    <div align="center">
                      <input type="submit" name="button3" id="button3" value="Annuler" />
                  </div></td>
                <td><label> </label>
                    <div align="center">
                      <input type="submit" name="button2" id="button2" value="rechercher" />
                  </div></td>
              </tr>
            </table>
          </form>
        <p>&nbsp;</p>
        <p>&nbsp;</p></td>
      <td width="338"><span class="Style15">
        <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','338','height','35','src','text5','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','','movie','text5' ); //end AC code
        </script>
        <noscript>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="338" height="35">
          <param name="BGCOLOR" value="" />
          <param name="movie" value="text5.swf" />
          <param name="quality" value="high" />
          <embed src="text5.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="338" height="35" ></embed>
        </object>
        </noscript>
      </span><img src="imagesite/voys.jpg" width="338" height="226" /></td>
      <td width="316"><table width="316" height="265" border="0" align="right" bgcolor="#9999FF">
        <tr bgcolor="#99CCFF">
          <td width="310" height="254" bordercolor="#F0F0F0"><label> </label>
             
               <form action="<?php echo $loginFormAction; ?>" method="POST" name="form1" id="form1" onsubmit="MM_validateForm('e_mail_cl','','RisEmail','password','','R');return document.MM_returnValue">
                   <div align="center"><br /><span class="Style3">Pour Accéder à votre compte</span><br />
                saissez votre login et password et accéder a votre compte.<br />
                <strong>Login</strong><span id="sprytextfield1">
                  <input type="text" name="e_mail_cl" id="e_mail_cl" />
                <span class="textfieldRequiredMsg">Une valeur est requise.</span></span><br />
                <br />
                <strong>Password </strong>
                <input type="password" name="password" id="password" />
                <br />
                <br />
              </div>
            <center>
                <input type="submit" name="button" id="button" value=" Me Connecter" />
              </center>
            <div align="center"><span class="Style2"><br />
                </span><strong><a href="inscription.php" class="Style5">Ou s'inscrire maintenant</a></strong><br />
            </div>
            </form></td>
        </tr>
      </table></td>
    </tr>
  </table>
<p align="center">
    <marquee direction="left" class="textblanc" onMouseOut="start();" onMouseMove="stop();" scrolldelay="150" >
  </marquee>
  </p>
  <div align="center"></div><marquee direction="left" class="textblanc" onMouseOut="start();" onMouseMove="stop();" scrolldelay="150" >
  <table width="1239" border="0" align="center">
    <tr>
      <td width="181"><img src="imagesite/64ca822ce7b496515bbb3ff219323715a0711897.jpg" width="181" height="150" align="middle" /></td>
      <td width="197"><img src="imagesite/1772455.jpg" width="197" height="150" align="middle" /></td>
      <td width="190"><img src="imagesite/ES-olwp1.jpg" width="190" height="150" align="middle" /></td>
      <td width="17"><img src="imagesite/ile-des-seychelles_78658_pgbighd.jpg" width="194" height="150" align="middle" /></td>
      <td width="105"><img src="imagesite/savion.67743.jpg" width="191" height="150" align="middle" /></td>
      <td width="179"><img src="imagesite/k0765665.jpg" width="179" height="150" align="middle" /></td>
      <td width="177"><img src="imagesite/ile-des-seychelles_78667_pgbighd.jpg" width="177" height="150" align="middle" /></td>
    </tr>
  </table></marquee>
  <table width="1312" border="0" align="center" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
    <tr>
      <th width="213" height="29" bgcolor="#CCCCCC" scope="col"><a href="index.php" class="Style12">Accuiel</a></th>
      <th width="211" bgcolor="#CCCCCC" scope="col"><a href="vol/listevol_detaille_gerant.php" class="Style10 Style24">Vol</a></th>
      <th width="203" bgcolor="#CCCCCC" scope="col"><a href="listcrois_detaille.php" class="Style8 Style10">Croisière </a></th>
      <th width="209" bgcolor="#CCCCCC" scope="col"><a href="connexion_administrateur.php" class="Style8 Style10">Administrateur</a></th>
      <th width="219" bgcolor="#CCCCCC" scope="col"><a href="ajout_gerant/connexion_gerant.php" class="Style8 Style10">Gérant</a></th>
      <th width="231" bgcolor="#CCCCCC" scope="col"><a href="message22/envoie_message.php" class="Style8 Style10">Contact</a></th>
    </tr>
  </table>
  
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
//-->
</script>
</body>
</html>
