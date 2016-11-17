<div id="body">
    <div class="PageTitleBlock fullsize">
        
        <div class="withActionButtons">
            <h1 class="pageTitle">
                <span class="cufonTitle" id="pageTitle">Demande devis </span>
                <span class="pageSSTitle"><span> </span></span>
            </h1>
        </div>
    </div>
<div id="main">
<div id="mainInside">
    <div class=" line  miniHspace ">
        <div class=" unit size1on1 lastunit ">
            <div class=" block  noresize ">
                <div class=" blockInside ">
                    <div class="body">
                        <hr>

                        <div style="width: 350px; heigt: 90px; float: right;">
</br> <table>
<tbody>
<tr style="border:1px solid #22ACE2;"><td style="border:1px solid #22ACE2;">Prix Public (TTC + Taxe) DA &nbsp;</td><td style="border:1px solid #22ACE2;">2 578 000 </td></tr>
<tr><td style="border:1px solid #22ACE2;">Prix Promotion DA</td><td style="border:1px solid #22ACE2;">/</td></tr>
<tr><td style="border:1px solid #22ACE2;">Prix ANDI DA</td><td style="border:1px solid #22ACE2;">1 986 000</td></tr>
<tr><td style="border:1px solid #22ACE2;">Prix Licence DA</td><td style="border:1px solid #22ACE2;">1 906 000</td></tr>
<tr><td style="border:1px solid #22ACE2;">Prix ANSEJ</td><td style="border:1px solid #22ACE2;">/</td></tr>
<tr><td style="border:1px solid #22ACE2;"><strong>Date Mise à jour Prix</strong></td><td style="border:1px solid #22ACE2;">2014-06-09 18:11:02</td></tr>

</tbody>
</table></div>

<form action="<?=base_url();?>devisvalidation" style="width:350px; margin:auto; float: left;" id="devisform" method="POST" name="devisform">

 <label>Nom de véhicule *</label><br/><input name="nom" class="skinnedInput" value="<?php echo $name; ?>"> <br/> 
 

 <label>Couleur de véhicule *</label> <select class="skinnedInput" style="width: 338px;" name="couleur" onChange="combo(this, 'theinput')" onMouseOut="comboInit(this, 'theinput')" > </br>
  <option>Blanc</option>
  <option>Noir</option>
  <option>Gris</option></select></br></br>
   <label>Climatisation *  &nbsp;&nbsp;&nbsp;&nbsp;</label> <select style="width: 338px;" class="skinnedInput" name="clim" onChange="combo(this, 'theinput')" onMouseOut="comboInit(this, 'theinput')" > </br>
  &nbsp;&nbsp;&nbsp;&nbsp;  <option>avec climatisation</option>
  <option>sans climatisation</option></select></br>
   <label> Peinture mitalisée *  &nbsp;&nbsp;&nbsp;&nbsp;</label> <select style="width: 338px;" class="skinnedInput" name="autre" onChange="combo(this, 'theinput')" onMouseOut="comboInit(this, 'theinput')" > </br>
  &nbsp;&nbsp;&nbsp;&nbsp;  <option>avec </option>
  <option>sans </option></select></br>


 <div class="floatR vMargin">
            <a href="#" class="validate bouton boutonUnivers" id="btnVal"><input type="submit" name="devis-submit" value="valider" style="color:#fff"></a>
</div>
</form>
<!--webform -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>