<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<p>&nbsp;</p>
<?php 
if(isset( $_POST['type'])) { $_SESSION['a'] = $_POST['type']; $a = $_SESSION['a'];} else $a = $_SESSION['a'];
if ($a=='vol')
{
?>
<form id="form5" name="form5" method="post" action="resultat_recherche.php">
  <table width="340" height="156" border="1" align="center">
    <tr>
      <td colspan="2"><div align="center"><strong>Recherche vol</strong></div></td>
    </tr>
    <tr>
      <td width="132">Ville depart vol </td>
      <td width="192"><label>
        <input type="text" name="vdv" id="vdv" />
      </label>      </td>
    </tr>
    <tr>
      <td>ville arrivee vol </td>
      <td><label>
        <input type="text" name="vav" id="vav" />
        </label>      </td>
    </tr>
    <tr>
      <td>date depart vol </td>
      <td><label></label>      </td>
    </tr>
    <tr>
      <td>prix vol </td>
      <td><label></label>      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="button" id="button" value="Recherche" />
      </label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="1014" height="52" border="1">
    <tr>
      <td><strong>ville depart vol</strong></td>
      <td><strong>ville arrivvee vol</strong></td>
      <td><strong>date depart vol</strong></td>
      <td><strong>heure depart vol</strong></td>
      <td><strong>date retour vol</strong></td>
      <td><strong>heure retour vol</strong></td>
      <td><strong>class vol</strong></td>
      <td><strong>type vol</strong></td>
      <td><strong>compagnie</strong></td>
      <td><strong>prix vol</strong></td>
      <td><strong>reservation </strong></td>
    </tr>
   <?php while( $sql = mysql_fetch_array($data))
   {
    ?>
	<tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><a href="../reservation/resreve.php">reserver</a></td>
    </tr>
	<?php }?>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<?php } else { ?>
<form id="form1" name="form1" method="post" action="">
  <table width="369" height="156" border="1" align="center">
    <tr>
      <td colspan="2"><div align="center"><strong>Recherche croisiere</strong></div></td>
    </tr>
    <tr>
      <td width="143">Ville depart croisiere </td>
      <td width="210"><label>
        <input type="text" name="vdc" id="vdc" />
        </label>      </td>
    </tr>
    <tr>
      <td>ville arrivee croisiere</td>
      <td><label>
        <input type="text" name="vac" id="textfield6" />
        </label>      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="button2" id="button2" value="Envoyer" />
      </label></td>
    </tr>
  </table>
  <p>&nbsp;  </p>
  <p>
    <?php 
 if (isset($_POST['vdc']) and isset($_POST['vac']) and $_POST['vdc']!='')
  {
  $vdc = $_POST['vdc'];
  $vac = $_POST['vac'];
 
  
  
  
  include("../Connections/maconnexion.php");
  
  $data = mysql_query("SELECT * FROM `croisiere` WHERE `ville_depart_croisiere` LIKE CONVERT( _utf8 '%$vdc%' USING latin1 ) COLLATE latin1_swedish_ci AND `ville_arrivee_croisiere` LIKE CONVERT( _utf8 '%$vac%' USING latin1 ) COLLATE latin1_swedish_ci LIMIT 0 , 30 ");
 
 
 
  ?>
  </p>
  <table width="992" height="52" border="1">
    <tr>
      <td>ville depart croisiere</td>
      <td>ville arrivee croisiere</td>
      <td>date depart croisiere</td>
      <td>heure depart croisiere</td>
      <td>date retour croisiere</td>
      <td>heure retour croisiere</td>
      <td>compagnie</td>
      <td>prix croisiere</td>
      <td>reservation</td>
    </tr>
     <?php while( $sql = mysql_fetch_array($data))
   {
    ?>
    <tr>
      <td><?php echo $sql['ville_depart_croisiere'];?></td>
      <td><?php echo $sql['ville_arrivee_croisiere'];?></td>
      <td><?php echo $sql['date_depart_croisiere'];?></td>
      <td><?php echo $sql['heure_depart_croisiere'];?></td>
      <td><?php echo $sql['date_retour_croisiere'];?></td>
      <td><?php echo $sql['heure_retour_croisiere'];?></td>
      <td><?php echo $sql['compagnie'];?>;</td>
      <td><?php echo $sql['prix_croisiere'];?></td>
      <td><p><a href="../reservation/resreve.php">reserver</a></p>
      <p>&nbsp;</p></td>
    </tr><?php } //while?>
  </table>
  <?php } // if?>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>






<?php }//else?>
</body>
</html>
