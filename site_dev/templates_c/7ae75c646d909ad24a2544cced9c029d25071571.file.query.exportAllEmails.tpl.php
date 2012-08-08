<?php /* Smarty version Smarty-3.1.7, created on 2012-06-05 00:55:08
         compiled from "templates/admin/pages/query.exportAllEmails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19930677554fc5efe903ddb7-61662912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ae75c646d909ad24a2544cced9c029d25071571' => 
    array (
      0 => 'templates/admin/pages/query.exportAllEmails.tpl',
      1 => 1338850504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19930677554fc5efe903ddb7-61662912',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc5efe906d35',
  'variables' => 
  array (
    'users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc5efe906d35')) {function content_4fc5efe906d35($_smarty_tpl) {?>FIRSTNAME;LASTNAME;EMAIL_ORIGINE;EMAIL;EMVCELLPHONE;EMAIL_FORMAT;TITLE;DATEOFBIRTH;SEED;CLIENTURN;SOURCE;CODE;SEGMENT;EMVADMIN1;EMVADMIN2;EMVADMIN3;EMVADMIN4;EMVADMIN5;CP;PAYS;MOTIVATION;DIVERSDESC;INSCRIPTION;VALIDITE;MYINREES;CB;PROFESSION_NUM;<br />
<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['firstName'];?>
;<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
;;<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
;;;;;<?php echo $_smarty_tpl->tpl_vars['user']->value['selection'];?>
;;;<?php echo $_smarty_tpl->tpl_vars['user']->value['actif'];?>
;;;;;;;<?php echo $_smarty_tpl->tpl_vars['user']->value['zipCode'];?>
;<?php echo $_smarty_tpl->tpl_vars['user']->value['country'];?>
;;;;;<?php echo $_smarty_tpl->tpl_vars['user']->value['myInrees'];?>
;<?php echo $_smarty_tpl->tpl_vars['user']->value['cb'];?>
;<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
;<br />
<?php } ?><?php }} ?>