<?php
	//Objet profile le 12/01/2012
	
	class profile {
		
		//Attribution des variables
		private $pdo;
		private $userId;
		
		//__Construct
		public function __construct($pdo, $userId) {
			$this->pdo = $pdo;
			$this->userId = $userId;
		}
		
		//listAddresses
		public function listAddresses() {
			//Déclaration array
			$list = array();
			//Query
			$query = $this->pdo->prepare("SELECT id, civility, firstName, name, address1, address2, address3, city, zipCode, country, defaultAddress FROM in_addresses WHERE userId = '$this->userId'");
			
			$query->execute();
			//Listage des résulats
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Array
				$list[] = array(
					'id' => $data['id'],
					'civility' => $data['civility'],
					'firstName' => $data['firstName'],
					'name' => $data['name'],
					'address1' => $data['address1'],
					'address2' => $data['address2'],
					'address3' => $data['address2'],
					'city' => $data['city'],
					'zipCode' => $data['zipCode'],
					'country' => $data['country'],
					'defaultAddress' => $data['defaultAddress'],
				);
			}
			//Return
			return $list;
		}
		
		//addAddress
		public function addAddress($name, $firstName, $address1, $address2, $address3, $city, $zipCode, $country) {
			//Query
			$query = $this->pdo->prepare("INSERT INTO in_addresses VALUES('', '$_COOKIE[INREES_ID]', 'M.', '$name', '$firstName', '$address1', '$address2', '$address3', '$city', '$zipCode', '$country', '0')");
			$query->execute();
		}
	}
?>