
					<!--
	if($_GET['details'] == "my")
	{

		
		<tr><td style="text-align:right;"><strong>Validité Abonnement INREES :</strong></td><td style="text-align:left;">
		<input name="liste" type="hidden" value="{$user.liste}" />
		<input name="inscription1" type="hidden" value="echo $inscription1}" />
		<input name="inscription2" type="hidden" value="echo $inscription2}" />
		<input name="mACTIF" type="hidden" value="{$user.mACTIF}" />
		<input name="magazine" type="hidden" value="{$user.journal}" />
		<input name="carte" type="hidden" value="{$user.carte}" />
		
		<select style="width:175px;" name="myinrees" size="1">
				<option
				if($emails_myinrees == "1")
				{
					echo 'selected="selected" ' ;
				} 
				value="1">Oui</option>
				<option 
				if($emails_myinrees == "0")
				{
					echo 'selected="selected" ' ;
				} 
				value="0">Non</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;">Validité :</td><td style="text-align:left;">
		<select style="width:145px;" name="validite2" size="1">
				<option value=""></option>
				<option
				if($validite2 == "01")
				{
					echo 'selected="selected" ' ;
				} 
				value="01">01 - Janvier</option>
				<option 
				if($validite2 == "02")
				{
					echo 'selected="selected" ' ;
				} 
				value="02">02 - Février</option>
				<option 
				if($validite2 == "03")
				{
					echo 'selected="selected" ' ;
				} 
				value="03">03 - Mars</option>
				<option 
				if($validite2 == "04")
				{
					echo 'selected="selected" ' ;
				} 
				value="04">04 - Avril</option>
				<option 
				if($validite2 == "05")
				{
					echo 'selected="selected" ' ;
				} 
				value="05">05 - Mai</option>
				<option 
				if($validite2 == "06")
				{
					echo 'selected="selected" ' ;
				} 
				value="06">06 - Juin</option>
				<option 
				if($validite2 == "07")
				{
					echo 'selected="selected" ' ;
				} 
				value="07">07 - Juillet</option>
				<option 
				if($validite2 == "08")
				{
					echo 'selected="selected" ' ;
				} 
				value="08">08 - Aout</option>
				<option 
				if($validite2 == "09")
				{
					echo 'selected="selected" ' ;
				} 
				value="09">09 - Septembre</option>
				<option 
				if($validite2 == "10")
				{
					echo 'selected="selected" ' ;
				} 
				value="10">10 - Octobre</option>
				<option 
				if($validite2 == "11")
				{
					echo 'selected="selected" ' ;
				} 
				value="11">11 - Novembre</option>
				<option 
				if($validite2 == "12")
				{
					echo 'selected="selected" ' ;
				} 
				value="12">12 - Décembre</option>
		</select>
		<select style="width:105px;" name="validite1" size="1">
				<option value=""></option>
				
				$datemin3 = 2007 ;
				$dated3 = date('Y')  ;
				$datemax3 = date('Y') + 3 ;
				
				while($datemin3 != $datemax3)
				{
					echo '<option ' ;
					if($validite1 == $datemin3)
					{
						echo 'selected="selected" ' ;
					} 
					echo 'value="'.$datemin3.'">'.$datemin3.'</option>' ;
					
					$datemin3 ++ ;
				}
				
				<option if($validite1 == "2024") { echo 'selected="selected" ' ; } value="2024">2024</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

		
		<tr><td style="text-align:right;">A été parrainé par :</td><td style="text-align:left;">
		<input style="width:250px;" name="parrainage" type="text" value="{$user.parrainage}" />
		</td></tr>
		<tr><td style="text-align:right;vertical-align:top;"><strong>Nombre de parrainages :</strong></td><td style="text-align:left;">
		php
		$requete = "SELECT emails_prenom, emails_nom FROM in_emailsParrainage, in_emails WHERE in_emails.emails_id = in_emailsParrainage.emailsParrainage_idemail AND emailsParrainage_idparrain = '{$user.id}' ORDER BY emailsParrainage_timestamp DESC" ;
		$result = mysql_query($requete) ;
		$res = mysql_num_rows($result);
		echo '<strong>'.$res.'</strong><br />' ;
		while ($row = mysql_fetch_array ($result) ) 
		{
			echo '- '.$row['emails_prenom'].' '.$row['emails_nom'].'<br />' ;
		}
		
		</td></tr>
		
		echo '
		<tr><td style="text-align:right;"></td><td style="text-align:left;">
		<a href="admin.php?cat=membres&scat=membres&id='.{$user.id}.'&details=parrainage"><strong>Ajouter un nouveau parrainage</strong></a>
		</td></tr>' ; 
		
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>


		<tr><td style="text-align:right;">Magazines reçus dans l'abonnement :</td><td style="text-align:left;">
		php
		$requete12 = "SELECT * FROM in_emailsMagenvoi WHERE emailsMagenvoi_idemail = '".$_GET['id']."' " ;
		$result12 = mysql_query($requete12);
		while ($row = mysql_fetch_array ($result12) ) 
		{
			$string .= 'n°'.$row['emailsMagenvoi_idmag'].' , ' ;
		}
		echo substr($string,0,-2);
		
		</td></tr>
		</td></tr>
		<tr><td style="text-align:right;">Routage du dernier magazine :</td><td style="text-align:left;">
		<strong>php
		if($emails_myinreesgratuit == 1 || $emails_VIP == 1)
		{
			echo 'OUI (routage gratuit)';
		}
		elseif($emails_routage == 0)
		{
			echo 'NON';
		}
		else
		{
			echo 'OUI';
		}
		</strong>
		if($acces == 0 && $emails_routage == 0 || $acces == 3 && $emails_routage == 0) { 
		<a href="javascript:routageID({$user.id})" title="ROUTAGE"><img src="http://admin.inrees.com/adm/images/icon_valider.gif" width="14px" height="14px" /></a>
		} 
		</td></tr>
		<tr><td style="text-align:right;">Routage jusqu'au magazine :</td><td style="text-align:left;">
		<!--<strong>N°{$user.magmax}</strong> -->
		<!--
		<select style="width:175px;" name="magmaxemail" size="1">
				<option value="0" selected="selected">0 === NON ABONNE ===</option>
				php
				$x = 1 ;
				$requete = "SELECT * FROM in_magazine ORDER BY magazine_numero ASC  " ;
				$result = mysql_query($requete) ;
				while ($row = mysql_fetch_array ($result) ) 
				{
					echo '<option value="'.$row['magazine_numero'].'" ' ;
					if($row['magazine_numero'] == $emails_magmax)
					{
						echo ' selected="selected" ' ;
					}
					echo '>N° '.$row['magazine_numero'].'</option>' ;
					$x++;
				}
				
					echo '<option value="'.($x).'" ' ;
					if(($x) == $emails_magmax)
					{
						echo ' selected="selected" ' ;
					}
					echo '>N° '.($x).'</option>' ;
					
					echo '<option value="'.($x + 1).'" ' ;
					if(($x + 1) == $emails_magmax)
					{
						echo ' selected="selected" ' ;
					}
					echo '>N° '.($x + 1).'</option>' ;
					
					echo '<option value="'.($x + 2).'" ' ;
					if(($x + 2) == $emails_magmax)
					{
						echo ' selected="selected" ' ;
					}
					echo '>N° '.($x + 2).'</option>' ;
					
					echo '<option value="'.($x + 3).'" ' ;
					if(($x + 3) == $emails_magmax)
					{
						echo ' selected="selected" ' ;
					}
					echo '>N° '.($x + 3).'</option>' ;
					
					echo '<option value="'.($x + 4).'" ' ;
					if(($x + 4) == $emails_magmax)
					{
						echo ' selected="selected" ' ;
					}
					echo '>N° '.($x + 4).'</option>' ;
					
					echo '<option value="'.($x + 5).'" ' ;
					if(($x + 5) == $emails_magmax)
					{
						echo ' selected="selected" ' ;
					}
					echo '>N° '.($x + 5).'</option>' ;
					
					echo '<option value="'.($x + 6).'" ' ;
					if(($x + 6) == $emails_magmax)
					{
						echo ' selected="selected" ' ;
					}
					echo '>N° '.($x + 6).'</option>' ;
					
					echo '<option value="'.($x + 7).'" ' ;
					if(($x + 7) == $emails_magmax)
					{
						echo ' selected="selected" ' ;
					}
					echo '>N° '.($x + 7).'</option>' ;
					
				
		</select>
		</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		
		<tr><td style="text-align:right;">Nombre de places<br />(au tarif adhérent / réservations) :</td><td style="text-align:left;">
		<select style="width:175px;" name="places" size="1">
				<option
				if($emails_places == "1")
				{
					echo 'selected="selected" ' ;
				} 
				value="1">1 place</option>
				<option 
				if($emails_places == "2")
				{
					echo 'selected="selected" ' ;
				} 
				value="2">2 places</option>
				<option 
				if($emails_places == "3")
				{
					echo 'selected="selected" ' ;
				} 
				value="3">3 places</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
	php
	}
	if($_GET['details'] == "parrainage")
	{
			
			<tr><td style="text-align:right;">Parrain :</td><td style="text-align:left;">
			{$user.nom.' '.$emails_prenom}
			</td></tr>
			
			<tr><td style="text-align:right;"><strong>Nouveau membre parrainé :</strong></td><td style="text-align:left;">
			<select style="width:290px;font-size:14px;" name="newparrainage" size="1">
				php
				$requete = "SELECT emails_id, emails_prenom, emails_nom FROM in_emails WHERE emails_myinrees = '1' ORDER BY emails_nom, emails_prenom ASC" ;
				$result = mysql_query($requete) ;
				while ($row = mysql_fetch_array ($result) ) 
					{
							echo '<option value="'.$row['emails_id'].'">'.$row['emails_nom'].' '.$row['emails_prenom'].' ('.$row['emails_id'].')' ;
							echo '</option>' ;
					}
				
			</select>
			<input name="lastpage" type="hidden" value="echo $_SERVER["HTTP_REFERER"]}" />
			</td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			php
	}
	if($_GET['details'] == "news")
	{

		<tr><td style="text-align:right;">Email secondaire :</td><td style="text-align:left;">
		<input style="width:250px;" name="emailbis" type="text" value="{$user.emailbis}" />
		</td></tr>
		<tr><td style="text-align:right;">Newsletter actif</td><td style="text-align:left;">
		<select style="width:175px;" name="newsletteractif" size="1">
				<option
				if($emails_actif == "1")
				{
					echo 'selected="selected" ' ;
				} 
				value="1">Oui</option>
				<option 
				if($emails_actif == "0")
				{
					echo 'selected="selected" ' ;
				} 
				value="0">Non</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;">Newsletter fréquence</td><td style="text-align:left;">
		<select style="width:175px;" name="frequence" size="1">
				<option
				if($emails_frequence == "0")
				{
					echo 'selected="selected" ' ;
				} 
				value="0">Toutes les newsletters</option>
				<option 
				if($emails_frequence == "1")
				{
					echo 'selected="selected" ' ;
				} 
				value="1">Mensuel</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

		<tr><td style="text-align:right;">Routage postaux</td><td style="text-align:left;">
		<select style="width:175px;" name="routage" size="1">
				<option
				if($emails_actifpost == "1")
				{
					echo 'selected="selected" ' ;
				} 
				value="1">Oui</option>
				<option 
				if($emails_actifpost == "0")
				{
					echo 'selected="selected" ' ;
				} 
				value="0">Non</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
	php
	}
	if($_GET['details'] == "operations")
	{

		<tr><td style="text-align:right;width:150px;" valign="top">Messages</td><td style="text-align:left;">
		php
		$requete12 = "SELECT contact_id FROM admin_contact WHERE contact_idemail = '{$user.id}' AND contact_corbeille = '0' " ;
		$result12 = mysql_query($requete12);
		$res = mysql_num_rows($result12);
		while ($row = mysql_fetch_array ($result12) )
		{
			echo '<a href="admin.php?cat=messagerie&scat=message&id='.$row['contact_id'].'"><strong>N°'.$row['contact_id'].'</strong></a>, ' ;
		}
			if($res != 0)
			{
				echo '<br />' ;
			}
			echo '<em>Nous a contacté '.$res.' fois.</em>' ;

		$requete12 = "SELECT contactBP_id FROM admin_contactBPtem WHERE contactBP_idemail = '{$user.id}' " ;
		$result12 = mysql_query($requete12);
		$res = mysql_num_rows($result12);
		if($res == 0)
		{
		
		<br /><br /><hr />
		php
		}
		
		</td></tr>
		php
		if($res != 0)
		{
		
		<tr><td style="text-align:right;width:150px;" valign="top">Témoignages (BP TV)</td><td style="text-align:left;">
		php
			while ($row = mysql_fetch_array ($result12) )
			{
				echo '<a href="admin.php?cat=messagerie&scat=messageBP&id='.$row['contactBP_id'].'"><strong>N°'.$row['contactBP_id'].'</strong></a>, ' ;
			}
		
		<br /><br /><hr />
		</td></tr>
		php
		}
		
		<tr><td style="text-align:right;" valign="top">Abonnements</td><td style="text-align:left;">
		php
		if($_GET['op'] == "cotisations")
		{
		
		<strong>Ajouter une nouvel abonnement</strong><br /><br />
		<table>
		<tr><td style="text-align:right;" valign="top"><font color="red">Validité :</font></td><td style="text-align:left;">
		<select style="width:145px;" name="validite224" size="1">
				<option
				if($validite2 == "01")
				{
					echo 'selected="selected" ' ;
				} 
				value="01">01 - Janvier</option>
				<option 
				if($validite2 == "02")
				{
					echo 'selected="selected" ' ;
				} 
				value="02">02 - Février</option>
				<option 
				if($validite2 == "03")
				{
					echo 'selected="selected" ' ;
				} 
				value="03">03 - Mars</option>
				<option 
				if($validite2 == "04")
				{
					echo 'selected="selected" ' ;
				} 
				value="04">04 - Avril</option>
				<option 
				if($validite2 == "05")
				{
					echo 'selected="selected" ' ;
				} 
				value="05">05 - Mai</option>
				<option 
				if($validite2 == "06")
				{
					echo 'selected="selected" ' ;
				} 
				value="06">06 - Juin</option>
				<option 
				if($validite2 == "07")
				{
					echo 'selected="selected" ' ;
				} 
				value="07">07 - Juillet</option>
				<option 
				if($validite2 == "08")
				{
					echo 'selected="selected" ' ;
				} 
				value="08">08 - Aout</option>
				<option 
				if($validite2 == "09")
				{
					echo 'selected="selected" ' ;
				} 
				value="09">09 - Septembre</option>
				<option 
				if($validite2 == "10")
				{
					echo 'selected="selected" ' ;
				} 
				value="10">10 - Octobre</option>
				<option 
				if($validite2 == "11")
				{
					echo 'selected="selected" ' ;
				} 
				value="11">11 - Novembre</option>
				<option 
				if($validite2 == "12")
				{
					echo 'selected="selected" ' ;
				} 
				value="12">12 - Décembre</option>
		</select>
		<select style="width:105px;" name="validite124" size="1">
				
				$datemin3 = 2007 ;
				$dated3 = date('Y')  ;
				$datemax3 = date('Y') + 4 ;
				
				while($datemin3 != $datemax3)
				{
					echo '<option ' ;
					if($validite1 == $datemin3)
					{
						echo 'selected="selected" ' ;
					} 
					echo 'value="'.$datemin3.'">'.$datemin3.'</option>' ;
					
					$datemin3 ++ ;
				}
				
		</select>
		</td></tr>
		<tr><td align="right">Règlement :</td><td align="left">
			<select style="width:175px;" name="reglementmod" size="1">
					<option value="Chèque">Chèque</option>
					<option value="Especes">Espèces</option>
			</select>
		</td></tr>
		<tr><td style="text-align:right;" valign="top">Montant de la cotisation : </td><td style="text-align:left;"><input style="width:25px;" name="cotisation24" type="text" value="30" />.00 euros</td></tr>
		<tr><td style="text-align:right;" valign="top">Cadeau ?</td><td style="text-align:left;">
		<select style="width:150px;" name="cadeau24" size="1">
			<option value="0">=== Aucun cadeau ===</option>
			php
			$result = mysql_query("SELECT produits_id, produits_titre FROM in_produits, in_produitsdetails, in_produitsfamilles WHERE in_produits.produits_id = in_produitsdetails.produitsdetails_idproduit AND in_produits.produits_idfamille = in_produitsfamilles.produitsfamilles_id ORDER BY produits_titre ASC");
			while ($row = mysql_fetch_array ($result) ) 
			{
				echo '<option value="'.$row['produitsdetails_id'].'">'.$row['produits_titre'].'</option>';
			}
			
		</select>
		</td></tr><!--<tr><td style="text-align:right;" valign="top">
		Renouvèlement ?</td><td style="text-align:left;"><input style="width:15px;" name="ren" type="checkbox" /> Oui, c'est un renouvèlement...
		</td></tr> --><!--
		<tr><td style="text-align:right;" valign="top">
		L'abonnement commence au n°:</td><td style="text-align:left;">
				php
				$requete = "SELECT * FROM in_magazine WHERE magazine_actif = '1' AND magazine_aboyes = '1' ORDER BY magazine_id DESC LIMIT 1" ;
				$result = mysql_query($requete) ;
				while ($row = mysql_fetch_array ($result) ) 
				{
						$magabogo = $row['magazine_id'] ;
				}
				if($emails_myinrees = 1)
				{
					$magabogo = ($emails_magmax + 1) ;
				}
				
		<input style="width:25px;" name="magabogo" type="text" value="echo $magabogo}" />
		</td></tr>
		<tr><td style="text-align:right;" valign="top">
		Déjà mag ?</td><td style="text-align:left;"><input style="width:15px;" name="dejamag" type="checkbox" /> (a déjà reçu ce mag lors d'un évènement)
		</td></tr>
		<tr><td style="text-align:right;" valign="top"></td><td style="text-align:left;"><strong style="color:red;">ATTENTION: Cette action générera une facture non-modifiable / Merci de revérifier les infos une seconde fois</strong>
		</td></tr>
		<td style="text-align:right;" valign="top">
		<input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Valider" /></td><td style="text-align:left;"></td></tr>
		</table>
		php
		}
		else
		{
			$date572 = date('Y') - 1 ;
			$date572 = $date572.'-'.date('m') ;

			$sql = "SELECT * FROM in_cotisations WHERE cotisations_idemail = '{$user.id}' AND cotisations_statut = '1' ORDER BY cotisations_timestamp ASC ";
			$result = mysql_query($sql);
			$res = mysql_num_rows($result);
			if($res != 0)
			{
				while($row = mysql_fetch_array ($result)) 
				{
					$datecotizz = $row['cotisations_timestamp'] ;
					$resACTannee3 = substr($datecotizz, 0, 4) ;
					$resACTmois3 = substr($datecotizz, 5, 2) ;
					$resACTjour3 = substr($datecotizz, 8, 2) ;
					$resACTheure3 = substr($datecotizz, 11, 2) ;
					$resACTmin3 = substr($datecotizz, 14, 2) ;
					$resACTsec3 = substr($datecotizz, 17, 2) ;
					
									$datecotizz = $row['cotisations_envoitime'] ;
									$resACTannee35 = substr($datecotizz, 0, 4) ;
									$resACTmois35 = substr($datecotizz, 5, 2) ;
									$resACTjour35 = substr($datecotizz, 8, 2) ;
									$resACTheure35 = substr($datecotizz, 11, 2) ;
									$resACTmin35 = substr($datecotizz, 14, 2) ;
									$resACTsec35 = substr($datecotizz, 17, 2) ;
					
					echo '<strong><a href="admin.php?cat=membres&scat=cotisationsind&id='.$row['cotisations_id'].'">['.$row['cotisations_id'].']</a></strong> '.$resACTjour3.'/'.$resACTmois3.'/'.$resACTannee3.' à '.$resACTheure3.'h'.$resACTmin3.'m'.$resACTsec3.' ('.substr($row['cotisations_montant'],0,-2).'€)' ;
					if($row['cotisations_envoitime'] > $date572)
					{
						echo ' - <em><font color="green">Envoyé le '.$resACTjour35.'/'.$resACTmois35.'/'.$resACTannee35.'</font></em>' ;
					}
					echo '<br />' ;
				}
			}
			
			$sql = "SELECT * FROM in_cotisations WHERE cotisations_idemail = '{$user.id}' AND cotisations_statut = '0' AND cotisations_timestamp > '$date572' ORDER BY cotisations_timestamp ASC ";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array ($result)) 
			{
					$datecotizz = $row['cotisations_timestamp'] ;
					$resACTannee3 = substr($datecotizz, 0, 4) ;
					$resACTmois3 = substr($datecotizz, 5, 2) ;
					$resACTjour3 = substr($datecotizz, 8, 2) ;
					$resACTheure3 = substr($datecotizz, 11, 2) ;
					$resACTmin3 = substr($datecotizz, 14, 2) ;
					$resACTsec3 = substr($datecotizz, 17, 2) ;

					echo '<font class="red"><em><strong>['.$row['cotisations_id'].']</strong> '.$resACTjour3.'/'.$resACTmois3.'/'.$resACTannee3.' à '.$resACTheure3.'h'.$resACTmin3.'m'.$resACTsec3.' ('.substr($row['cotisations_montant'],0,-2).'€)</em></font><br />' ;
			}
				if($emails_clef == 1)
				{
					echo '<br />
					<a href="admin.php?cat=membres&scat=membres&id='.{$user.id}.'&details=operations&op=cotisations"><strong>Ajouter une cotisation</strong></a>';
				}
				else
				{
					echo '<br />
					Veuillez créer un nouveau compte actif pour entrer une nouvelle cotisation' ;
				}
				
		}
		
		</td></tr>
		<tr><td style="text-align:right;" valign="top">Donations</td><td style="text-align:left;">
		php
		if($_GET['op'] == "donations")
		{
			
			<strong>Ajouter une donation</strong><br /><br />
			<table>
			<tr><td style="text-align:right;" valign="top">Montant de la donation : </td><td style="text-align:left;"><input style="width:25px;" name="cotisation" type="text" value="30" />.00 euros</td></tr>
			<td style="text-align:right;" valign="top"></td><td style="text-align:left;"><input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
			</table>
			php
		}
		else
		{
			
			<!--<a href="admin.php?cat=membres&scat=membres&id={$user.id}&details=operations&op=donations">Ajouter une donation (non actif)</a> --><!--
			php
		}
		<br /><br /><hr />
		</td></tr>
		<tr><td style="text-align:right;" valign="top">Reservations</td><td style="text-align:left;">
		php
		if($_GET['op'] == "reservations")
		{
					echo 'new resa' ;
		}
		elseif($_GET['op'] == "reservationedit")
		{
					
					...
					echo 'edit resa '.$_GET['opid'] ;
		}
		else
		{
					$sql = "SELECT reservations_id, agendadetails_titre FROM in_reservations, in_agendadetails, in_agendadetailsplus WHERE in_reservations.reservations_idagenda = in_agendadetailsplus.agendadetailsplus_id AND in_agendadetails.agendadetails_id = in_agendadetailsplus.agendadetailsplus_idagenda AND reservations_idemail = '{$user.id}' AND reservations_statut = '1' ORDER BY reservations_timestamp DESC " ;
					$result = mysql_query($sql);
					$res = mysql_num_rows($result);
					if($res == 0)
					{
						echo '<em>Aucune réservation</em>
						<br /><a href="admin.php?cat=activites&scat=reservation-inserer"><strong>Ajouter une reservation</strong></a>' ;
					}
					else
					{
						while($row = mysql_fetch_array ($result)) 
						{
							echo substr($row['agendadetails_titre'],0,35).'... <a href="admin.php?cat=activites&scat=reservationsind&id='.$row['reservations_id'].'" title="Editer la réservation"><img src="http://admin.inrees.com/adm/images/iconEdit.gif" width="14px" height="14px" /></a>' ;
							echo '<br />' ;
						}
						echo '<br /><a href="admin.php?cat=activites&scat=reservation-inserer"><strong>Ajouter une nouvelle réservation</strong></a>';
					}
					
					$sql = "SELECT * FROM in_reservations WHERE reservations_idemail = '{$user.id}' AND reservations_statut = '0' ORDER BY reservations_timestamp DESC ";
					$result = mysql_query($sql);
					while($row = mysql_fetch_array ($result)) 
					{
							$datecotizz = $row['reservations_timestamp'] ;
							$resACTannee3 = substr($datecotizz, 0, 4) ;
							$resACTmois3 = substr($datecotizz, 5, 2) ;
							$resACTjour3 = substr($datecotizz, 8, 2) ;
							$resACTheure3 = substr($datecotizz, 11, 2) ;
							$resACTmin3 = substr($datecotizz, 14, 2) ;
							$resACTsec3 = substr($datecotizz, 17, 2) ;
			
							echo '<font class="red"><em><strong>['.$row['reservations_id'].']</strong> '.$resACTjour3.'/'.$resACTmois3.'/'.$resACTannee3.' à '.$resACTheure3.'h'.$resACTmin3.'m'.$resACTsec3.' ('.$row['reservations_idagenda'].'€)</em></font><br />' ;
					}

		}
		
		</td></tr>
		<tr><td style="text-align:right;" valign="top">Boutique</td><td style="text-align:left;">
		php
		if($_GET['op'] == "boutique")
		{
			
			boutique
			php
		}
		
		
			
			$sql = "SELECT * FROM in_boutiquecommande WHERE boutiquecommande_idemail = '{$user.id}' AND boutiquecommande_statut = '1' ORDER BY boutiquecommande_timestamp ASC ";
			$result = mysql_query($sql);
			$res = mysql_num_rows($result);
			if($res != 0)
			{
				while($row = mysql_fetch_array ($result)) 
				{
					$datecotizz = $row['boutiquecommande_timestamp'] ;
					$resACTannee3 = substr($datecotizz, 0, 4) ;
					$resACTmois3 = substr($datecotizz, 5, 2) ;
					$resACTjour3 = substr($datecotizz, 8, 2) ;
					$resACTheure3 = substr($datecotizz, 11, 2) ;
					$resACTmin3 = substr($datecotizz, 14, 2) ;
					$resACTsec3 = substr($datecotizz, 17, 2) ;
					
									$datecotizz = $row['boutiquecommande_envoitime'] ;
									$resACTannee35 = substr($datecotizz, 0, 4) ;
									$resACTmois35 = substr($datecotizz, 5, 2) ;
									$resACTjour35 = substr($datecotizz, 8, 2) ;
									$resACTheure35 = substr($datecotizz, 11, 2) ;
									$resACTmin35 = substr($datecotizz, 14, 2) ;
									$resACTsec35 = substr($datecotizz, 17, 2) ;
					
					echo '<strong><a href="admin.php?cat=boutique&scat=macommande&id='.$row['boutiquecommande_id'].'">['.$row['boutiquecommande_id'].']</a></strong> '.$resACTjour3.'/'.$resACTmois3.'/'.$resACTannee3.' à '.$resACTheure3.'h'.$resACTmin3.'m'.$resACTsec3.' ('.substr($row['boutiquecommande_prix'],0,-2).','.substr($row['boutiquecommande_prix'],-2,2).'€)' ;
					if($row['boutiquecommande_envoitime'] > $date572)
					{
						echo ' - <em><font color="green">Envoyé le '.$resACTjour35.'/'.$resACTmois35.'/'.$resACTannee35.'</font></em>' ;
					}
					else
					{
						if($row['boutiquecommande_envoi'] == 1)
						{
							echo ' - <em><font color="green">Envoyé...</font></em>' ;
						}
					}
					echo '<br />' ;
				}
			}
		
		</td></tr>
		<tr><td style="text-align:right;" valign="top"></td><td style="text-align:left;"></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
	php
	}
		

		
		<tr><td style="text-align:right;">
		php
		if($_GET['details'] != "operations")
		{
		-->