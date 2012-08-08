<?php
	//Objet magazine le 18/01/2012	
	class magazine {
		
		//Attribution variables
		private $pdo;
		
		//__construct
		public function __construct($pdo) {
			$this->pdo = $pdo;
		}
		
		//getLast
		public function getLast($aboId) {
			if ($aboId != 0) {
				//Query
				$query = $this->pdo->prepare("SELECT numero FROM in_magazine WHERE actif = '1' AND aboId = '$aboId' ORDER BY numero DESC LIMIT 1");
				$query->execute();
				$count = $query->rowCount();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Attribution variable si variable il y a
				if ($count != 0) {
					$last = $data['numero'];
				}
				else {
					$last = 1;
				}
			}
			else {
				//Query
				$query = $this->pdo->prepare("SELECT DISTINCT aboId FROM in_magazine WHERE actif = '1' ORDER BY aboId ASC");
				$query->execute();
				//Array
				$last = array();
				//Boucle
				while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
					//GetLastMag for each aboId
					$magazine = new magazine($this->pdo);
					$numero = $magazine->getLast($data['aboId']);
					$last[] = array(
						'numero' => $numero,
					);
				}
			}
			//Return
			return $last;
		}
		
		//listAll
		public function listAll() {
			//Query
			$query = $this->pdo->prepare("SELECT numero, aboId, titre, actif, online, dateSortie, routage FROM in_magazine ORDER BY dateSortie DESC");
			$query->execute();
			//Array
			$mags = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Info produit
				$productsType = new productsType($this->pdo, $data['aboId']);
				$details = $productsType->getDetails();
				//Array
				$mags[] = array(
					'numero' => $data['numero'],
					'abo' => $details,
					'titre' => $data['titre'],
					'actif' => $data['actif'],
					'online' => $data['online'],
					'dateSortie' => $data['dateSortie'],
					'routage' => $data['routage'],
				);
			}
			//return
			return $mags;
		}
		
		//record
		public function record($aboId, $numero, $titre, $actif, $online, $dispo) {
			//Traitement contenu
			$content = new content($titre);
			$titre = $content->secure();
			$content = new content($dispo);
			$dispo = $content->secure();
			//Query
			$query = $this->pdo->prepare("INSERT INTO in_magazine VALUES('', '$aboId', '', '$numero', '$titre', '', '$actif', '$online', '$dispo', '0')");
			$query->execute();
		}
		
		//listRoot
		public function listRoot() {
			//Query
			$query = $this->pdo->prepare("SELECT numero, aboId, routage FROM in_magazine WHERE routage != '0' ORDER BY id DESC");
			$query->execute();
			//Array
			$mags = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Infos abo
				$productsType = new productsType($this->pdo, $data['aboId']);
				$details = $productsType->getDetails();
				//Boucle
				$mags[] = array(
					'abo' => $details['title'],
					'aboId' => $data['aboId'],
					'numero' => $data['numero'],
				);
			}
			//return
			return $mags;
		}
		
		//listUnroot
		public function listUnroot() {
			//Query
			$query = $this->pdo->prepare("SELECT numero, aboId FROM in_magazine WHERE routage = '0' ORDER BY id DESC");
			$query->execute();
			//Array
			$mags = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Infos abo
				$productsType = new productsType($this->pdo, $data['aboId']);
				$details = $productsType->getDetails();
				//Bénéficiaires du routage à venir
				$routage = new routage($this->pdo, 0);
				$myPayants = $routage->getMyInreesUsers(0, $data['aboId'], $data['numero']);
				$myGratuits = $routage->getMyInreesUsers(1, 0, 0);
				$myCount = $myPayants['count']+$myGratuits['count'];
				//Boucle
				$mags[] = array(
					'abo' => $details['title'],
					'aboId' => $data['aboId'],
					'numero' => $data['numero'],
					'myPayants' => $myPayants,
					'myGratuits' => $myGratuits,
					'myCount' => $myCount,
				);
			}
			//return
			return $mags;
		}
		
		//getAboMags
		public function getAboMags($aboId) {
			//Query
			$query = $this->pdo->prepare("SELECT numero FROM in_magazine WHERE aboId = '$aboId' ORDER BY numero DESC LIMIT 1");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			//Attribution variable
			$mags = array(
				0 => array(
					'last' => 0,
					'numero' => $data['numero']-2,
				),
				1 => array(
					'last' => 0,
					'numero' => $data['numero']-1,
				),
				2 => array(
					'last' => 1,
					'numero' => $data['numero'],
				),
				3 => array(
					'last' => 0,
					'numero' => $data['numero']+1,
				),
			);
			//return
			return $mags;
		}
	}
?>	