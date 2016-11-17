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
      <td><label>
        <input type="text" name="ddv" id="ddv" />
        </label>      </td>
    </tr>
    <tr>
      <td>prix vol </td>
      <td><label>
        <input type="text" name="pv" id="pv" />
        </label>      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="button" id="button" value="Recherche" />
      </label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <?php 
  if (isset($_POST['vdv']) and isset($_POST['vav']) and $_POST['vdv']!='')
  {
  $vdv = $_POST['vdv'];
  $vav = $_POST['vav'];
  $ddv = $_POST['ddv'];
  $pv = $_POST['pv'];
  
  
  
  include("../Connections/maconnexion.php");
  
  $data = mysql_query("SELECT * FROM `vol` WHERE `ville_depart_vol` LIKE CONVERT( _utf8 '%$vdv%' USING latin1 ) COLLATE latin1_swedish_ci AND `ville_arrivee_vol` LIKE CONVERT( _utf8 '%$vav%' USING latin1 ) COLLATE latin1_swedish_ci AND `date_depart_vol` = '$ddv' AND `prix_vol` =$pv LIMIT 0 , 30 ");
 
 
 
  ?>
  <table width="923" height="52" border="1">
    <tr>
      <td width="100">ville depart vol</td>
      <td width="103">ville arrivee vol</td>
      <td width="104">date depart vol</td>
      <td width="112">heure depart vol</td>
      <td width="100">date retour vol</td>
      <td width="108">heure retour vol</td>
      <td width="58">class vol</td>
      <td width="55"> type vol</td>
      <td width="66">companie</td>
      <td width="53">prix vol</td>
    </tr>
   <?php while( $sql = mysql_fetch_array($data))
   {
    ?>
	<tr>
      <td><?php echo $sql['ville_depart_vol'];?></td>
      <td><?php echo $sql['ville_arrivee_vol'];?></td>
      <td><?php echo $sql['date_dapart_vol'];?></td>
      <td><?php echo $sql['heure_dapart_vol'];?></td>
      <td><?php echo $sql['date_retour_vol'];?></td>
      <td><?php echo $sql['heure_retour_vol'];?></td>
      <td><?php echo $sql['class_vol'];?></td>
      <td><?php echo $sql['type_vol'];?></td>
      <td><?php echo $sql['compagnie'];?></td>
      <td><?php echo $sql['prix_vol'];?></td>
    </tr>
	<?php }?>
  </table>
<?php } ?>
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
      <td>date depart croisiere</td>
      <td><label>
        <input type="text" name="ddc" id="textfield7" />
        </label>      </td>
    </tr>
    <tr>
      <td>prix croisiere</td>
      <td><label>
        <input type="text" name="pc" id="textfield8" />
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
  $ddc = $_POST['ddc'];
  $pc = $_POST['pc'];
  
  
  
  include("../Connections/maconnexion.php");
  
  $data = mysql_query("SELECT * FROM `croisiere` WHERE `ville_depart_croisiere` LIKE CONVERT( _utf8 '%$vdc%' USING latin1 ) COLLATE latin1_swedish_ci AND `ville_arrivee_croisiere` LIKE CONVERT( _utf8 '%$vac%' USING latin1 ) COLLATE latin1_swedish_ci AND `date_depart_croisiere` = '$ddc' AND `prix_croisiere` = $pc LIMIT 0 , 30 ");
 
 
 
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
      <td><?php echo $sql['compagnie'];?></td>
      <td><?php echo $sql['prix_croisiere'];?></td>
    </tr><?php } //while?>
  </table>
  <?php } // if?>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>






<?php }//else?>
</body>
</html>
