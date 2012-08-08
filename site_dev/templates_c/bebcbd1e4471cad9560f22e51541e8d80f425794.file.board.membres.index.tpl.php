<?php /* Smarty version Smarty-3.1.7, created on 2012-05-13 23:55:13
         compiled from "templates/admin/pages/board.membres.index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24259164fb02dc1791cd3-00759956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bebcbd1e4471cad9560f22e51541e8d80f425794' => 
    array (
      0 => 'templates/admin/pages/board.membres.index.tpl',
      1 => 1334007802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24259164fb02dc1791cd3-00759956',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb02dc179f32',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb02dc179f32')) {function content_4fb02dc179f32($_smarty_tpl) {?><div id="main">
	<h6>abonnés / Index</h6>
	<br /><hr /><br />
	<h1>Administration des abonnés de l'INREES</h1><br />

	<h3>Gestion des abonnés</h3><br />

	<table cellspacing="1" style="width:350px;">
		<col class="col1" /><col class="col2" /><col class="col1" /><col class="col2" />
		<thead>
			<tr>
				<th>Thème</th>
				<th>stats</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Nombre d'envois en attente</td>
				<td><strong>
				$x personne(s)</strong></td>
			</tr>
			<tr>
				<td>En attente depuis...</td>
				<td>$x jour(s)</td>
			</tr>
		</tbody>
	</table>
	<br /><br />
	<br /><hr />
</div><?php }} ?>