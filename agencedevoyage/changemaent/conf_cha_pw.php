<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<style type="text/css">
<!--
body {
	background-image: url(../imagesite/bg_2.jpg);
}
.Style1 {
	font-size: 24px;
	font-weight: bold;
	font-style: italic;
}
.Style2 {
	color: #FF66CC;
	font-style: italic;
	font-weight: bold;
}
.Style3 {
	font-size: 36px;
	font-style: italic;
	font-weight: bold;
	color: #33FF00;
}
.Style4 {color: #33FF00}
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>




          <p><br />
          </p>
<form id="form1" name="form1" method="post" action="">
            <p align="center" class="Style3">
              <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','599','height','47','src','text3','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#CCCCCC','movie','text3' ); //end AC code
</script><noscript>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="599" height="47">
  <param name="movie" value="text3.swf" />
  <param name="quality" value="high" />
  <param name="bgcolor" value="#CCCCCC" />
  <embed src="text3.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="599" height="47" bgcolor="#CCCCCC"></embed>
</object>
</noscript>
            </p>
            <p align="center" class="Style3">
              <?php 

 $pass = $_POST['pass'];

 $npass = $_POST['npass'];
 
 $cnpass = $_POST['cnpass']; 

 include("../Connections/maconnexion.php");

$sqll = mysql_query("SELECT * FROM `administrateur` WHERE 1 LIMIT 0 , 30 ");
$sql = mysql_fetch_array($sqll);

if($sql['password']==$pass) 
{ if ($npass == $cnpass) 
	{  
	  $retour = mysql_query("UPDATE administrateur SET password='$npass' WHERE id=1");
      echo 'nous avons bien changer votre mot de passe et vous coordonne sonts les suivantes :<br />';
      echo ' mot de passe est :  '.$_POST['npass'].'<br />';
	  
	} 
	  else echo 'votre nouveaux mot de passe ne correspond pas avec la confirmation de se mot de passe';
   
   }else
   echo 'votre mot de passe ne correspond a celui de l\'administrateur veuillez reintroduire les coordonnees svp .';
   
   
   mysql_close();?>
            </p>
  <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p><span class="Style2"><br />
NB: Pour des raisons Sécuritaires , on va vous deconnecter de votre compte , Veuillez reconnecter avec les nouvelles coordonnées ..</span>. </p>
            <p align="center"><span class="Style1"><a href ="../connexion_administrateur.php">Retour à la page connexion</a></span></p>
</form>
          <p><br />
          </p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
</p>
<p align="center" class="Style1">&nbsp;</p>
</body>
</html>
