<?php session_start();
$ville_depart_croisiere = $_SESSION['ville_depart_croisiere'];
$ville_arrivee_croisiere = $_SESSION['ville_arrivee_croisiere'];
$heure_depart_croisiere = $_SESSION['heure_depart_croisiere'];

$heure_retour_croisiere = $_SESSION['heure_retour_croisiere'];
$compagnie = $_SESSION['compagnie'];
$prix_croisiere = $_SESSION['prix_croisiere'];
$aa = $_SESSION['aa'];
$mm = $_SESSION['mm'];
$jj = $_SESSION['jj'];
$a = $_SESSION['a'];
$m = $_SESSION['m'];
$j = $_SESSION['j'];
$date1 = $aa.'-'.$mm.'-'.$jj;
$date2 = $a.'-'.$m.'-'.$j;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eregestrement ajout croisiere</title>
</head>
<body>
<?php 
echo " votre ville depart est ;".$ville_depart_croisiere;
echo " votre ville arrivee est ".$ville_arrivee_croisiere;
echo " votre heure depart ; ".$heure_depart_croisiere;

mysql_connect("localhost","root","");
mysql_select_db("agencedevoyage");  

$sql = mysql_query("INSERT INTO crois VALUES ( NULL , '$ville_depart_croisiere', '$ville_arrivee_croisiere', '$date1', '$heure_depart_croisiere', '$date2', '$heure_retour_croisiere', '$compagnie', '$prix_croisiere'
)");

/*$sql = mysql_query("INSERT INTO `agencedevoyage`.` croisiere` (
`Id_croisiere` ,
`Ville_depart_croisiere` ,
`Ville_arrivee_croisiere` ,
`Date_depart_croisiere` ,
`heure_depart_croisiere` ,
`Date_retour_croisiere` ,
`heure_retour_croisiere` ,
`Compagnie` ,
`Prix_croisiere`
)
VALUES (
NULL , '$ville_depart_croisiere', '$ville_arrivee_croisiere', '$date1', '$heure_depart_croisiere', '$date2', '$heure_retour_croisiere', '$compagnie', '$prix_croisiere'
)");*/

mysql_close();
?>
</body>
</html>
