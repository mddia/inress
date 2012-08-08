<?php /* Smarty version Smarty-3.1.7, created on 2012-05-22 14:44:12
         compiled from "templates/admin/pages/board.boutique.routageList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13008422294fbb8a1ccdce37-22176232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b187f083097803687ffc8fdb2a443493821e177' => 
    array (
      0 => 'templates/admin/pages/board.boutique.routageList.tpl',
      1 => 1335524209,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13008422294fbb8a1ccdce37-22176232',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'magazines' => 0,
    'magazine' => 0,
    'routage' => 0,
    'root' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbb8a1cd656b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbb8a1cd656b')) {function content_4fbb8a1cd656b($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
?><div id="main">
	<h6>Membres / Administration / Routage du magazine</h6>
	<br /><hr /><br />


	<h1>Routage du magazine</h1><br />

	Module destiné à sélectionner les personnes qui ont reçu le dernier magazine par le routage. 
	<br /><br />
	<div id="boardContent">
		<h3>Historique des routages</h3>
		<br />
		Magazine routé : 
		<select name="numero" id="numero">
			<option value="0">Choisir</option>
			<?php  $_smarty_tpl->tpl_vars['magazine'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['magazine']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['magazines']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['magazine']->key => $_smarty_tpl->tpl_vars['magazine']->value){
$_smarty_tpl->tpl_vars['magazine']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['magazine']->value['numero'];?>
" onClick="updateSelectAboId(<?php echo $_smarty_tpl->tpl_vars['magazine']->value['aboId'];?>
)"><?php echo $_smarty_tpl->tpl_vars['magazine']->value['abo'];?>
 n°<?php echo $_smarty_tpl->tpl_vars['magazine']->value['numero'];?>
</option>
			<?php } ?>
		</select><br />
		<input type="hidden" id="aboId" name="aboId" value="0" />
		<br />
		<input type="button" value="Exporter abonnés routés" style="cursor: pointer;" onClick="getRootHistory(0);" /> 
		<input type="button" value="Exporter gratuits routés" style="cursor: pointer;" onClick="getRootHistory(1);" /> 
		<br /><br />
		
		<h3>Routage(s) à venir :</h3>	
		<br />
		<table cellspacing="1" style="width:650px; margin-top: 10px; text-align: center;">
			<thead>
				<tr>
					<th style="width: 250px; text-align: center;">Abonnement</th>
					<th style="width: 80px; text-align: center;">Numéro</th>
					<th style="width: 200px;">Destinataires</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['root'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['root']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['routage']->value['unroot']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['root']->key => $_smarty_tpl->tpl_vars['root']->value){
$_smarty_tpl->tpl_vars['root']->_loop = true;
?>
					<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
						<td><strong><?php echo $_smarty_tpl->tpl_vars['root']->value['abo'];?>
</strong></td>
						<td><?php echo $_smarty_tpl->tpl_vars['root']->value['numero'];?>
</td>
						<td><strong><?php echo $_smarty_tpl->tpl_vars['root']->value['myPayants']['count'];?>
 abonnés</strong><br /><i>(+ <?php echo $_smarty_tpl->tpl_vars['root']->value['myGratuits']['count'];?>
 gratuits)</i></td>
						<td>
							<a target="_blank" href="admin.php?cat=query&scat=exportMy&aboId=<?php echo $_smarty_tpl->tpl_vars['root']->value['aboId'];?>
&numero=<?php echo $_smarty_tpl->tpl_vars['root']->value['numero'];?>
">
								<img src="images/icons/user_go.png" alt="Exporter abonnés" title="Exporter abonnés" /></a> 
							<a target="_blank" href="admin.php?cat=query&scat=exportMyGratuits&aboId=<?php echo $_smarty_tpl->tpl_vars['root']->value['aboId'];?>
&numero=<?php echo $_smarty_tpl->tpl_vars['root']->value['numero'];?>
">
								<img src="images/icons/award_star_gold_1.png" alt="Exporter Gratuits" title="Exporter Gratuits" /></a> 
							<a target="_blank" href="admin.php?cat=query&scat=exportMySQL&aboId=<?php echo $_smarty_tpl->tpl_vars['root']->value['aboId'];?>
&numero=<?php echo $_smarty_tpl->tpl_vars['root']->value['numero'];?>
">
								<img src="images/icons/database_go.png" alt="Exporter SQL" title="Exporter SQL" /></a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<br /><br /><br />		
	</div>
</div><?php }} ?>