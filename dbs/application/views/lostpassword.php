<div id="body">
    <div class="PageTitleBlock fullsize">
        
        <div class="withActionButtons">
            <h1 class="pageTitle">
                <span class="cufonTitle" id="pageTitle">Mot de passe perdu</span>
                <span class="pageSSTitle"><span> </span></span>
            </h1>
        </div>
    </div>
<div id="main">
<div id="mainInside" style="color:red;margin-left:-20px;">
 <?php 
          echo validation_errors(); ?>
</div><br/>
          <?php echo form_open('resetpass'); 
          ?>
   <label for="email">Veuillez entrer l'adresse email avec lequelle vous vous êtes inscrit sur le site: </label>
   <input class="skinnedInput" style="width:200px;" type="text" size="20" id="email" name="email" class="itxt" /><br/>
                  <span>Demande réinitialisation:</span> <a href="#" class="validate bouton boutonUnivers" style="margin-top:0px;" id="btnVal"> <input type="submit" name="devis-submit" value="Valider" style="color:#fff"></a>
</div>
</div>
