<?php
	//Objet shople 29/12/2011
	
	class shop {
		
		//Déclaration variables
		private $pdo;
		
		//__construct
		public function __construct($pdo) {
			$this->pdo = $pdo;
		}
		
		//Fonction de listage des objets en vente
		public function listItems() {
			//Déclaration array
			$list = array();
			//Query
			$query = $this->pdo->prepare("SELECT in_produitsdetails.id, in_produitsdetails.idProduit, in_produitsdetails.title, in_produitsdetails.description, in_produitsdetails.prixAbonne, in_produitsdetails.prixPublic, in_produits.title AS 'titreProduit' FROM in_produitsdetails JOIN in_produits ON in_produits.id = in_produitsdetails.idProduit WHERE in_produits.active != '0' ORDER BY id ASC");
			
			$query->execute();
			//Listage des résulats
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Array
				$list[] = array(
					'id' => $data['id'],
					'idProduit' => $data['idProduit'],
					'titreProduit' => $data['titreProduit'],
					'title' => $data['title'],
					'description' => $data['description'],
					'prixAbonne' => $data['prixAbonne'],
					'prixPublic' => $data['prixPublic'],
				);
			}
			//Return
			return $list;
		}
	}
?>