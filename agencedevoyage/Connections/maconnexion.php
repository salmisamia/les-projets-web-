<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_maconnexion = "localhost";
$database_maconnexion = "agencedevoyage";
$username_maconnexion = "root";
$password_maconnexion = "";
$maconnexion = mysql_pconnect($hostname_maconnexion, $username_maconnexion, $password_maconnexion) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db("agencedevoyage");

$jour = date('d');
$mois = date('m');
$annee = date('Y');
$date = $annee.'-'.$mois.'-'.$jour;

?>