<?php /* Smarty version Smarty-3.1.7, created on 2012-05-29 15:03:32
         compiled from "templates/admin/pages/board.messagerie.leftMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15052169154fb3854c7d94f0-56851179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6b17c967bd292c73f0ab338acdb634942118564' => 
    array (
      0 => 'templates/admin/pages/board.messagerie.leftMenu.tpl',
      1 => 1338296609,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15052169154fb3854c7d94f0-56851179',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb3854c86810',
  'variables' => 
  array (
    'awaitingMessagesCount' => 0,
    'unlabelledMessagesCount' => 0,
    'SESSION' => 0,
    'mailBoxCount' => 0,
    'myLabels' => 0,
    'label' => 0,
    'testimoniesCount' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb3854c86810')) {function content_4fb3854c86810($_smarty_tpl) {?><div id="toggle">
	<a id="toggle-handle" accesskey="m" title="Hide or display the side menu" onclick="switchMenu()" href="#"></a>
</div>
<div id="menu">
	<ul>
		<li class="header">
			Recherche
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=advancedSearch">
				<span>
					Recherche avancée
				</span>
			</a>
		</li>
		<li class="header">
			Boîte de réception générale
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=attente">
				<span class="<?php if (($_smarty_tpl->tpl_vars['awaitingMessagesCount']->value!='0')){?>zmenu<?php }else{ ?>zmenugr<?php }?>">
					Boîte de réception	<strong>[<?php echo $_smarty_tpl->tpl_vars['awaitingMessagesCount']->value;?>
]</strong>
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=unlabelled">
				<span class="<?php if (($_smarty_tpl->tpl_vars['unlabelledMessagesCount']->value!='0')){?>zmenu<?php }else{ ?>zmenugr<?php }?>">
					Boîte de réception (non-red.) <strong>[<?php echo $_smarty_tpl->tpl_vars['unlabelledMessagesCount']->value;?>
]</strong>
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=envoyes">
				<span>
					Messages envoyés
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=corbeille">
				<span>
					Corbeille
				</span>
			</a>
		</li>
		<li class="header">
			Boîte personnelle - <?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['name'];?>

		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=myMailBox">
				<span class="<?php if (($_smarty_tpl->tpl_vars['mailBoxCount']->value!='0')){?>zmenu<?php }else{ ?>zmenugr<?php }?>">
					Boîte de réception<strong> [<?php echo $_smarty_tpl->tpl_vars['mailBoxCount']->value;?>
]</strong>
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=mySentBox">
				<span>
					Messages envoyés
				</span>
			</a>
		</li>
		<li class="header">
			Vos libellés
		</li>
		<?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['label']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myLabels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
$_smarty_tpl->tpl_vars['label']->_loop = true;
?>			
			<li>
				<a href="admin.php?cat=messagerie&scat=labelAttente&id=<?php echo $_smarty_tpl->tpl_vars['label']->value['details']['id'];?>
">
					<span class="<?php if (($_smarty_tpl->tpl_vars['label']->value['messages']['count']!='0')){?>zmenu<?php }else{ ?>zmenugr<?php }?>">
						<?php echo $_smarty_tpl->tpl_vars['label']->value['details']['name'];?>
 <strong>[<?php echo $_smarty_tpl->tpl_vars['label']->value['messages']['count'];?>
]</strong>
					</span>
				</a>
			</li>
		<?php } ?>
		<li class="header">
			Témoignages
		</li>		
		<li>
			<a href="admin.php?cat=messagerie&scat=testimonies">
				<span>
					Archives <strong>[<?php echo $_smarty_tpl->tpl_vars['testimoniesCount']->value;?>
]</strong>
				</span>
			</a>
		</li>
		<li class="header">
			Options de messagerie
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=handleLabels">
				<span>
					Gestion des libellés
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=handleTopics">
				<span>
					Gestion des objets
				</span>
			</a>
		</li>
	</ul>
</div><?php }} ?>