<?php
	//Objet banniere le 13/01/2012
	
	class banniere {
		//Variables
		private $pdo;
		private $banType;
		
		//__construct
		public function __construct($pdo) {
			$this->pdo = $pdo;
		}
		
		//function getType
		public function getType() {
			$query = $this->pdo->prepare("SELECT banType FROM in_banniere ORDER BY timestamp DESC LIMIT 1");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			//Attribution banType
			$this->banType = $data['banType'];
			//return
			return $this->banType;
		}
		
		//update
		public function update($banType, $bansquare1, $url1, $bansquare2, $url2, $bansquare3, $url3, $bansquare4, $url4, $bansquare5, $url5, $bansquare6, $url6) {
			//Timestamp
			$timestamp = time();
			//Query
			$query = $this->pdo->prepare("INSERT INTO in_banniere VALUES('', '$banType', '$bansquare1', '$url1', '$bansquare2', '$url2', '$bansquare3', '$url3', '$bansquare4', '$url4', '$bansquare5', '$url5', '$bansquare6', '$url6', '$timestamp')");
			$query->execute();
		}
		
		//getBan
		public function getBan() {
			$query = $this->pdo->prepare("SELECT banType, bansquare1, url1, bansquare2, url2, bansquare3, url3, bansquare4, url4, bansquare5, url5, bansquare6, url6 FROM in_banniere ORDER BY timestamp DESC LIMIT 1");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			//array
			$ban = array(
				'banType' => $data['banType'],
				'bansquare1' => $data['bansquare1'],
				'url1' => $data['url1'],
				'bansquare2' => $data['bansquare2'],
				'url2' => $data['url2'],
				'bansquare3' => $data['bansquare3'],
				'url3' => $data['url3'],
				'bansquare4' => $data['bansquare4'],
				'url4' => $data['url4'],
				'bansquare5' => $data['bansquare5'],
				'url5' => $data['url5'],
				'bansquare6' => $data['bansquare6'],
				'url6' => $data['url6']
			);
			//return
			return $ban;
		}
	}
?>