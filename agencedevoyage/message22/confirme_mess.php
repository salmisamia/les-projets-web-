<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>confirmation d'envoie de message</title>
<style type="text/css">
<!--
body {
	background-image: url(../imagesite/bg_2.jpg);
}
.Style1 {
	font-size: 36px;
	font-style: italic;
}
.Style2 {color: #00FF33}
-->
</style></head>

<body><div id="haut">
  <p><img src="../imagesite/polynesie-croisiere-archipel-bateau.jpg" alt="" width="1315" height="150" align="middle" /> </p>
  <p>
    <?php 

 
  $nom = $_POST['nom'];
 $prenom =  $_POST['prenom'];
 $email = $_POST['e_mail'];
 $objet = $_POST['objet'];
 $contenu = $_POST['message'];

mysql_connect("localhost","root","");
mysql_select_db("agencedevoyage");

// Requête SQL
$reponse = mysql_query("INSERT into message VALUES(NULL,'$nom','$prenom',,'$e_mail','$objet','$message','$date_msg','$heure:$minute:$seconde')"); 
?>
  </p>
  <p>&nbsp;</p>
  <table width="646" height="268" border="0" align="center">
    <tr>
      <td height="241" bgcolor="#7BB1D9"><div align="center" class="Style2">
          <h2 class="Style1">Nous avons bien reçu votre message </h2>
      </div></td>
    </tr>
    <tr>
      <td bgcolor="#7BB1D9"><p><strong>Pour Ecrire un autre message <a href="envoie_message.php">clic ici </a></strong></p>
      <p>Pour Revenir à l'Acceuil <a href="../index.php">clic ici </a></p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp; </p>
</div>
</body>
</html>
