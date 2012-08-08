<?php /* Smarty version Smarty-3.1.7, created on 2012-05-25 10:36:13
         compiled from "templates/admin/pages/board.activites.index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1020734004fbf447d105897-85865958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b246aa8b8b690b17f4574c52f6e1bd2fc24bea4b' => 
    array (
      0 => 'templates/admin/pages/board.activites.index.tpl',
      1 => 1334790539,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1020734004fbf447d105897-85865958',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbf447d1225f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbf447d1225f')) {function content_4fbf447d1225f($_smarty_tpl) {?><div id="main">
	<h6>Activités / Index</h6>
	<br /><hr /><br />

	<h1>Administration des activités de l'INREES</h1><br />

	<h3>Réputation des prochaines évènements</h3><br />

	<table cellspacing="1" style="width:550px;">
		<thead>
		<tr>
			<th><strong>Titre</strong></th>
			<th style="width:150px;"><strong>Stats</strong></th>
			<th style="width:150px;"><strong>Résas Moy</strong></th>
		</tr>
		</thead>
		<tbody>
			<<?php ?>?php
			//ORDER BY $orderby
			$dateD = date('Y-m-d-H-i-s') ; 
			$requete = "SELECT agendadetailsplus_id, agendadetailsplus_dateD, agendadetails_titre, agendadetails_stats FROM in_agendadetails, in_agendadetailsplus WHERE in_agendadetails.agendadetails_id = in_agendadetailsplus.agendadetailsplus_idagenda AND agendadetails_activites != '9' AND agendadetails_activites != '10' AND agendadetailsplus_dateD > '$dateD' ORDER BY agendadetailsplus_dateD ASC" ;
			$result = mysql_query($requete) ;
			while ($row = mysql_fetch_array($result) ) 
			{
				if($i == "0")
				{
					echo '<tr class="row1" onMouseover="this.className=\'row4\'" onMouseOut="this.className=\'row1\'" >' ;
				}
				else
				{
					echo '<tr class="row2" onMouseover="this.className=\'row4\'" onMouseOut="this.className=\'row2\'" >' ;
				}
				
				
				$ida = $row['agendadetailsplus_id'] ;
			
				$resACT = $row['agendadetailsplus_dateD'] ;
				$dateday = date('Y-m-d-H-i-s') ;
				$datecompare = round((strtotime($resACT) - strtotime($dateday))/(60*60*24)-1) + 1;
				
				
							$requete77 = "SELECT reservations_id, SUM(reservations_quantite) as quantiteTotale FROM in_reservations WHERE reservations_idagenda = '$ida' AND reservations_statut = '1' " ;
							$result77 = mysql_query($requete77) ;
							while ($row77 = mysql_fetch_array($result77) ) 
							{
								$resaLC = $row77['quantiteTotale'];
							}
			
			
			echo '
			<td>'.$row['agendadetails_titre'].'</td>
			<td><strong>'.$row['agendadetails_stats'].'</strong> lectures</td>
			<td>' ;
			
			$requete77 = "SELECT * FROM in_reservations WHERE reservations_idagenda = '$ida' AND reservations_statut = '1' AND TO_DAYS(NOW()) - TO_DAYS(reservations_timestamp) <= 10 " ;
			$result77 = mysql_query($requete77) ;
			$res = (mysql_num_rows($result77)/10) ;
			
			
			
			echo '<strong>'.$res.'/j ('.(($datecompare * $res) + $resaLC).')</strong>' ;				
			echo '</td>' ;
			echo '</tr>' ;
				
				if($i == "0")
				{
				$i++ ;
				}
				else
				{
				$i = "0" ;
				}
			}
			?<?php ?>>

		</tbody>
	</table><br />



	<h3>Réputation des derniers évènements</h3><br />

	<table cellspacing="1" style="width:550px;">
		<thead>
		<tr>
			<th><strong>Titre</strong></th>
			<th style="width:150px;"><strong>Stats</strong></th>
		</tr>
		</thead>
		<tbody>
			<<?php ?>?php
			//ORDER BY $orderby
			$dateD = date('Y-m-d-H-i-s') ; 
			$requete = "SELECT agendadetails_titre, agendadetails_stats FROM in_agendadetails, in_agendadetailsplus WHERE in_agendadetails.agendadetails_id = in_agendadetailsplus.agendadetailsplus_idagenda AND agendadetailsplus_dateD < '$dateD' ORDER BY agendadetailsplus_dateF DESC LIMIT 5" ;
			$result = mysql_query($requete) ;
			while ($row = mysql_fetch_array($result) ) 
			{
				if($i == "0")
				{
					echo '<tr class="row1" onMouseover="this.className=\'row4\'" onMouseOut="this.className=\'row1\'" >' ;
				}
				else
				{
					echo '<tr class="row2" onMouseover="this.className=\'row4\'" onMouseOut="this.className=\'row2\'" >' ;
				}
				
			echo '
			<td>'.$row['agendadetails_titre'].'</td>
			<td><strong>'.$row['agendadetails_stats'].'</strong> lectures</td>
			' ;
			
			echo '</tr>' ;
				
				if($i == "0")
				{
				$i++ ;
				}
				else
				{
				$i = "0" ;
				}
			}
			?<?php ?>>

		</tbody>
	</table><br />


	<h3>Réputation des top évènements</h3><br />

	<table cellspacing="1" style="width:550px;">
		<thead>
		<tr>
			<th><strong>Titre</strong></th>
			<th style="width:150px;"><strong>Stats</strong></th>
		</tr>
		</thead>
		<tbody>
			<<?php ?>?php
			//ORDER BY $orderby
			$dateD = date('Y-m-d-H-i-s') ; 
			$requete = "SELECT  agendadetails_titre, agendadetails_stats FROM in_agendadetails, in_agendadetailsplus WHERE in_agendadetails.agendadetails_id = in_agendadetailsplus.agendadetailsplus_idagenda ORDER BY agendadetails_stats DESC LIMIT 5" ;
			$result = mysql_query($requete) ;
			while ($row = mysql_fetch_array($result) ) 
			{
				if($i == "0")
				{
					echo '<tr class="row1" onMouseover="this.className=\'row4\'" onMouseOut="this.className=\'row1\'" >' ;
				}
				else
				{
					echo '<tr class="row2" onMouseover="this.className=\'row4\'" onMouseOut="this.className=\'row2\'" >' ;
				}
				
			echo '
			<td>'.$row['agendadetails_titre'].'</td>
			<td><strong>'.$row['agendadetails_stats'].'</strong> lectures</td>
			' ;
			
			echo '</tr>' ;
				
				if($i == "0")
				{
				$i++ ;
				}
				else
				{
				$i = "0" ;
				}
			}
			?<?php ?>>

		</tbody>
	</table><br />
</div><?php }} ?>