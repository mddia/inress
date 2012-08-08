<?php
	//Objet time le 01/08/2011
	
	class time {
		private $timestamp;
		
		//Construct
		public function __construct($timestamp) {
			$this->timestamp = $timestamp;
		}
		
		//Conversion du timestamp
		public function convert() {
			$time = time();
			$diff = $time - $this->timestamp;
			//Traitement
			if ($diff < 9) {
				$time = 'À l\'instant';
			}
			elseif ($diff < 59) {
				$time = 'Il y a quelques secondes';
			}
			elseif ($diff < 119) {
				$time = 'Il y a 1 minute';
			}
			elseif ($diff < 3600) {
				$minutes = date("i", $diff);
				$time = 'Il y a '.$minutes.' minutes';
			}
			elseif ($diff < 3599) {
				$time = 'Il y a 1 heure';
			}
			elseif ($diff < 86399) {
				$heures = date("G", $diff);
				$time = 'Il y a '.$heures.' heures';
			}
			elseif ($diff < 172799) {
				$heure = date("H:i", $this->timestamp);
				$time = 'Hier à '.$heure;
			}
			elseif ($diff < 259199) {
				$heure = date("H:i", $this->timestamp);
				$time = 'Avant-hier à '.$heure;
			}
			elseif ($diff < 345599) {
				$heure = date("H:i", $this->timestamp);
				$time = 'Il y trois jours à '.$heure;
			}
			else {
				$heure = date("d/m/Y à H:i", $this->timestamp);
				$time = 'Le '.$heure;
			}
			//return
			return $time;
		}
	}
?>