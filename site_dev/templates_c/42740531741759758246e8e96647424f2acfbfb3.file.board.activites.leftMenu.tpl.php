<?php /* Smarty version Smarty-3.1.7, created on 2012-06-06 16:26:50
         compiled from "templates/admin/pages/board.activites.leftMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4700968684fbf447d0bc062-84502642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42740531741759758246e8e96647424f2acfbfb3' => 
    array (
      0 => 'templates/admin/pages/board.activites.leftMenu.tpl',
      1 => 1338992783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4700968684fbf447d0bc062-84502642',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbf447d0f390',
  'variables' => 
  array (
    'eventTypes' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbf447d0f390')) {function content_4fbf447d0f390($_smarty_tpl) {?><div id="toggle">
	<a id="toggle-handle" accesskey="m" title="Hide or display the side menu" onclick="switchMenu(); return false;" href="#">
	</a>
</div>
<div id="menu">
	<ul>
		<li class="header">Administration</li>
		<li><a href="admin.php?cat=activites&scat=createactivites"><span>Insérer un nouveau rendez-vous</span></a></li>
		<hr />
		<li><a href="admin.php?cat=activites&scat=listeactivites"><span>Liste des rendez-vous</span></a></li>
		<li><a href="admin.php?cat=activites&scat=gestionactivitestypes"><span>Gestion des types d'activité</span></a></li>
		<li><a href="admin.php?cat=activites&scat=gestionlocaux"><span>Gestion des locaux</span></a></li>
		<li><a href="admin.php?cat=website&scat=gestionIntervenants"><span>Gestion des intervenants</span></a></li>
		<li class="header">Liste des évènements</li>
		<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventTypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
			<?php if (($_smarty_tpl->tpl_vars['type']->value['actif']==1)){?>
				<li>
					<a href="admin.php?cat=activites&scat=activites&scat=listeEV&id=<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['type']->value['nompluriel'];?>
</span></a>
				</li>
			<?php }?>
		<?php } ?>
	</ul>
</div><?php }} ?>