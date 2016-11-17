<div class="container-form-login">
<h2>Ajouter une nouvelle actualité</h2><br/>
   <?php echo validation_errors(); ?>
   <?php echo form_open('admin/verifyNewsForm'); ?>
   <?php // echo form_open_multipart('admin/upload'); ?>

     <label for="title">Titre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
     <input class="field" type="text" size="50" id="title" name="title"/>
     <br/><br/>
     <label for="body">Contenu: &nbsp;&nbsp;&nbsp;</label><br/>
     <textarea name="body" id="body"  rows="15" cols="60" style="overflow:auto;"></textarea>
     <br/>
     <!--<input type="file" />-->
     <input type="submit" value="Ajouter" class="btn"/>
</form>
</div>