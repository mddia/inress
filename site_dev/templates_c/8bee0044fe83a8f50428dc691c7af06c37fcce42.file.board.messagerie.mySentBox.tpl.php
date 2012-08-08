<?php /* Smarty version Smarty-3.1.7, created on 2012-05-16 12:47:16
         compiled from "templates/admin/pages/board.messagerie.mySentBox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15484450454fb385b439cf64-27036613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bee0044fe83a8f50428dc691c7af06c37fcce42' => 
    array (
      0 => 'templates/admin/pages/board.messagerie.mySentBox.tpl',
      1 => 1334007806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15484450454fb385b439cf64-27036613',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'answerMessagesCount' => 0,
    'displayType' => 0,
    'answerMessages' => 0,
    'message' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb385b442089',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb385b442089')) {function content_4fb385b442089($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
?><div id="main">
	<h6>Messagerie / Messages envoyés</h6>
	<br /><hr /><br />

	<img style="margin-right:75px;" align="right" src="http://admin.inrees.com/adm/images/enveloppe.png" width="100" height="100" />
	<h1>Messagerie</h1><br />


	Liste de <strong>toutes vos réponses envoyées</strong> suite aux messages reçus.

	<br /><br />

	<h3>Boite de réception - <?php echo $_smarty_tpl->tpl_vars['answerMessagesCount']->value;?>
 <?php if (($_smarty_tpl->tpl_vars['displayType']->value=='last')){?>derniers <?php }?>messages envoyés</h3><br />


	<table cellspacing="1" style="width:875px;">
		<thead>
		<tr>
			<th style="width:50px;">
				<strong>ID</strong> 
				<a href="admin.php?cat=messagerie&scat=envoyes&orderby=id&limit=1">
					<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
				</a>
			</th>
			<th style="width:350px;">
				<strong>Titre</strong> 
				<a href="admin.php?cat=messagerie&scat=envoyes&orderby=name&limit=1">
					<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
				</a>
			</th>
			<th style="width:225px;">
				<strong>Destinataire</strong> 
				<a href="admin.php?cat=messagerie&scat=envoyes&orderby=dest&limit=1">
					<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
				</a>
			</th>
			<th style="width:180px;">
				<strong>Réponse</strong> 
				<a href="admin.php?cat=messagerie&scat=envoyes&orderby=rep&limit=1">
					<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
				</a>
			</th>
			<th style="width:70px;">
				<strong>Date</strong> 
				<a href="admin.php?cat=messagerie&scat=envoyes&orderby=date&limit=1">
					<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
				</a>
			</th>
		</tr>
		</thead>
		<tbody>
			<?php if (($_smarty_tpl->tpl_vars['answerMessagesCount']->value!='0')){?>
				<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['answerMessages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value){
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
					<tr class="row10green">
						<td><?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
</td>
						<td>
							<a href="admin.php?cat=messagerie&scat=message&id=<?php echo $_smarty_tpl->tpl_vars['message']->value['messageId'];?>
">
								<strong><?php echo $_smarty_tpl->tpl_vars['message']->value['objet'];?>
</strong><br />
							</a>
						</td>
						<td>
							<?php echo $_smarty_tpl->tpl_vars['message']->value['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['message']->value['name'];?>
<br />
						</td>
						<td>
							<strong><?php echo $_smarty_tpl->tpl_vars['message']->value['moderateur']['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['message']->value['moderateur']['name'];?>
</strong><br />
						</td>
						<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
</td>
					</tr>
				<?php } ?>
			<?php }?>
			<?php if (($_smarty_tpl->tpl_vars['displayType']->value=='all')){?>
				<tr>
					<td colspan="5">
						<center><a href="admin.php?cat=messagerie&scat=envoyes"> >>> REDUIRE L'AFFICHAGE <<< </center>
					</td>
				</tr>
			<?php }elseif(($_smarty_tpl->tpl_vars['displayType']->value=='last')){?>
				<tr>
					<td colspan="5">
						<center><a href="admin.php?cat=messagerie&scat=envoyes&limit=1"> >>> AFFICHER TOUS LES MESSAGES <<< </center>
					</td>
				</tr>
			<?php }?>
		</tbody>
	</table>
	<br /><br /><br />
</div><?php }} ?>