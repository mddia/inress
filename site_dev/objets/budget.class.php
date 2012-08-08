<?php
	//Objet budget
	
	class budget {
		
		//Variables
		private $pdo;
		private $smarty;
		
		//__construct
		public function __construct($pdo, $smarty) {
			$this->pdo = $pdo;
			$this->smarty = $smarty;
		}
		
		//ajoutRent
		public function ajoutRent($Dannee, $Dmois, $Djours, $Eannee, $Emois, $Ejours, $valid, $titre, $prix1, $prix2, $tva, $pht1, $pht2, $mode) {
			//Traitement timestamp
			$factureTime = mktime(0, 0, 0, $Dmois, $Djours, $Dannee);
			$encaissTime = mktime(0, 0, 0, $Emois, $Ejours, $Eannee);
			$prix = $prix1.$prix2;
			//Query
			$query = $this->pdo->prepare("INSERT INTO admin_rentrees VALUES('', '$factureTime', '$encaissTime', '$prix', '$tva', '0', '0', '$mode', '$titre', '0', '$valid', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
			$query->execute();
			//getLastInsertId
			$id = $this->pdo->lastInsertId();
			//redirection
			header('location: admin.php?cat=budget&scat=rentree&id='.$id);
			exit();
		}
		
		//ajoutRentX
		public function ajoutRentX() {
			//Traitement
			$timestamp = mktime(0, 0, 0, $_POST['Dmois'], $_POST['Djours'], $_POST['Dannee']);
			$statut = 0;			
			$reference = 0;			
			$descL2 = $_POST['descL2'];	
			$agenda_dateE = mktime(0, 0, 0, $_POST['Emois'], $_POST['Ejours'], $_POST['Eannee']);
			$valid = $_POST['valid'];			
			$idcat = 0;
			$titre = $_POST['titre'] ;
			$prix = $_POST['prix'].$_POST['prix2'] ;
			$ht1 = $_POST['ht1'].$_POST['ht2'] ;
			$tvaplus = $_POST['tvaplus1'].$_POST['tvaplus2'] ;
			$tva = $_POST['tva'] ;
			$pht = $_POST['pht1'].$_POST['pht2'] ;
			$mode = $_POST['mode'] ;
			$societe = $_POST['societe'] ;
			$adresse1 = $_POST['adresse1'] ;
			$adresse2 = $_POST['adresse2'] ;
			$adresse3 = $_POST['adresse3'] ;
			$postal = $_POST['postal'] ;
			$ville = $_POST['ville'] ;
			$pays = $_POST['pays'] ;
			//Query
			$sql = "INSERT INTO `admin_rentrees` (`societe` , `description` , `adresse1` , `adresse2` , `adresse3` , `postal` , `ville` , `pays` , `timestamp` , `valid` , `encaiss` , `titre` , `prix` , `tva` , `mode` , `statut` , `factures` , `tvaplus` , `HT`) VALUES ('$societe', '$descL2', '$adresse1', '$adresse2', '$adresse3', '$postal', '$ville', '$pays', '$timestamp', '$valid', '$agenda_dateE', '$titre', '$prix', '$tva', '$mode', '$statut', '1', '$tvaplus', '$ht1')";
			//Pdo
			$query = $this->pdo->prepare($sql);
			$query->execute();
			//getLastInsertId
			$id = $this->pdo->lastInsertId();
			//redirection
			header('location: admin.php?cat=budget&scat=rentree&id='.$id);
			exit();
		}
		
		//getRentreeDetails
		public function getRentreeDetails($id) {
			//Query
			$query = $this->pdo->prepare("SELECT timestamp, encaiss, prix, tva, tvaplus, HT, mode, titre, statut, valid, factures, societe, adresse1, adresse2, adresse3, postal, ville, pays, description FROM admin_rentrees WHERE id = '$id'");
			$query->execute();
			//Assignation
			$data = $query->fetch(PDO::FETCH_ASSOC);
			//Traitement
			$Djour = date("d", $data['timestamp']);
			$Dmois = date("m", $data['timestamp']);
			$Dannee = date("Y", $data['timestamp']);
			$Ejour = date("d", $data['encaiss']);
			$Emois = date("m", $data['encaiss']);
			$Eannee = date("Y", $data['encaiss']);
			//Array
			$rentree = array(
				'id' => $id,
				'Djour' => $Djour,
				'Dmois' => $Dmois,
				'Dannee' => $Dannee,
				'Ejour' => $Ejour,
				'Emois' => $Emois,
				'Eannee' => $Eannee,
				'prix' => $data['prix'],
				'tva' => $data['tva'],
				'tvaplus' => $data['tvaplus'],
				'HT' => $data['HT'],
				'mode' => $data['mode'],
				'titre' => $data['titre'],
				'statut' => $data['statut'],
				'valid' => $data['valid'],
				'factures' => $data['factures'],
				'societe' => $data['societe'],
				'adresse1' => $data['adresse1'],
				'adresse2' => $data['adresse2'],
				'adresse3' => $data['adresse3'],
				'postal' => $data['postal'],
				'ville' => $data['ville'],
				'pays' => $data['pays'],
				'description' => $data['description'],
			);
			//Smarty
			$this->smarty->assign('rentree', $rentree);
		}
		
		//listAllRentrees()
		public function listAllRentrees() {
			//query
			$query = $this->pdo->prepare("SELECT id, timestamp, encaiss, prix, titre FROM admin_rentrees ORDER BY id DESC");
			$query->execute();
			//Array
			$rentrees = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$rentrees[] = array(
					'id' => $data['id'],
					'timestamp' => $data['timestamp'],
					'encaiss' => $data['encaiss'],
					'prix' => $data['prix'],
					'titre' => $data['titre'],
				);
			}
			//Smarty
			$this->smarty->assign('rentrees', $rentrees);
		}
	}
?>