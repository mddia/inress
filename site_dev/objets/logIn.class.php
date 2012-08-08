<?php
	class logIn {
		private $pdo;
		private $id;
		private $firstName;
		private $name;
		private $email;
		private $password;
		private $connexionStatus;
		
		public function __construct($pdo, $email, $password) {
			$this->pdo = $pdo;
			$this->email = $email;
			$this->password = md5($password);
		}
		
		public function check() {
			//On regarde si l'adresse mail et le mot de passe correspondent bien
			$req = $this->pdo->prepare("SELECT id, prenom, nom FROM in_emails WHERE email = '$this->email' AND password = '$this->password'");
			$req->execute();
			$count = $req->rowCount();
			//Vérification
			if($count == 1) {
				//Création du cookie
				$data = $req->fetch(PDO::FETCH_ASSOC);
				//Création des cookies
				setcookie("INREES_ID", $data['id'], (time() + 2628000) );
				setcookie("prenom", $data['prenom'], (time() + 2628000) );
				setcookie("nom", $data['nom'], (time() + 2628000) );
				//Affichage status
				$this->connexionStatus = 1;
			}
			else {
				$this->connexionStatus = 0;
			}
		}
		
		//Vérification du format de l'email
		private function checkEmail() {
			$address   = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';
			$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)';
			
			//Regex
			$regex = '/^'.$address .'+'.'(\.'.$address .'+)*'.'@'.'('.$domain.'{1,63}\.)+'.$domain.'{2,63}$/i';

			//Vérification du format
			if (preg_match($regex, $this->email)) {
				return true;
			}
			else {
				header('location: index.php?e=wrongEmailFormat');
				exit();
			}
		}
		
		public function returnStatus() {
				echo $this->connexionStatus;
		}
	}
?>