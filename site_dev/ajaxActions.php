<?php
//Chargement du fichier de config
	require('inc.config.php');
	
	/* Traitement selon le formulaire émetteur */
	switch ($_GET['formName']) {
	
		//** AJAX **//
		//listTags
		case 'listTags':
			//Déclaration array
			$tags = array();			
			//Query
			$query = $pdo->prepare("SELECT id, name FROM in_tags WHERE name LIKE '%".$_GET['term']."%' LIMIT 6");
			$query->execute();			
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {				
				//Transmission
				$tags[] = array(
					'id' => $data['id'],
					'name' => $data['name'],
				);
			}
			/* Toss back results as json encoded array. */
			echo json_encode($tags);
			break;
		//listSubscribers
		case 'listSubscribers':
			//Déclaration array
			$tags = array();
			//DisplayLimit ?
			if (array_key_exists('limit', $_GET) AND $_GET['limit'] != '') {
				//Define limit
				$limit = $_GET['limit'];
				//sql
				$sql = "SELECT id, nom, prenom, email FROM in_emails WHERE nom LIKE '%".$_GET['term']."%' OR prenom LIKE '%".$_GET['term']."%' OR email LIKE '%".$_GET['term']."%' OR id LIKE '%".$_GET['term']."%' LIMIT ".$limit;
			}
			else {
				//sql
				$sql = "SELECT id, nom, prenom, email FROM in_emails WHERE nom LIKE '%".$_GET['term']."%' OR prenom LIKE '%".$_GET['term']."%' OR email LIKE '%".$_GET['term']."%' OR id LIKE '%".$_GET['term']."%'";
			}
			//Query
			$query = $pdo->prepare($sql);
			$query->execute();			
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {				
				//Transmission
				$tags[] = array(
					'id' => $data['id'],
					'nom' => $data['nom'],
					'prenom' => $data['prenom'],
					'email' => $data['email'],
				);
			}
			/* Toss back results as json encoded array. */
			echo json_encode($tags);
			break;
		//listPartners
		case 'listPartners':
			//Déclaration array
			$tags = array();			
			//Query
			$query = $pdo->prepare("SELECT id, nom FROM in_partenaires WHERE nom LIKE '%".$_GET['term']."%'");
			$query->execute();			
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {				
				//Transmission
				$tags[] = array(
					'id' => $data['id'],
					'nom' => $data['nom'],
				);
			}
			/* Toss back results as json encoded array. */
			echo json_encode($tags);
			break;
		//listItems
		case 'listItems':
			//Déclaration array
			$items = array();			
			//Query
			$query = $pdo->prepare("SELECT id, idProduit, title, prixPublic FROM in_produitsdetails WHERE title LIKE '%".$_GET['term']."%'");
			$query->execute();			
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Vérification du type de produit
				$products = new products($pdo, $data['id']);
				$details = $products->getDetails();
				//Transmission
				$items[] = array(
					'id' => $data['id'],
					'idProduit' => $data['idProduit'],
					'title' => $data['title'],
					'prix' => $data['prixPublic'],
					'abo' => $details['subscription'],
					'event' => $details['event'],
				);
			}
			/* Toss back results as json encoded array. */
			echo json_encode($items);
			break;
	}
?>