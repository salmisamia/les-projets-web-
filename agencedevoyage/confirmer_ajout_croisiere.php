<?php session_start();
if (isset($_POST['ville_depart_croisiere']))
{
$_SESSION['ville_depart_croisiere'] = $_POST['ville_depart_croisiere'];
$_SESSION['ville_arrivee_croisiere'] = $_POST['ville_arrivee_croisiere'];
$_SESSION['heure_depart_croisiere']  = $_POST['heure_depart_croisiere'];
$_SESSION['heure_retour_croisiere'] = $_POST['heure_retour_croisiere'];

$_SESSION['aa'] = $_POST['aa'];
$_SESSION['mm'] = $_POST['mm'];
$_SESSION['jj'] = $_POST['jj'];
$_SESSION['a'] = $_POST['a'];
$_SESSION['m'] = $_POST['m'];
$_SESSION['j'] = $_POST['j'];
$_SESSION['compagnie'] = $_POST['compagnie'];
$_SESSION['prix_croisiere'] = $_POST['prix_croisiere'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>confirmation ajout croisiere</title>
</head>
<body>
<p>&nbsp;</p>
<table width="279" height="280" border="1" align="center">
  <tr>
    <td width="117" scope="col">ville_depart_croisiere</td>
    <th width="146" scope="col"><?php echo $_SESSION['ville_depart_croisiere'];?></th>
  </tr>
  <tr>
    <td width="117" scope="col">ville_arrivee_croisiere </td>
   <th width="146" scope="col"><?php echo $_SESSION['ville_arrivee_croisiere'];?></th>
  </tr>
  <tr>
    <td width="117" scope="col">date_depart_croisiere</td>
    <th width="146" scope="col"><?php echo $_SESSION['date_depart_croisiere'];?></th>
  </tr>
  <tr>
    <td width="117" scope="col">heure_depart_croisiere</td>
    <th width="146" scope="col"><?php echo $_SESSION['heure_depart_croisiere'];?></th>
  </tr>
  <tr>
    <td width="117" scope="col">date_retour_croisiere</td>
   <th width="146" scope="col"><?php echo $_SESSION['date_retour_croisiere'];?></th>
  </tr>
  <tr>
    <td width="117" scope="col">heure_retour_croisiere</td>
    <th width="146" scope="col"><?php echo $_SESSION['heure_retour_croisiere'];?></th>
  </tr>
  <tr>
    <td width="117" scope="col">compagnie</td>
    <th width="146" scope="col"><?php echo $_SESSION['compagnie'];?></th>
  </tr>
  <tr>
    <td width="117" scope="col">prix_croisiere</td>
   <th width="146" scope="col"><?php echo $_SESSION['prix_croisiere'];?></th>
  </tr>
  
  </tr>
  <tr>
    <td><form id="form2" name="form2" method="post" action="gerant/gerer croisier/ajoutcroisier/ajoute_croisiere.php">
      <label>
        <input type="submit" name="Annuler" id="Annuler" value="Annuler" />
        </label>
    </form>
    </td>
    <td><form id="form1" name="form1" method="post" action="enregistre_croisiere.php">
       <label>
        <input type="submit" name="valider" id="valider" value="valider" />
        </label>
    </form>
    </td>
  </tr>
</table>
</body>
</html>
