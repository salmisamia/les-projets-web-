<div class="container-form-login">
<h2>Modifier une actualité</h2><br/>
   <?php echo validation_errors(); ?>
   <?php echo form_open('admin/verifyNewsForm'); ?>
	 <label for="title">Titre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
	 <input class="field" type="text" size="50" id="title" name="title" value="<?php echo set_value('title', $title); ?>" />
	 <br/><br/>
	 <label for="body">Contenu: &nbsp;&nbsp;&nbsp;</label><br/>
	 <textarea name="body" id="body" rows="15" cols="60" style="overflow:auto;"><?php echo set_value('body', $body); ?></textarea>
	 <br/>
	 <input type="hidden" value="true" name="is_update" />
	 <input type="hidden" value="<?=$id?>" name="id" />
	 <input type="submit" value="Modifier" class="btn"/>
</form>
</div>