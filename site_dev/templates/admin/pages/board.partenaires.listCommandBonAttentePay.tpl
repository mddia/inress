<div id="main">
	<h6>Magazine / Diffusion</h6>
	<br /><hr /><br />



	<h1>Liste des bons de livraison</h1><br />

	Liste des bons de livraison.
	<br /><br />


	<table cellspacing="1" style="width:100%;">
		<thead>
		<tr>
			<th>id</th>
			<th><strong>Partenaire</strong> </th>
			<th><strong>Ville</strong> </th>
			<th><strong>COMMANDES</strong> </th>
			<th style="width:75px;"><strong>Date</strong> <a href="http://admin.inrees.com/adm/index.php?cat=magazine&scat=gestioncommandes&orderby=<?php if($_GET["orderby"] == "montant") { echo "montant2" ; } else { echo "montant" ; } ?>"><img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" /></a></th>
			<th><strong>Retour</strong> <a href="http://admin.inrees.com/adm/index.php?cat=magazine&scat=gestioncommandes&orderby=<?php if($_GET["orderby"] == "reglement") { echo "reglement2" ; } else { echo "reglement" ; } ?>"><img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" /></a></th>
			<th><strong>FACTURE</strong> </th>
			<th><strong>envoi</strong> </th>
			<th style="width:55px;"><strong>Edit</strong></th>
		</tr>
		</thead>
		<tbody>
			<?php
			if($_GET['limit'] == "1" || !empty($_GET['where']) )
			{
				$limit = " " ;
			}
			else
			{
				$limit = " LIMIT 50" ;
			}
			$orderby = "libcomm_dejaenvoye ASC, libcomm_factok ASC, libcomm_retour ASC, libcomm_date DESC" ;
			
			$requete = "SELECT * FROM admin_libcomm, in_partenaires WHERE partenaires_id = libcomm_idpartner AND libcomm_statut = '1' AND libcomm_paiement = '0' AND libcomm_dejaenvoye = '1' AND libcomm_factok = '1' ORDER BY ".$orderby.$limit ;
			$result = mysql_query($requete);
			while ($row = mysql_fetch_array ($result) ) 
			{
				if($i === 0)
				{
					$changeclass = '<tr class=\'row2\' onMouseover="this.className=\'row4\'" onMouseOut="this.className=\'row2\'" >' ;
					$i++;
				}
				else
				{
					$changeclass = '<tr class=\'row1\' onMouseover="this.className=\'row4\'" onMouseOut="this.className=\'row1\'" >' ;
					$i = 0 ;
				}
				
				
				if($row['libcomm_factok'] == 1 && $row['libcomm_paiement'] == 0 && $row['libcomm_dejaenvoye'] == 1)
				{
						if($i === 0)
						{
							$changeclass = '<tr class="row6red" onMouseover="this.className=\'row7red\'" onMouseOut="this.className=\'row6red\'" >' ;
							$i++;
						}
						else
						{
							$changeclass = '<tr class="row5red" onMouseover="this.className=\'row7red\'" onMouseOut="this.className=\'row5red\'" >' ;
							$i = 0 ;
						}
				}

				
				
				echo $changeclass.'
				<td>'.$row['libcomm_id'].'</td>
				<td><a href="http://admin.inrees.com/adm/index.php?cat=partenaires&scat=partnerCommandBon&id='.$row['partenaires_id'].'">'.$row['partenaires_nom'].'</a></td>
				<td>'.$row['partenaires_ville'].'</td>
				<td>' ;
				
	$idcom = $row['libcomm_id'] ;
	$requete7575 = "SELECT * FROM admin_libcommdetails, in_produits, in_produitsdetails WHERE produits_id = produitsdetails_idproduit AND produitsdetails_id = libcommdetails_idproduit AND libcommdetails_idcomm = '$idcom' " ;
	$result7575 = mysql_query($requete7575);
	while ($row75 = mysql_fetch_array ($result7575) ) 
	{
		echo ''.$row75['produits_titre'].' (Quantité : <strong>'.$row75['libcommdetails_quantite'].'</strong>)' ;
		
		if($row75['libcommdetails_vendu'] == "NULL" || empty($row75['libcommdetails_vendu']) )
		{
			if($row['libcomm_factok'] == 1)
			{
			echo '<a href="http://admin.inrees.com/adm/index.php?cat=partenaires&scat=bonDepotVendu&id='.$row75['libcommdetails_id'].'" title="Vendu">
			<img src="http://admin.inrees.com/adm/images/iconEdit.gif" width="12px" height="12px" /></a>';
			}
			

		}
		else
		{
			echo ' <font style="color:green;">x'.$row75['libcommdetails_vendu'].'</font>';
		}
		
		echo '<br />' ;
	}
				
				
				$date = $row['libcomm_date'];
									$resACTannee35 = substr($date, 0, 4) ;
									$resACTmois35 = substr($date, 5, 2) ;
									$resACTjour35 = substr($date, 8, 2) ;
				
				$retour = $row['libcomm_retour'];
									$resACTannee37 = substr($retour, 0, 4) ;
									$resACTmois37 = substr($retour, 5, 2) ;
									$resACTjour37 = substr($retour, 8, 2) ;	
										
				echo '</td>' ;
				echo '<td align="right"><center>'.$resACTjour35.'/'.$resACTmois35.'/'.$resACTannee35.'</center></td>';
				
				if($retour >= date('Y-m-d') || $row['libcomm_factok'] == 1)
				{
					echo '<td align="right"><center>'.$resACTmois37.'/'.$resACTannee37.'</center></td>';
				}
				else
				{
					echo '<td align="right"><center><font style="color:red;"><strong>'.$resACTmois37.'/'.$resACTannee37.'</strong></font></center></td>';
				}
				
				
				
				echo '<td>';
				if($row['libcomm_factok'] == 1)
				{
							$idpartlib = $row['libcomm_id'];
							$requete7575 = "SELECT * FROM admin_libcomm, admin_numfactures WHERE numfactures_id = libcomm_factid AND libcomm_id = '$idpartlib' " ;
							//echo $requete7575 ;
							$result7575 = mysql_query($requete7575);
							while ($row75 = mysql_fetch_array ($result7575) ) 
							{
								$idnum = $row75['numfactures_idadmin'];
								echo '<strong>'.$row75['numfactures_numero'].'</strong>' ;
							}
				}
				
				echo '</td>' ;
				
				
				
				if($row['libcomm_dejaenvoye'] == 1)
				{
					if($row['libcomm_factok'] == 0)
					{
					echo '<td align="left"><font style="color:green;">Déjà envoyé</font></td>';
					}
					else
					{
					echo '<td></td>';
					}
					
				}
				else
				{
						echo '<td align="left"><font style="color:red;">Non-envoyé</font></td>';
				}
				
				
				
				
				
				
				
				echo'
				<td align="center">' ;
				if($row['libcomm_dejaenvoye'] == 0)
				{
				
				
			if($row['libcomm_factok'] == 1)
				{
			echo '<a target="_blank" href="http://admin.inrees.com/adm/factures-perso.php?id='.$idnum.'&no=13" title="Facture"><img src="http://admin.inrees.com/adm/images/email_icon.gif" width="14px" height="14px" /></a> ' ;
			echo '<a href="http://admin.inrees.com/adm/bonDepot33factEnvoi.php?id='.$row['libcomm_id'].'" title="Facture"><img src="http://admin.inrees.com/adm/images/icon_sync.gif" width="14px" height="14px" /></a>' ;
				}
			else
				{
			echo '<a target="_blank" href="http://admin.inrees.com/adm/bonDepot33.php?id='.$row['libcomm_id'].'" title=""><img src="http://admin.inrees.com/adm/images/colis.png" width="15px" height="15px" /></a>
			<a href="http://admin.inrees.com/adm/requetes.php?envoyeBonBon='.$row['libcomm_id'].'" title="Envoyer"><img src="http://admin.inrees.com/adm/images/icon_envoi-mail.gif" width="14px" height="14px" /></a> ' ;
				}
			
			
			echo '
			' ;
				}
				else
				{
				if($row['libcomm_factok'] == 0)
				{
			echo '<a href="http://admin.inrees.com/adm/index.php?cat=partenaires&scat=bonDepotFacture&id='.$row['libcomm_idpartner'].'&idfact='.$row['libcomm_id'].'" title="Facture"><img src="http://admin.inrees.com/adm/images/iconEdit.gif" width="14px" height="14px" /></a>' ;
				}
				}
				
				
				
	//			if($row['boutiquecommande_envoi'] == 0 && $row['boutiquecommande_statut'] == 1)
	//			{
	//				echo '<a href="javascript:validerEnvoiCommande('.$row['boutiquecommande_id'].')" title="Confirmer l\'envoi"><img src="http://admin.inrees.com/adm/images/icon_envoi-mail.gif" width="14px" height="14px" /></a> ' ;
	//			}
	//			if($row['boutiquecommande_statut'] == 0 && $row['boutiquecommande_statut'] == 0)
	//			{
	//				echo '<a href="javascript:supprimerEnvoiCommande('.$row['boutiquecommande_id'].')" title="Supprimer cette commande"><img src="http://admin.inrees.com/adm/images/icon_annuler.gif" width="14px" height="14px" /></a> ' ;
	//			}
				
				echo '</td></tr>' ;
				
				
				
			}
			?>
		</tbody>
	</table>
</div>