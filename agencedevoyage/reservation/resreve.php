<?php session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>

<p>
  <?php
 include("../Connections/maconnexion.php");
 $code_cl = $_SESSION['code_cl'];

$sql = mysql_query("INSERT INTO `agencedevoyage`.`reservation1` (`Id_res` ,`code_cl` ,`Date_res`)VALUES (NULL , '$code_cl', '$date')");

mysql_close();
?>
</p>
<h1 align="center">nous avons bien enregistrer votre reservation </h1>
</body>

</html>
