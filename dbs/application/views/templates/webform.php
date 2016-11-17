<div class="blockWebFormulaire">
	<form method="post" action="">
		<div class="formSrc line">
			<div class="unit size1on2">
				<div class="insideSpace choiceBlock clear"> 
					<div class="blockInside">
						<div class="body">
							<p>Vous souhaitez obtenir des <strong> informations générales sur Racinauto</strong> ou nous faire part d'une réclamation ? Veuillez remplir le formulaire ci-dessous en <strong>précisant la nature de votre demande</strong>.
								<em class="mentions tPadding">*Les champs marqués d'une (*) sont obligatoires</em></p>
						</div>	
						<div class="error">
						<?php 
							// Displays form errors
							echo validation_errors();
						?>
						</div>
						<fieldset>	
							<? foreach ($form_fields as $field): ?>
							<div class="tPadding line">
								<? switch ($field['type']) 
								{
									case 'Input' : $the_field = form_input(array('name' => $field['name_slug'], 'value' => $field['value'], 'class' => 'skinnedInput')); break;
									case 'Select' : $the_field = form_dropdown($field['name_slug'], $field['options']); break;
									default : $the_field = false; break;
								} 
								if ($the_field) 
								{ ?>
								<label><? echo $field['name']; if ($field['validation']) echo " *";?></label>
								<span class="<?if ($field['type']=='Select') echo 'skinned'.$field['type']; else echo 'fld'; ?>">
								<?=$the_field?>
								</span>
								<? } ?>
							</div>
							<?endforeach?>
						</fieldset>	
					</div>	
				</div>	
			</div>	
			<div class="unit size1on2 lastunit blockFilledGrey">
				<div class="block insideSpace" id="rightChoice1"> 
					<div class="blockInside">
						<div class="body">	
							<div class="tPadding">	
								<? foreach ($form_fields as $field): 
									if ($field['type'] == 'Textarea'): ?>
										<? switch ($field['type']) 
										{
											case 'Textarea' : $the_field = form_textarea(array('name' => $field['name_slug'], 'value' => $field['value'], 'class' => 'skinnedInput textareaMaxed',  'rows' => '30', 'cols' => '38', 'style' => 'height:150px;')); break;
											default : $the_field = ""; break;
										} 
										if ($the_field) { ?>
										<div class="tPadding line">
										<label><? echo $field['name']; if ($field['validation']) echo " *";?></label>
										<?=$the_field?>
										</div>
										<? } ?>
									<? endif; ?>	
								<?endforeach?>
							</div>	
						</div>	
					</div>	
				</div>	
			</div>
		</div>
		
		<div class="floatR vMargin">
			<a href="#" class="validate bouton boutonUnivers" id="btnVal"><input type="submit" name="form-submit" value="valider" style="color:#fff"/></a>
		</div> 
	</form>
</div>