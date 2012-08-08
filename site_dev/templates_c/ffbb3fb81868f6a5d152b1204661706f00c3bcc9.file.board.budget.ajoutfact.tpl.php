<?php /* Smarty version Smarty-3.1.7, created on 2012-05-16 01:48:56
         compiled from "templates/admin/pages/board.budget.ajoutfact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7910481794fb2eb68b7be70-92837026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffbb3fb81868f6a5d152b1204661706f00c3bcc9' => 
    array (
      0 => 'templates/admin/pages/board.budget.ajoutfact.tpl',
      1 => 1337125734,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7910481794fb2eb68b7be70-92837026',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb2eb68e677e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb2eb68e677e')) {function content_4fb2eb68e677e($_smarty_tpl) {?><div id="main">
	<h6>Budget / Comptabilité / Ajouter une facture</h6>
	<br /><hr /><br />

	<h1>Comptabilité</h1><br />

	<h2>Ajouter une facture</h2><br />

	Inscrivez les informations concernant la facture.
	<br /><br />

	<form method="post" action="http://admin.inrees.com/adm/requetes-budget.php?ajoutfact=1">
		<input name="statut" type="hidden" value="1" />

		<table>
			<tr>
				<td style="text-align:right;"><font style="color:red;">
					<strong>ATTENTION => FACTURES</strong></font>
				</td>
				<td style="text-align:left;"></td>
			</tr>
			<tr>	
				<td align="right">N° de chèque :</td>
				<td align="left">
					<input style="width:250px;" name="reference" type="text" value="" />
				</td>
			</tr>
			<tr>
				<td style="text-align:right;">Date (facture) :</td><td style="text-align:left;">
					<<?php ?>?php
					$Dannee = date('Y') ;
					$Dmois = date('m') ;
					$Djour = date('d') ;
					$Dhours24 = date('H') ;
					$Dmin = "00" ;
					?<?php ?>>
					<select style="width:50px;" name="Djours" size="1">
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "01"){?>selected="selected"<?php }?> value="01">01</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "02"){?>selected="selected"<?php }?> value="02">02</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "03"){?>selected="selected"<?php }?> value="03">03</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "04"){?>selected="selected"<?php }?> value="04">04</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "05"){?>selected="selected"<?php }?> value="05">05</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "06"){?>selected="selected"<?php }?> value="06">06</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "07"){?>selected="selected"<?php }?> value="07">07</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "08"){?>selected="selected"<?php }?> value="08">08</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "09"){?>selected="selected"<?php }?> value="09">09</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "10"){?>selected="selected"<?php }?> value="10">10</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "11"){?>selected="selected"<?php }?> value="11">11</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "12"){?>selected="selected"<?php }?> value="12">12</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "13"){?>selected="selected"<?php }?> value="13">13</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "14"){?>selected="selected"<?php }?> value="14">14</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "15"){?>selected="selected"<?php }?> value="15">15</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "16"){?>selected="selected"<?php }?> value="16">16</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "17"){?>selected="selected"<?php }?> value="17">17</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "18"){?>selected="selected"<?php }?> value="18">18</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "19"){?>selected="selected"<?php }?> value="19">19</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "20"){?>selected="selected"<?php }?> value="20">20</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "21"){?>selected="selected"<?php }?> value="21">21</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "22"){?>selected="selected"<?php }?> value="22">22</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "23"){?>selected="selected"<?php }?> value="23">23</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "24"){?>selected="selected"<?php }?> value="24">24</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "25"){?>selected="selected"<?php }?> value="25">25</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "26"){?>selected="selected"<?php }?> value="26">26</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "27"){?>selected="selected"<?php }?> value="27">27</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "28"){?>selected="selected"<?php }?> value="28">28</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "29"){?>selected="selected"<?php }?> value="29">29</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "30"){?>selected="selected"<?php }?> value="30">30</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "31"){?>selected="selected"<?php }?> value="31">31</option>
					</select>
			 
					<select style="width:150px;" name="Dmois" size="1">
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "01"){?>selected="selected"<?php }?> value="01">01 - Janvier</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "02"){?>selected="selected"<?php }?> value="02">02 - Février</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "03"){?>selected="selected"<?php }?> value="03">03 - Mars</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "04"){?>selected="selected"<?php }?> value="04">04 - Avril</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "05"){?>selected="selected"<?php }?> value="05">05 - Mai</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "06"){?>selected="selected"<?php }?> value="06">06 - Juin</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "07"){?>selected="selected"<?php }?> value="07">07 - Juillet</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "08"){?>selected="selected"<?php }?> value="08">08 - Aout</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "09"){?>selected="selected"<?php }?> value="09">09 - Septembre</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "10"){?>selected="selected"<?php }?> value="10">10 - Octobre</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "11"){?>selected="selected"<?php }?> value="11">11 - Novembre</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "12"){?>selected="selected"<?php }?> value="12">12 - Décembre</option>
					</select>
			 
					<select style="width:75px;" name="Dannee" size="1">
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['year'] = "2009"){?>selected="selected"<?php }?> value="2009">2009</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['year'] = "2010"){?>selected="selected"<?php }?> value="2010">2010</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['year'] = "2011"){?>selected="selected"<?php }?> value="2011">2011</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['year'] = "2012"){?>selected="selected"<?php }?> value="2012">2012</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['year'] = "2013"){?>selected="selected"<?php }?> value="2012">2013</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['year'] = "2014"){?>selected="selected"<?php }?> value="2012">2014</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;">Date (encaiss.) :</td><td style="text-align:left;">
					<select style="width:50px;" name="Ejours" size="1">
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "00"){?>selected="selected"<?php }?> value="00">00</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "01"){?>selected="selected"<?php }?> value="01">01</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "02"){?>selected="selected"<?php }?> value="02">02</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "03"){?>selected="selected"<?php }?> value="03">03</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "04"){?>selected="selected"<?php }?> value="04">04</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "05"){?>selected="selected"<?php }?> value="05">05</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "06"){?>selected="selected"<?php }?> value="06">06</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "07"){?>selected="selected"<?php }?> value="07">07</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "08"){?>selected="selected"<?php }?> value="08">08</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "09"){?>selected="selected"<?php }?> value="09">09</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "10"){?>selected="selected"<?php }?> value="10">10</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "11"){?>selected="selected"<?php }?> value="11">11</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "12"){?>selected="selected"<?php }?> value="12">12</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "13"){?>selected="selected"<?php }?> value="13">13</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "14"){?>selected="selected"<?php }?> value="14">14</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "15"){?>selected="selected"<?php }?> value="15">15</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "16"){?>selected="selected"<?php }?> value="16">16</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "17"){?>selected="selected"<?php }?> value="17">17</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "18"){?>selected="selected"<?php }?> value="18">18</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "19"){?>selected="selected"<?php }?> value="19">19</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "20"){?>selected="selected"<?php }?> value="20">20</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "21"){?>selected="selected"<?php }?> value="21">21</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "22"){?>selected="selected"<?php }?> value="22">22</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "23"){?>selected="selected"<?php }?> value="23">23</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "24"){?>selected="selected"<?php }?> value="24">24</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "25"){?>selected="selected"<?php }?> value="25">25</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "26"){?>selected="selected"<?php }?> value="26">26</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "27"){?>selected="selected"<?php }?> value="27">27</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "28"){?>selected="selected"<?php }?> value="28">28</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "29"){?>selected="selected"<?php }?> value="29">29</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "30"){?>selected="selected"<?php }?> value="30">30</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['day'] = "31"){?>selected="selected"<?php }?> value="31">31</option>
					</select>
			 
					<select style="width:150px;" name="Emois" size="1">
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "00"){?>selected="selected"<?php }?> value="01">00 - ...</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "01"){?>selected="selected"<?php }?> value="01">01 - Janvier</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "02"){?>selected="selected"<?php }?> value="02">02 - Février</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "03"){?>selected="selected"<?php }?> value="03">03 - Mars</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "04"){?>selected="selected"<?php }?> value="04">04 - Avril</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "05"){?>selected="selected"<?php }?> value="05">05 - Mai</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "06"){?>selected="selected"<?php }?> value="06">06 - Juin</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "07"){?>selected="selected"<?php }?> value="07">07 - Juillet</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "08"){?>selected="selected"<?php }?> value="08">08 - Aout</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "09"){?>selected="selected"<?php }?> value="09">09 - Septembre</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "10"){?>selected="selected"<?php }?> value="10">10 - Octobre</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "11"){?>selected="selected"<?php }?> value="11">11 - Novembre</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['month'] = "12"){?>selected="selected"<?php }?> value="12">12 - Décembre</option>
					</select>
			 
					<select style="width:75px;" name="Eannee" size="1">
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['year'] = "2009"){?>selected="selected"<?php }?> value="2009">2009</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['year'] = "2010"){?>selected="selected"<?php }?> value="2010">2010</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['year'] = "2011"){?>selected="selected"<?php }?> value="2011">2011</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['year'] = "2012"){?>selected="selected"<?php }?> value="2012">2012</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['year'] = "2013"){?>selected="selected"<?php }?> value="2012">2013</option>
						<option <?php if (!isset($_smarty_tpl->tpl_vars['today']) || !is_array($_smarty_tpl->tpl_vars['today']->value)) $_smarty_tpl->createLocalArrayVariable('today');
if ($_smarty_tpl->tpl_vars['today']->value['year'] = "2014"){?>selected="selected"<?php }?> value="2012">2014</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"></td>
			</tr>
			<tr>
				<td colspan="2"></td>
			</tr>
			<tr>
				<td align="right">Titre / Description :</td>
				<td align="left">
					<input style="width:250px;" name="titre" type="text" value="" />
				</td>
			</tr>
		<tr><td align="right">Famille :</td><td align="left">
		<select style="width:250px;" name="idcat" size="1">
			<<?php ?>?php
			$result = mysql_query("SELECT * FROM admin_factfamille ORDER BY factfamille_id ASC");
			while ($row = mysql_fetch_array ($result) ) 
			{
				$idfact = $row['factfamille_id'] ;
				$result75 = mysql_query("SELECT * FROM admin_factfamilles WHERE factfamilles_idcat = '$idfact' ORDER BY factfamilles_id ASC");
				while($row75 = mysql_fetch_array($result75) ) 
				{
					echo '<option value="'.$row75['factfamilles_id'] ;
					if($idcat == $row75['factfamilles_id'])
					{
						echo 'selected="selected" ';
					}
					echo '">'.$row['factfamille_titre'].' - '.$row75['factfamilles_titre'].'</option>';
				}
			}
			?<?php ?>>
		</select>
		</td></tr>
		<tr><td align="right"><strong>Prix HT :</strong></td><td align="left">
		<input style="width:35px;" name="pht1" type="text" value="0" />.<input style="width:25px;" name="pht2" type="text" value="00" /> € (en centimes)</td></tr>
		<tr><td align="right">TVA :</td><td align="left">
		<select style="width:175px;" name="tva" size="1">
			<option value="0">Pas de TVA</option>
			<option value="210">2,10 (Presse)</option>
			<option value="550">5,50 (Livres)</option>
			<option value="1960">19,60</option>
			<option value="1">TVA multiples</option>
		</select>
		</td></tr>
		<tr><td colspan="2"></td></tr>

		<tr><td align="right"><strong>Prix TTC :</strong></td><td align="left">
		<input style="width:35px;" name="prix" type="text" value="0" />.<input style="width:25px;" name="prix2" type="text" value="00" /> € (en centimes)</td></tr>
		<tr><td align="right">Mode :</td><td align="left">
		<select style="width:175px;" name="mode" size="1">
			<option value="Chèque">Chèque</option>
			<option value="Remise de chèques">Remise de chèques</option>
			<option value="Carte Bancaire">Carte Bancaire</option>
			<option value="Prélèvement">Prélèvement</option>
			<option value="Virement">Virement</option>
		</select>
		</td></tr>
		<tr><td align="right">Validé :</td><td align="left">
		<select style="width:175px;" name="valid" size="1">
			<option <?php if (!isset($_smarty_tpl->tpl_vars['valid'])) $_smarty_tpl->tpl_vars['valid'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['valid']->value = 0){?>selected="selected"<?php }?>value="0">Non-validé</option>
			<option <?php if (!isset($_smarty_tpl->tpl_vars['valid'])) $_smarty_tpl->tpl_vars['valid'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['valid']->value = 1){?>selected="selected"<?php }?>value="1">Validé</option>
		</select><br /><em>Attention : vérifier l'encaissement via la feuille de compte avant !</em>
		</td></tr>
		<tr><td colspan="2"></td></tr>

		<tr><td align="right">Facture :</td><td align="left">
		<select style="width:175px;" name="atfact" size="1">
			<option value="0">OK</option>
			<option value="1">Attention: Pas de facture</option>
		</select>
		</td></tr>


		<tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr>
		<tr><td align="right"><input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Valider l'inscription" /></td><td align="left"></td></tr>
		</table>
	</form>

	<br /><br /><br />
</div><?php }} ?>