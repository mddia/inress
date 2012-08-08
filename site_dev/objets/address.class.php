<?php
	//Objet address le 01/02/2012
	class address {
	
		//Variable
		private $pdo;
		private $id;
		
		//__construct
		public function __construct($pdo, $id) {
			$this->pdo = $pdo;
			$this->id = $id;			
		}
		
		//listCountries
		public function listCountries() {
			//Cration array
			$countries = array();
			//Query
			$query = $this->pdo->prepare("SELECT id, name, paysOrigins FROM in_pays WHERE actif = '1' ORDER BY name ASC");
			$query->execute();
			//Listage des résulats
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$countries[] = array(
					'id' => $data['id'],
					'name' => $data['name'],
					'paysOrigins' => $data['paysOrigins'],
				);
			}
			//Return
			return $countries;
		}
		
		//listStatess
		public function listStates() {
			//Cration array
			$states = array();
			//Query
			$query = $this->pdo->prepare("SELECT id, name FROM in_paysetats ORDER BY name ASC");
			$query->execute();
			//Listage des résulats
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$states[] = array(
					'id' => $data['id'],
					'name' => $data['name'],
				);
			}
			//Return
			return $states;
		}
		
		//getDetails
		public function getDetails() {
			//Query
			$query = $this->pdo->prepare("SELECT id, userId, civility, name, firstName, address1, address2, address3, city, zipCode, country, state FROM in_addresses WHERE id = '$this->id'");
			$query->execute();
			//Listage des résulats
			$data = $query->fetch(PDO::FETCH_ASSOC);
			//Traitement
			$country = new country($this->pdo, $data['country']);
			$countryDetails = $country->getDetails();
			//Array
			$details = array(
				'id' => $data['id'],
				'userId' => $data['userId'],
				'civility' => $data['civility'],
				'name' => $data['name'],
				'firstName' => $data['firstName'],
				'address1' => $data['address1'],
				'address2' => $data['address2'],
				'address3' => $data['address3'],
				'city' => $data['city'],
				'zipCode' => $data['zipCode'],
				'country' => $countryDetails,
				'state' => $data['state'],
			);
			//return
			return $details;
		}
		
		//setAsDefault()
		public function setAsDefault() {
			//Query
			$query = $this->pdo->prepare("SELECT userId FROM in_addresses WHERE id = '$this->id'");
			$query->execute();
			//Listage des résulats
			$data = $query->fetch(PDO::FETCH_ASSOC);
			$userId = $data['userId'];
			//On réinitialise les adresses de l'utilisateur
			$query = $this->pdo->prepare("UPDATE in_addresses SET defaultAddress = '0' WHERE userId = '$userId'");
			$query->execute();
			//On update le nouveau default
			$query = $this->pdo->prepare("UPDATE in_addresses SET defaultAddress = '1' WHERE id = '$this->id'");
			$query->execute();
			echo "UPDATE in_addresses SET defaultAddress = '1' WHERE id = '$this->id'";
		}
		
		//delete
		public function delete() {
			//Query
			$query = $this->pdo->prepare("DELETE FROM in_addresses WHERE id = '$this->id'");
			$query->execute();
		}
	}
?>