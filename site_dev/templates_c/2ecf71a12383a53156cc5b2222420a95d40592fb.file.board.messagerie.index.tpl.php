<?php /* Smarty version Smarty-3.1.7, created on 2012-05-16 12:45:32
         compiled from "templates/admin/pages/board.messagerie.index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14537449324fb3854c87a652-24863864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ecf71a12383a53156cc5b2222420a95d40592fb' => 
    array (
      0 => 'templates/admin/pages/board.messagerie.index.tpl',
      1 => 1334007805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14537449324fb3854c87a652-24863864',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'awaitingMessagesCount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb3854c896e7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb3854c896e7')) {function content_4fb3854c896e7($_smarty_tpl) {?><div id="main">
	<h6>Messagerie / Index</h6>
	<br /><hr /><br />

	<img style="margin-right:75px;" align="right" src="http://admin.inrees.com/adm/images/enveloppe.png" width="100" height="100" />
	<h1>Messagerie de l'INREES</h1><br />

	<h3>Statistiques - <font class="error"><?php echo $_smarty_tpl->tpl_vars['awaitingMessagesCount']->value;?>
 messages en attente</font></h3><br />

	<table cellspacing="1" style="width:450px;">
		<thead>
			<tr>
				<th style="width:350px;">DESCRIPTION</th>
				<th style="width:100px;">Messages</th>
			</tr>
		</thead>
		<tbody>
			<!--if($count> 0) "<tr class='row5red'>" else "<tr class='row9green'>"-->
			<tr class='row5red'>
				<td><strong>Boite de réception</strong></td>
				<td><strong><?php echo $_smarty_tpl->tpl_vars['awaitingMessagesCount']->value;?>
</strong></td>
			</tr>
			<tr class='row6red'>
				<td>Dernier message en attente depuis...</td>
				<td><<?php ?>?php echo $datecompare ; ?<?php ?>> jour(s)</td>
			</tr>
		</tbody>
	</table>

	<br />

	<h3>Statistiques sur tous les messages reçus</h3><br />

	<table cellspacing="1" style="width:450px;">
		<thead>
			<tr>
				<th style="width:350px;">Date</th>
				<th style="width:100px;">Messages</th>
				<th style="width:100px;">MOY. /J</th>
			</tr>
		</thead>
		<tbody>
			<tr class='row2'>
				<td><strong>Aujourd'hui</strong></td>
				<td><strong><<?php ?>?php echo $res11 ; ?<?php ?>></strong></td>
				<td><strong><<?php ?>?php echo $res11 ; ?<?php ?>> m/j</strong></td>
			</tr>
			<tr class='row1'>
				<td>En [$mois] (Ce mois-ci)</td>
				<td>[$count]</td>
				<td>[$average] m/j</td>
			</tr>
			<tr class='row1'>
				<td>En [$mois-1]</td>
				<td>[$count]</td>
				<td>[$average] m/j</td>
			</tr>
			<tr class='row1'>
				<td>En [$mois-2]</td>
				<td>[$count]</td>
				<td>[$average] m/j</td>
			</tr>
			<tr class='row2'>
				<td><strong>Total depuis 3 mois</strong></td>
				<td><strong>[$count]</strong></td>
				<td><strong>[$average] m/j</strong></td>
			</tr>
			<tr class='row4'>
				<td>Total depuis la création</td>
				<td>[$count]</td>
				<td>[$average] m/j</td>
			</tr>
		</tbody>
	</table>

	<br />

	<h3>Statistiques sur les messages envoyés ces 150 derniers jours</h3><br />

	<table cellspacing="1" style="width:450px;">
		<thead>
			<tr>
				<th style="width:350px;">Modérateurs</th>
				<th style="width:100px;">Messages</th>
				<th style="width:100px;">%</th>
			</tr>
		</thead>
		<tbody>		
			<tr class='row1'>
				<td>
					<strong>[$firstName] [$name]</strong>
				</td>
				<td>
					<strong>[$total]</strong>
				</td>
				<td>
					[$?] %
				</td>
			</tr>
			<tr class='row4'>
				<td>	
					Tous les professionnels de santé
				</td>
				<td>
					[$total]
				</td>
				<td>
					[$?] %
				</td>
			</tr>
		</tbody>
	</table>
</div><?php }} ?>