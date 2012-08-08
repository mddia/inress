<?php
	//Objet recoverAbo
	class recoverAbo {
		
		//Vars
		private $pdo;
		private $smarty;
		
		//__construct
		public function __construct($pdo, $smarty) {
			//Attribution
			$this->pdo = $pdo;
			$this->smarty = $smarty;
		}
		
		//displayRecover
		public function display($userEmail) {
			//Query
			$query = $this->pdo->prepare("SELECT firstName, name, aboId, addressId FROM in_aborecover WHERE email = '$userEmail' LIMIT 1");
			$query->execute();
			$count = $query->rowCount();
			//Vérif
			if ($count == 0) {
				header('location: index.php');
				exit();
			}
			else {
				//Attribution
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Array
				$recover = array(
					'email' => $userEmail,
					'firstName' => $data['firstName'],
					'name' => $data['name'],
					'aboId' => $data['aboId'],
					'addressId' => $data['addressId'],
				);
				//On récupère les informations de l'abonnement
				$this->smarty->assign('recover', $recover);
				//Display smarty
				$this->smarty->display('recoverAbo.tpl');
			}
		}
		
		//remove
		public function remove($email) {
			//Query
			$query = $this->pdo->prepare("DELETE FROM in_aborecover WHERE email = '$email' LIMIT 1");
			$query->execute();
			
		}
	}
?>