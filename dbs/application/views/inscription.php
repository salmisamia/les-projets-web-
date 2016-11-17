<div class="page_container">
     <div class="withActionButtons">
            <h1 class="pageTitle">
                <span class="cufonTitle" id="pageTitle">Inscription</span>
                <span class="pageSSTitle"><span> </span></span>
            </h1>
        </div>
  <div class="page_inside">
   
<div id="form">
 
  
   <div class="error">
   <?php
    echo validation_errors(); ?>
    </div>
    <?php echo form_open('verifyinscription'); ?>
    <label>Prénom *</label> <input class="skinnedInput" style="width:200px;"  type="text" value="" name="nom" class="itxt" /> <br/>
    <label>Nom *</label> <input class="skinnedInput" style="width:200px;" type="text" value=""  name="prenom" class="itxt" /> <br/>
    <label>Mot de passe *</label> <input class="skinnedInput" style="width:200px;" type="password" name="password" class="itxt" /> <br/>
    <label>Confirmer le mot de passe *</label> <input class="skinnedInput" style="width:200px;" type="password" name="passconf" class="itxt" /> <br/>
    <label>Email *</label> <input class="skinnedInput" style="width:200px;" type="text" value=""  name="email" class="itxt" /> <br/>
    <label>Je m'inscris ! </label><a href="#" class="validate bouton boutonUnivers" style="margin-top:0; margin-left:10px;" id="btnVal"><input type="submit" name="devis-submit" value="Connexion" style="color:#fff"></a>
 <br/><br/>
</form>
</div>
</div>
</div>
