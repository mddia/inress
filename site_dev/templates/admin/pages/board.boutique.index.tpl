<div id="main">
	<h6>Boutique / Index</h6>
	<br /><hr /><br />

	<h1>Boutique</h1><br />

	Module destiné à gérer les commandes de la boutique INREES.
	<br /><br />
	<div id="boardContent">
		<?php
		$requete = "SELECT * FROM in_emails, in_boutiquecommande WHERE in_emails.emails_id = boutiquecommande_idemail AND boutiquecommande_statut = '1' AND boutiquecommande_envoi = '0' " ;
		$res = mysql_num_rows(mysql_query($requete));
		?>

		<h3>Nombre de commandes à envoyer</h3><br />

		<table cellspacing="1" style="width:350px;">
			<col class="col1" /><col class="col2" /><col class="col1" /><col class="col2" />
			<thead>
			<tr>
				<th>Commandes</th>
				<th>Nombre</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>Nombre d'envois en attente</td>
				<td><strong>{$unsentOrdersCount}</strong></td>
			</tr>
		</tbody>
		</table>
			
		<br /><br /><hr />


		<h3>Gestion des stocks</h3><br />

		<table cellspacing="1" style="width:350px;">
			<thead>
			<tr>
				<th><strong>Titre</strong></th>
				<th style="width:75px;"><strong>Stock</strong></th>
			</tr>
			</thead>
			<tbody>
				<?php
				$i = "0" ;
				
				if($_GET["orderby"] == "name")
				{
					$orderby = "soutien_nom ASC" ;
				}
				elseif($_GET["orderby"] == "name2")
				{
					$orderby = "soutien_nom DESC" ;
				}
				elseif($_GET["orderby"] == "stock")
				{
					$orderby = "produitsdetails_stock ASC" ;
				}
				elseif($_GET["orderby"] == "stock2")
				{
					$orderby = "produitsdetails_stock DESC" ;
				}
				elseif($_GET["orderby"] == "categorie")
				{
					$orderby = "soutiencategories_titre ASC" ;
				}
				elseif($_GET["orderby"] == "categorie2")
				{
					$orderby = "soutiencategories_titre DESC" ;
				}
				elseif($_GET["orderby"] == "profession")
				{
					$orderby = "soutien_profession_fr ASC" ;
				}
				elseif($_GET["orderby"] == "profession2")
				{
					$orderby = "soutien_profession_fr DESC" ;
				}
				elseif($_GET["orderby"] == "actif")
				{
					$orderby = "soutien_actif ASC" ;
				}
				elseif($_GET["orderby"] == "actif2")
				{
					$orderby = "soutien_actif DESC" ;
				}
				else
				{
					$orderby = "produits_actif DESC, produitsdetails_stock ASC" ;
				}
				
				//ORDER BY $orderby
				$requete = "SELECT * FROM in_produits, in_produitsdetails, in_produitsfamilles WHERE in_produits.produits_id = in_produitsdetails.produitsdetails_idproduit AND in_produitsfamilles.produitsfamilles_id = in_produits.produits_idfamille AND produits_actif = '1' AND produitsdetails_stock <= '30' ORDER BY produitsdetails_stock DESC " ;
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
					
					$agenda_dateD = $row['produits_timestamp'] ;
					$resACT1 = substr($agenda_dateD, 0, 4) ;
					$resACT2 = substr($agenda_dateD, 5, 2) ;
					$resACT3 = substr($agenda_dateD, 8, 2) ;
				//<td>'.$resACT3.'/'.$resACT2.'/'.$resACT1.'</td>
				
				echo '
				<td><a href="http://admin.inrees.com/adm/index.php?cat=boutique&scat=editproduits&id='.$row['produitsdetails_id'].'"><strong>'.$row['produits_titre'].'</strong><br />'.$row['produits_sst'].'</a><br /></td>
				
				<td><center>' ;
				if($row['produitsdetails_stock'] <= 5)
				{
					echo '<font color="red"><strong>'.$row['produitsdetails_stock'].'</strong></font>' ;
				}
				elseif($row['produitsdetails_stock'] > 5 && $row['produitsdetails_stock'] <= 20)
				{
					echo '<font color="orange"><strong>'.$row['produitsdetails_stock'].'</strong></font>' ;
				}
				else
				{
					echo '<font color="green"><strong>'.$row['produitsdetails_stock'].'</strong></font>' ;
				}
				echo '</center></td></tr>' ;
					
					if($i == "0")
					{
					$i++ ;
					}
					else
					{
					$i = "0" ;
					}
				}
				?>

			</tbody>
		</table><br />


			

		<?php
		$requete = "SELECT SUM(boutiquecommandedetails_quantite) as total FROM in_boutiquecommande, in_boutiquecommandedetails WHERE boutiquecommande_id = boutiquecommandedetails_idcommande AND boutiquecommande_statut = '1' AND boutiquecommandedetails_idproduit = '41' " ;
		$req=mysql_query($requete);
		while ($row = mysql_fetch_array($req) ) 
		{
			$res = $row['total'];
		}


		$requete = "SELECT SUM(boutiquecommandedetails_quantite) as total FROM in_boutiquecommande, in_boutiquecommandedetails WHERE boutiquecommande_id = boutiquecommandedetails_idcommande AND boutiquecommande_statut = '1' AND boutiquecommandedetails_idproduit = '48' " ;
		$req=mysql_query($requete);
		while ($row = mysql_fetch_array($req) ) 
		{
			$res2 = $row['total'];
		}
		?>

		<h3>Ventes par produits depuis 50 jours</h3><br />

		<table cellspacing="1" style="width:350px;">
			<col class="col1" /><col class="col2" /><col class="col1" /><col class="col2" />
			<thead>
			<tr>
				<th>Commandes</th>
				<th>Nombre</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$requete = "SELECT SUM(boutiquecommandedetails_quantite) as total, produits_titre FROM in_boutiquecommande, in_boutiquecommandedetails, in_produits, in_produitsdetails WHERE produits_id = produitsdetails_idproduit AND produitsdetails_id = boutiquecommandedetails_idproduit AND boutiquecommande_id = boutiquecommandedetails_idcommande AND boutiquecommande_statut = '1' AND TO_DAYS(NOW()) - TO_DAYS(boutiquecommande_timestamp) < 50 GROUP BY produits_id  ORDER BY total DESC" ;
			//echo $requete ;
			$req=mysql_query($requete);
			while ($row = mysql_fetch_array($req) ) 
			{
				echo '<tr><td>'.$row['produits_titre'].'</td><td><strong>'.$row['total'].'</strong></td></tr>';
			}
			?>
		</tbody>
		</table>
			
		<br /><br />

		<h3>Ventes par produits depuis l'origine</h3><br />

		<table cellspacing="1" style="width:350px;">
			<col class="col1" /><col class="col2" /><col class="col1" /><col class="col2" />
			<thead>
			<tr>
				<th>Commandes</th>
				<th>Nombre</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$requete = "SELECT SUM(boutiquecommandedetails_quantite) as total, produits_titre FROM in_boutiquecommande, in_boutiquecommandedetails, in_produits, in_produitsdetails WHERE produits_id = produitsdetails_idproduit AND produitsdetails_id = boutiquecommandedetails_idproduit AND boutiquecommande_id = boutiquecommandedetails_idcommande AND boutiquecommande_statut = '1' GROUP BY produits_id  ORDER BY total DESC" ;
			//echo $requete ;
			$req=mysql_query($requete);
			while ($row = mysql_fetch_array($req) ) 
			{
				echo '<tr><td>'.$row['produits_titre'].'</td><td><strong>'.$row['total'].'</strong></td></tr>';
			}
			?>
		</tbody>
		</table>
			
		<br /><br />
		72 mag 9 avant OP SP Noel 2011
	</div>
</div>