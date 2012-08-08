<?php /* Smarty version Smarty-3.1.7, created on 2012-05-31 03:24:40
         compiled from "templates/admin/pages/board.menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:911203704fae88ab678f74-39843813%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6979306d0854cddce156c6f43dc3836d29fa18d9' => 
    array (
      0 => 'templates/admin/pages/board.menu.tpl',
      1 => 1338427478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '911203704fae88ab678f74-39843813',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fae88ab6c52e',
  'variables' => 
  array (
    'cat' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae88ab6c52e')) {function content_4fae88ab6c52e($_smarty_tpl) {?><div id="tabs">
	<ul>
		<li <?php if (($_smarty_tpl->tpl_vars['cat']->value=='general')){?>id="activetab"<?php }?>><a href="admin.php?cat=general"><span>General</span></a></li>
		<li <?php if (($_smarty_tpl->tpl_vars['cat']->value=='membres')){?>id="activetab"<?php }?>><a href="admin.php?cat=membres"><span>Abonnés</span></a></li>
		<li <?php if (($_smarty_tpl->tpl_vars['cat']->value=='messagerie')){?>id="activetab"<?php }?>><a href="admin.php?cat=messagerie"><span>Messagerie</span></a></li>
		<li <?php if (($_smarty_tpl->tpl_vars['cat']->value=='activites')){?>id="activetab"<?php }?>><a href="admin.php?cat=activites"><span>Evènements</span></a></li>
		<li <?php if (($_smarty_tpl->tpl_vars['cat']->value=='partenaires')){?>id="activetab"<?php }?>><a href="admin.php?cat=partenaires"><span>Partenaires</span></a></li>
		<li <?php if (($_smarty_tpl->tpl_vars['cat']->value=='website')){?>id="activetab"<?php }?>><a href="admin.php?cat=website"><span>Website</span></a></li>
		<li <?php if (($_smarty_tpl->tpl_vars['cat']->value=='boutique')){?>id="activetab"<?php }?>><a href="admin.php?cat=boutique"><span>Boutique</span></a></li>
		<li <?php if (($_smarty_tpl->tpl_vars['cat']->value=='budget')){?>id="activetab"<?php }?>><a href="admin.php?cat=budget"><span>Budget</span></a></li>
		<li <?php if (($_smarty_tpl->tpl_vars['cat']->value=='reseau')){?>id="activetab"<?php }?>><a href="admin.php?cat=reseau"><span>Réseau</span></a></li>
		<li><a target="_blank" href="//192.168.1.16"><span>Disk Station</span></a></li>
	</ul>
</div><?php }} ?>