

<div class="page_content">
	   <div class="withActionButtons">
            <h1 class="pageTitle">
                <span class="cufonTitle" id="pageTitle">Connexion</span>
                <span class="pageSSTitle"><span> </span></span>
            </h1>
        </div>
      <div id="form">
        <h3>Connectez-vous pour accéder à l'espace client.</h3>
         <div class="error">
         <?php 
          echo validation_errors(); ?>
          <?php if(isset($erreur)){echo '<p style="color:red">',$erreur,'</p>';}?>
          </div><br/>
          <?php echo form_open('verifyloginc'); 
          ?>
               <label for="email">Email: </label>
               <input class="skinnedInput" style="width:200px;" type="text" size="20" id="email" name="email" class="itxt" /><br/>
               <label for="password">Mot de passe:</label>
               <input class="skinnedInput" style="width:200px;" type="password" size="20" id="passowrd" name="password" class="itxt" /><br/><br/>
               <!--<label>Je me connecte !</label><input type="submit" value="Connexion" class="submit" style="margin-right:42px;"/>--><br/>
                <a href="#" class="validate bouton boutonUnivers" style="margin-top:-15px;" id="btnVal"><input type="submit" name="devis-submit" value="Connexion" style="color:#fff"></a>
               <p class="linkcontainer" ><a href="<?php echo base_url() ?>password">Mot de passe perdu ?</a>&nbsp;&nbsp;<a href="<?php echo base_url() ?>inscription">S'inscrire</a></p>
        </form>

</div>
</div>
<div style="clear:both;"></div>

			
