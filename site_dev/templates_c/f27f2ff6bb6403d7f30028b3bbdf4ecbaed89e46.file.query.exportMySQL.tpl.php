<?php /* Smarty version Smarty-3.1.7, created on 2012-05-22 14:45:19
         compiled from "templates/admin/pages/query.exportMySQL.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20232287304fbb8a5f505ed2-94754432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f27f2ff6bb6403d7f30028b3bbdf4ecbaed89e46' => 
    array (
      0 => 'templates/admin/pages/query.exportMySQL.tpl',
      1 => 1335491930,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20232287304fbb8a5f505ed2-94754432',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aboTitle' => 0,
    'numero' => 0,
    'timestamp' => 0,
    'aboId' => 0,
    'myPayants' => 0,
    'my' => 0,
    'myGratuits' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbb8a5f56854',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbb8a5f56854')) {function content_4fbb8a5f56854($_smarty_tpl) {?>-- -------------------------------------------------------------------<br />
-- <strong>REQUÊTES SQL : Insertion des routages pour le mag <?php echo $_smarty_tpl->tpl_vars['aboTitle']->value;?>
 n°<?php echo $_smarty_tpl->tpl_vars['numero']->value;?>
</strong><br />
-- -------------------------------------------------------------------<br />
<br />
<br />
-- ------------- <strong>MISE À JOUR TABLE in_magazine</strong> ------------- <br />
UPDATE in_magazine SET routage = '<?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
' WHERE numero = '<?php echo $_smarty_tpl->tpl_vars['numero']->value;?>
' AND aboId = <?php echo $_smarty_tpl->tpl_vars['aboId']->value;?>
 LIMIT 1;<br />
<br />
<br />
-- ------------- MyINREES abonnés  ------------- <br />
<br />
<?php  $_smarty_tpl->tpl_vars['my'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['my']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myPayants']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['my']->key => $_smarty_tpl->tpl_vars['my']->value){
$_smarty_tpl->tpl_vars['my']->_loop = true;
?>
	INSERT INTO in_emailsmagenvoi VALUES('', '<?php echo $_smarty_tpl->tpl_vars['numero']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['aboId']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['my']->value['user']['id'];?>
');<br />
<?php } ?>
<br />
<br />
-- ------------- MyINREES gratuits  ------------- <br />
<br />
<?php  $_smarty_tpl->tpl_vars['my'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['my']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myGratuits']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['my']->key => $_smarty_tpl->tpl_vars['my']->value){
$_smarty_tpl->tpl_vars['my']->_loop = true;
?>
	INSERT INTO in_emailsmagenvoi VALUES('', '<?php echo $_smarty_tpl->tpl_vars['numero']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['aboId']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['my']->value['user']['id'];?>
');<br />
<?php } ?><?php }} ?>