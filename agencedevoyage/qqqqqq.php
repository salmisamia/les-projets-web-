<?php require_once('Connections/maconnexion.php'); ?>
<?php
   session_start();
   if(isset($_SESSION["login"]))
     {
      unset ($_SESSION["login"]);
     }
?>
<?php
