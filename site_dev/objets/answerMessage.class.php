<?php
	// objet adminMessage
	
	class answerMessage {
		
		//Vars
		private $pdo;
		private $id;		
		private $idemail;
		private $timestamp;
		private $messageId;
		private $message;
		private $objet;
		private $exp;
		private $idmodo;
		private $utpseudo;
		
		//__construct
		public function __construct($pdo, $id) {
			//Attr
			$this->pdo = $pdo;
			$this->id = $id;
			
			//Vérif si id != 0
			if ($this->id != 0) {
				//Query
				$query = $this->pdo->prepare("SELECT idemail, timestamp, messageId, message, exp, idmodo, utpseudo FROM admin_contactreponses WHERE id = '$this->id' LIMIT 1");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				
				//Infos objets du message
				$adminMessage = new adminMessage($this->pdo, $data['messageId']);
				$messageDetails = $adminMessage->getDetails();
				
				//Attribution
				$this->idemail = $data['idemail'];
				$this->timestamp = $data['timestamp'];
				$this->messageId = $data['messageId'];
				$this->message = $data['message'];
				$this->objet = $messageDetails['objet'];
				$this->exp = $data['exp'];
				$this->idmodo = $data['idmodo'];
				$this->utpseudo = $data['utpseudo'];
			}
		}
		
		//getDetails()
		public function getDetails() {
			//Get user details
			$user = new user($this->pdo, 0, $this->idemail);
			$userDetails = $user->getDetails();
			//Get moderator details
			$moderateur = new moderateur($this->pdo, $this->idmodo);
			$modDetails = $moderateur->getDetails();
			//Array
			$message = array(
				'id' => $this->id,
				'idemail' => $this->idemail,
				'firstName' => $userDetails['prenom'],
				'name' => $userDetails['nom'],
				'timestamp' => $this->timestamp,
				'messageId' => $this->messageId,
				'message' => $this->message,
				'objet' => $this->objet,
				'exp' => $this->exp,
				'idmodo' => $this->idmodo,
				'utpseudo' => $this->utpseudo,
				'moderateur' => $modDetails,
			);
			//Return
			return $message;
		}
	}
?>