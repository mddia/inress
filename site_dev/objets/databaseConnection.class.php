<?php
	//Objet databaseConnection
	
	class databaseConnection {
		//déclaration variables private
		private $databaseHost = "localhost";
		private $databaseUser = "sdf_inrees3";
		private $databasePassword = "4XsdWksn"; //P1f7UhnB (sdf1)
		private $databaseName = "sdf_inrees3";
		//Déclaration de la variable PDO
		private $pdo;
	
		public function __construct() {
			try {
				$pdo = new PDO("mysql:host=$this->databaseHost;dbname=$this->databaseName", $this->databaseUser, $this->databasePassword);
				$this->pdo = $pdo;
			} 
			catch(Exception $error) {
				echo 'Erreur : '.$error->getMessage();
				die();
			}
		}
		
		//Methode statique pour PDO
		public function returnPDO() {
			return $this->pdo;
		}
	}
?>