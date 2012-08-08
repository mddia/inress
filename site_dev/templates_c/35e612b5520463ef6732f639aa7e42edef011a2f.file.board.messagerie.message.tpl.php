<?php /* Smarty version Smarty-3.1.7, created on 2012-06-07 12:10:21
         compiled from "templates/admin/pages/board.messagerie.message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17648354314fb61d0cc46600-95653321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35e612b5520463ef6732f639aa7e42edef011a2f' => 
    array (
      0 => 'templates/admin/pages/board.messagerie.message.tpl',
      1 => 1339063788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17648354314fb61d0cc46600-95653321',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb61d0ce4e71',
  'variables' => 
  array (
    'message' => 0,
    'otherMessage' => 0,
    'label' => 0,
    'config' => 0,
    'answersCount' => 0,
    'labels' => 0,
    'tag' => 0,
    'answers' => 0,
    'answer' => 0,
    'reponse' => 0,
    'SESSION' => 0,
    'POST' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb61d0ce4e71')) {function content_4fb61d0ce4e71($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
?><div id="main">
	<h6>Messagerie / Boite de réception / Message n°<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
</h6>
	<br /><hr /><br />

	<img style="margin-right:75px;" align="right" src="http://admin.inrees.com/adm/images/enveloppe.png" width="100" height="100" />
	<h1>Messagerie</h1><br />


	Fiches descriptives des différents messages.
	<br /><br />
	<h3>Message n°<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
</h3><br />

	<table cellspacing="1" style="max-width:850px;">
		<thead>
		<tr>
			<th style="width:275px;"><strong>Détails</strong> </th>
			<th style="width:575px;"><strong>Message</strong> </th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<td valign="top">
					<strong style="font-size:14px;">Expéditeur :</strong><br /><br /><br />
				
					<a href="admin.php?cat=membres&scat=membres&id=<?php echo $_smarty_tpl->tpl_vars['message']->value['idemail'];?>
">
						<strong style="font-size:13px;" >
							<font style="text-transform:capitalize;"><?php echo $_smarty_tpl->tpl_vars['message']->value['firstName'];?>
</font> 
							<font style="text-transform:uppercase;"><?php echo $_smarty_tpl->tpl_vars['message']->value['name'];?>
</font>
						</strong>
					</a>
					<br /><br />
					Email : 
					<a href="admin.php?cat=membres&scat=membres&id=<?php echo $_smarty_tpl->tpl_vars['message']->value['idemail'];?>
">
						<strong><?php echo $_smarty_tpl->tpl_vars['message']->value['email'];?>
</strong>
					</a>
					<br />
					<!--Localisation : <br />
					Téléphones : <br />-->
					Compte/Password : 
					<font color="green">Actif (???)</font>
					<!--<font color="red">Non-créé</font>-->
					<?php if (($_smarty_tpl->tpl_vars['message']->value['myinrees']==1)){?>
						<br /><br />
						<font color="blue"><strong>Abonné INREES</strong></font>
					<?php }?>
					<?php if (($_smarty_tpl->tpl_vars['message']->value['otherMessagesCount']!=0)){?>
						<br /><br /><br />
						Nous a contacté : <strong><?php echo $_smarty_tpl->tpl_vars['message']->value['otherMessagesCount'];?>
 fois</strong>
						<br />
						Autres messages : 
						<!-- Boucle -->
						<?php  $_smarty_tpl->tpl_vars['otherMessage'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['otherMessage']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message']->value['otherMessages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['otherMessage']->key => $_smarty_tpl->tpl_vars['otherMessage']->value){
$_smarty_tpl->tpl_vars['otherMessage']->_loop = true;
?>
							<a href="admin.php?cat=messagerie&scat=message&id=<?php echo $_smarty_tpl->tpl_vars['otherMessage']->value['id'];?>
"><strong>N°<?php echo $_smarty_tpl->tpl_vars['otherMessage']->value['id'];?>
</strong></a>,
						<?php } ?>
					<?php }?>
					<!--
					<br /><br /><strong style="color:orange;">PRESSE</strong><br /><br />-->
					<br /><br />
					Libellés : 
					<br />
					<div id="labelZone<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
">
						<?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['label']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message']->value['labels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
$_smarty_tpl->tpl_vars['label']->_loop = true;
?>
							<div class="label" style="background-color: #<?php echo $_smarty_tpl->tpl_vars['label']->value['background'];?>
; color: #<?php echo $_smarty_tpl->tpl_vars['label']->value['color'];?>
;" id="label-<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['label']->value['id'];?>
">
								<?php echo $_smarty_tpl->tpl_vars['label']->value['name'];?>
 
								<a style="cursor: pointer;" onClick="removeLabel(<?php echo $_smarty_tpl->tpl_vars['label']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
);">
									<img src="http://admin.inrees.com/adm/images/icon_delete.gif" alt="X" style="margin-bottom: -1px; width: 12px; height: 12px;" />
								</a>
							</div>
						<?php } ?>
					</div>
					
					<!--<br /><br /><font style="color:magenta;">A déjà été orienté<br />par un professionnel de santé</font><br /><br />
					
					<br /><br />
					
					<img style="max-width:150px; max-height:150px; position:absolute;" src="http://admin.inrees.com/adm/photos/'.$photomembre.'" />-->
					<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
				</td>
				<td valign="top">
					<strong style="font-size:14px;">Sujet : <span id="messageTopic"><?php if (($_smarty_tpl->tpl_vars['message']->value['tem']==0)){?><?php echo $_smarty_tpl->tpl_vars['message']->value['objet'];?>
<?php }else{ ?>Témoignage<?php }?></span></strong>
					<br /><br />
					Reçu le : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
<br />
					Status : <strong><?php if (($_smarty_tpl->tpl_vars['answersCount']->value==0)){?>Sans réponse (depuis <?php echo $_smarty_tpl->tpl_vars['message']->value['passedTime'];?>
 jours)<?php }elseif(($_smarty_tpl->tpl_vars['answersCount']->value==1)){?>Déjà répondu (1 réponse)<?php }else{ ?>Déjà répondu (<?php echo $_smarty_tpl->tpl_vars['answersCount']->value;?>
 réponses)<?php }?></strong><br />
					<br />
					<div style="border: 1px solid #CCCCCC; padding: 5px;">
						<select>
							<option style="font-style: italic;">Transmettre à</option>
							<?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['label']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['labels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
$_smarty_tpl->tpl_vars['label']->_loop = true;
?>
								<option onClick="addLabel(<?php echo $_smarty_tpl->tpl_vars['label']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
);"><?php echo $_smarty_tpl->tpl_vars['label']->value['name'];?>
</option>
							<?php } ?>
						</select>
						<span id="testimonyLink"><strong><?php if (($_smarty_tpl->tpl_vars['message']->value['tem']==0)){?> | <a onClick="displayTestimony(<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
)" style="cursor: pointer;" />Témoignage</a><?php }?></strong></span><?php if (($_smarty_tpl->tpl_vars['message']->value['labelsCount']!='0')){?> | <a onClick="deleteMessage(<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
)">Supprimer</a><?php }?>
					</div>
					<br />
					<hr />
					<br />					
					<?php echo $_smarty_tpl->tpl_vars['message']->value['message'];?>
<br />
					<br />
					<br />
					<strong><?php echo $_smarty_tpl->tpl_vars['message']->value['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['message']->value['name'];?>
</strong><br />
					<br />
					<hr />
					<br />
					<form action="actions.php" method="post" <?php if (($_smarty_tpl->tpl_vars['message']->value['tem']==0)){?>style="display: none;"<?php }?> id="testimonyForm" >
						<input type="hidden" name="formName" value="updateTestimony" />
						<input type="hidden" name="messageId" value="<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
" />
						<table>
							<tr>
								<td align="right" style="font-size:11px;" valign="top">Note du témoignage :</td>
								<td style="font-size:11px;">
									<select style="width:175px;" name="note" size="1">
										<option <?php if (($_smarty_tpl->tpl_vars['message']->value['teminterest']=='0')){?>selected="selected"<?php }?> value="0">
											0 - Non défini
										</option>
										<option <?php if (($_smarty_tpl->tpl_vars['message']->value['teminterest']=='1')){?>selected="selected"<?php }?> value="1">
											1 - Pas intéressant !
										</option>
										<option <?php if (($_smarty_tpl->tpl_vars['message']->value['teminterest']=='2')){?>selected="selected"<?php }?> value="2">
											2 - Assez intéressant...
										</option>
										<option <?php if (($_smarty_tpl->tpl_vars['message']->value['teminterest']=='3')){?>selected="selected"<?php }?> value="3">
											3 - Très intéressant !
										</option>
									</select>
								</td>
							</tr>
							<tr>
								<td align="right" style="font-size:11px;" valign="top">Tags :</td>
								<td style="font-size:11px;">
									<?php echo $_smarty_tpl->getSubTemplate ('modules/tags.input.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								</td>
							</tr>
							<tr>
								<td style="font-size:11px;" align="right"></td>
								<td style="font-size:11px;">
									<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message']->value['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
										<div id="tag<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
" class="tagDiv" style="padding: 6px; border: 1px solid rgb(102, 102, 102); background-color: rgb(238, 238, 238); border-radius: 5px 5px 5px 5px; min-width: 40px; margin: 2px; text-align: center; float: left; overflow: hidden;">
											<div><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</div>
											<div class="tagIconDiv">
												<a onclick="removeTagFromMessage(<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
);">
													<img style="margin-bottom: -4px;" alt="[X]" src="http://admin.inrees.com/adm/images/icon_annuler.gif">
												</a>
											</div>
										</div>
									<?php } ?>
									<?php echo $_smarty_tpl->getSubTemplate ('modules/tags.display.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								</td>
							</tr>
							<tr>
								<td style="font-size:11px;" align="right">Témoignage déjà utilisé :</td>
								<td style="font-size:11px;">
									<select style="width:175px;" name="used" size="1">
										<option <?php if (($_smarty_tpl->tpl_vars['message']->value['temut']=='0')){?>selected="selected"<?php }?> value="0">Non</option>
										<option <?php if (($_smarty_tpl->tpl_vars['message']->value['temut']=='1')){?>selected="selected"<?php }?> value="1">Oui</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="font-size:11px;" align="right"></td>
								<td style="font-size:11px;">
									<input style="width:175px;" name="usedfor" type="text" value="<?php echo $_smarty_tpl->tpl_vars['message']->value['temutprq'];?>
" maxlength="255"/><br />
									<em>(Précisez où ce témoignage a été utilisé)</em>
								</td>
							</tr>
							<tr>
								<td style="font-size:11px;" style="text-align:right;"></td>
								<td style="font-size:11px;" style="text-align:left;"></td>
							</tr>
							<tr>
								<td style="font-size:11px;" style="text-align:right;">
									<div style="text-align:right;">
										<input class="button2" type="submit" id="action_online" name="action_online" value="Valider" />
									</div>
								</td>
								<td style="font-size:11px;" style="text-align:left;">
									<a onClick="unsetTestimony(<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
);">
										<strong>Annuler le témoignage</strong>
									</a>
								</td>
							</tr>
						</table>
						<br /><br />
					</form>
				</td>
			</tr>
		</tbody>
	</table>
	<br />
	<?php if (($_smarty_tpl->tpl_vars['answersCount']->value!=0)){?>
		<h3>Réponses :</h3><br />	
		<?php  $_smarty_tpl->tpl_vars['answer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['answer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['answers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['answer']->key => $_smarty_tpl->tpl_vars['answer']->value){
$_smarty_tpl->tpl_vars['answer']->_loop = true;
?>
			<table cellspacing="1" style="width:850px;">
				<thead>
					<tr>
						<th style="width:275px;"><strong>Détails</strong> </th>
						<th style="width:575px;"><strong>Message</strong> </th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td valign="top">
							<strong style="font-size:14px;">Réponse :</strong><br /><br /><br />
							<strong style="font-size:13px;"><font style="text-transform:capitalize;"><?php echo $_smarty_tpl->tpl_vars['answer']->value['moderateur']['firstName'];?>
</font> 
							<font style="text-transform:uppercase;"><?php echo $_smarty_tpl->tpl_vars['answer']->value['moderateur']['name'];?>
</font></strong>
							<br /><br />
							Email : <?php echo $_smarty_tpl->tpl_vars['answer']->value['moderateur']['email'];?>
</a>
							<br /><br />
							<?php echo $_smarty_tpl->tpl_vars['answer']->value['moderateur']['responsabilites'];?>
<br />
							INREES<br />
							www.inrees.com
							<br /><br /><br /><br />
						</td>
						<td valign="top">
							<strong style="font-size:14px;">Sujet : Réponse à "<?php echo $_smarty_tpl->tpl_vars['answer']->value['objet'];?>
"</strong>
							<br /><br />
							Envoyé le : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['answer']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
<br />
							À : <?php echo $_smarty_tpl->tpl_vars['message']->value['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['message']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['message']->value['email'];?>
)<br />
							<br /><hr /><br />
							<?php echo $_smarty_tpl->tpl_vars['answer']->value['message'];?>
<br />
							<br />
							<br />
							<?php echo $_smarty_tpl->tpl_vars['answer']->value['moderateur']['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['answer']->value['moderateur']['name'];?>
<br />
							<?php echo $_smarty_tpl->tpl_vars['answer']->value['moderateur']['responsabilites'];?>
<br />
							INREES<br />
							www.inrees.com<br />
							<br /><hr /><br />
							<br /><br />
						</td>
					</tr>
				</tbody>
			</table>
			<br /><br />
		<?php } ?>
	<?php }?>
	<!-- FORMULAIRES DE REPONSE -->
	<?php if (($_smarty_tpl->tpl_vars['reponse']->value==0)){?>
		<br />
		<a class="buttonplus" href="admin.php?cat=messagerie&scat=message&id=<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
&reponse=1#rep">
			Répondre au message
		</a>
	<?php }elseif(($_smarty_tpl->tpl_vars['reponse']->value==1)){?>
		<a id="rep"></a>
		<h3>Réponse</h3><br />
		<table cellspacing="1" style="width:850px;">
			<thead>
				<tr>
					<th style="width:275px;"><strong>Détails</strong> </th>
					<th style="width:575px;"><strong>Message</strong> </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td valign="top">
						<strong style="font-size:14px;">Réponse :</strong><br /><br /><br />
						<strong style="font-size:13px;"><font style="text-transform:capitalize;"><?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['firstName'];?>
</font> 
						<font style="text-transform:uppercase;"><?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['name'];?>
</font></strong>
						<br /><br />
						Email : <?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['email'];?>
</a>
						<br /><br />
						<?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['responsabilites'];?>
 Web<br />
						INREES<br />
						www.inrees.com
						<br /><br /><br /><br />
					</td>
					<td valign="top">
						<strong style="font-size:14px;">Sujet : Réponse à "<?php echo $_smarty_tpl->tpl_vars['message']->value['objet'];?>
"</strong>
						<br /><br />
						Envoyé à : <?php echo $_smarty_tpl->tpl_vars['message']->value['email'];?>
<br />
						<br /><hr /><br />
							<form action="admin.php?cat=messagerie&scat=message&id=<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
&reponse=2#rep" method="post">
								<textarea style="width:500px;height:250px;" name="message" value=""></textarea>
							
								<br /><br />
								<!--<input style="width:15px;" name="pseudoactif" type="checkbox" /> <em>Cochez cette case pour utiliser votre pseudo</em>
								<br /><br />-->
								<font style="font-size:13px;"><font style="text-transform:capitalize;"><?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['firstName'];?>
</font> 
								<font style="text-transform:uppercase;"><?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['name'];?>
</font>
								<br />
								<?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['responsabilites'];?>
<br />
								INREES<br />
								www.inrees.com
								</font>
								<br /><br /><hr /><br />
								<input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Prévisualiser votre message" />
							</form>
						<br /><br />
					</td>
				</tr>
			</tbody>
		</table>
	<?php }elseif(($_smarty_tpl->tpl_vars['reponse']->value==2)){?>
		<a id="rep"></a>
		<h3>Nouvelle réponse</h3><br />
		<table cellspacing="1" style="width:850px;">
			<thead>
				<tr>
					<th style="width:275px;"><strong>Détails</strong> </th>
					<th style="width:575px;"><strong>Message</strong> </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td valign="top">
						<strong style="font-size:14px;">Réponse :</strong><br /><br /><br />
						<strong style="font-size:13px;"><font style="text-transform:capitalize;"><?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['firstName'];?>
</font> 
						<font style="text-transform:uppercase;"><?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['name'];?>
</font></strong>
						<br /><br />
						Email : <?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['email'];?>
</a>
						<br /><br />
						<?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['responsabilites'];?>
<br />
						INREES<br />
						www.inrees.com
						<br /><br /><br /><br />
					</td>
					<td valign="top">
						<strong style="font-size:14px;">Sujet : Réponse à "<?php echo $_smarty_tpl->tpl_vars['message']->value['objet'];?>
"</strong>
						<br /><br />
						Envoyé à : <?php echo $_smarty_tpl->tpl_vars['message']->value['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['message']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['message']->value['email'];?>
)<br />
						<br /><hr /><br />
						<form action="actions.php?" method="post">
							<?php echo $_smarty_tpl->tpl_vars['POST']->value['message'];?>

							<br /><br /><hr /><br />
							<input type="hidden" name="message" value="<?php echo $_smarty_tpl->tpl_vars['POST']->value['message'];?>
" />
							<input type="hidden" name="messageId" value="<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
" />
							<input type="hidden" name="formName" value="sendAnswer" />
							<input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Envoyer le message" />
							<br /><br />
						</form>
					</td>
				</tr>
			</tbody>
		</table>
	<?php }?>
	<br />
	<br />
</div><?php }} ?>