<?php
	//Objet messagerie

	class messagerie {
		
		//Vars
		private $pdo;
		private $smarty;
		
		//__construct
		public function __construct($pdo, $smarty) {
			//Attribution variables
			$this->pdo = $pdo;
			$this->smarty = $smarty;
		}
		
		//listAwaitingMessages
		public function listAwaitingMessages() {
			//query : on sélectionne les id des messages sans labels (donc non redirigés)
			$query = $this->pdo->prepare("SELECT admin_contact.id FROM admin_contact WHERE admin_contact.corbeille = '0' AND admin_contact.id NOT IN(SELECT admin_contactreponses.messageId FROM admin_contactreponses) ORDER BY admin_contact.id DESC");
			$query->execute();
			//Counter
			$count = $query->rowCount();
			//On  boucle si count != 0
			if ($count != 0) {
				//Création array
				$awaitingMessages = array();
				//Boucle
				while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
					//Création d'un adminMessage
					$adminMessage = new adminMessage($this->pdo, $data['id']);
					$awaitingMessages[] = $adminMessage->getDetails();
				}
				//Smarty
				$this->smarty->assign('awaitingMessages', $awaitingMessages);
			}
			//Smarty
			$this->smarty->assign('awaitingMessagesCount', $count);
		}
		
		//listTestimonies
		public function listTestimonies() {
			//query : on sélectionne les id des messages sans labels (donc non redirigés)
			$query = $this->pdo->prepare("SELECT id FROM admin_contact WHERE tem = '1' ORDER BY id DESC");
			$query->execute();
			//Counter
			$count = $query->rowCount();
			//On  boucle si count != 0
			if ($count != 0) {
				//Création array
				$testimonies = array();
				//Boucle
				while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
					//Création d'un adminMessage
					$adminMessage = new adminMessage($this->pdo, $data['id']);
					$testimonies[] = $adminMessage->getDetails();
				}
				//Smarty
				$this->smarty->assign('testimonies', $testimonies);
			}
			//Smarty
			$this->smarty->assign('testimoniesCount', $count);
		}
		
		//listUnlabelledMessages
		public function listUnlabelledMessages() {
			//query : on sélectionne les id des messages sans labels (donc non redirigés)
			$query = $this->pdo->prepare("SELECT admin_contact.id FROM admin_contact WHERE admin_contact.corbeille = '0' AND admin_contact.id NOT IN(SELECT admin_labelslink.messageId FROM admin_labelslink) ORDER BY admin_contact.id DESC");
			$query->execute();
			//Counter
			$count = $query->rowCount();
			//On  boucle si count != 0
			if ($count != 0) {
				//Création array
				$unlabelledMessages = array();
				//Boucle
				while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
					//Création d'un adminMessage
					$adminMessage = new adminMessage($this->pdo, $data['id']);
					$unlabelledMessages[] = $adminMessage->getDetails();
				}
				//Smarty
				$this->smarty->assign('unlabelledMessages', $unlabelledMessages);
			}
			//Smarty
			$this->smarty->assign('unlabelledMessagesCount', $count);
		}
		
		//listDeletedMessages
		public function listDeletedMessages() {
			//query : on sélectionne les id des messages où corbeille = 1
			$query = $this->pdo->prepare("SELECT id FROM admin_contact WHERE corbeille = '1' ORDER BY id DESC");
			$query->execute();
			//Counter
			$count = $query->rowCount();
			//On  boucle si count != 0
			if ($count != 0) {
				//Création array
				$deletedMessages = array();
				//Boucle
				while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
					//Création d'un adminMessage
					$adminMessage = new adminMessage($this->pdo, $data['id']);
					$deletedMessages[] = $adminMessage->getDetails();
				}
				//Smarty
				$this->smarty->assign('deletedMessages', $deletedMessages);
			}
			//Smarty
			$this->smarty->assign('deletedMessagesCount', $count);
		}
		
		//listLabelledMessages
		public function listLabelledMessages($labelId) {
			//query : on sélectionne les id des messages avec le label déclaré
			$query = $this->pdo->prepare("SELECT DISTINCT messageId FROM admin_labelslink WHERE labelId = '$labelId' AND messageId NOT IN (SELECT messageId FROM admin_contactreponses) ORDER BY messageId DESC");
			$query->execute();
			//Counter
			$count = $query->rowCount();
			//On  boucle si count != 0
			if ($count != 0) {
				//Création array
				$labelledMessages = array();
				//Boucle
				while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
					//Création d'un adminMessage
					$adminMessage = new adminMessage($this->pdo, $data['messageId']);					
					$details = $adminMessage->getDetails();
					//On vérifie que le message n'est pas supprimé
					if ($details['corbeille'] == 0) {
						$labelledMessages[] = $details;
					}
					else {
						$count = $count-1;
					}
					
				}
			}
			//Sécurité array
			else {
				$labelledMessages[] = 0;
			}
			//Création array final
			$myLabel = array(
				'details' => $labelledMessages,
				'count' => $count,
			);
			//Return
			return $myLabel;
		}
		
		//listSentMessages
		public function listSentLabelledMessages($labelId, $type) {
			//Assign du type d'affichage
			$this->smarty->assign('displayType', $type);
			//Check
			if ($type == 'last') {
				//query : on sélectionne les réponses LIMIT 50
				$query = $this->pdo->prepare("SELECT admin_contactreponses.id FROM admin_contactreponses JOIN admin_labelslink ON admin_contactreponses.messageId = admin_labelslink.messageId WHERE admin_labelslink.labelId = '$labelId' ORDER BY timestamp DESC LIMIT 50");
			}
			elseif ($type == 'all') {
				//query : on sélectionne les réponses NO LIMIT
				$query = $this->pdo->prepare("SELECT admin_contactreponses.id FROM admin_contactreponses JOIN admin_labelslink ON admin_contactreponses.messageId = admin_labelslink.messageId WHERE admin_labelslink.labelId = '$labelId' ORDER BY timestamp DESC");
			}
			$query->execute();
			//Counter
			$count = $query->rowCount();
			//On  boucle si count != 0
			if ($count != 0) {
				//Création array
				$answerMessages = array();
				//Boucle
				while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
					//Création d'un adminMessage
					$answerMessage = new answerMessage($this->pdo, $data['id']);
					$answerMessages[] = $answerMessage->getDetails();
				}
				//Smarty
				$this->smarty->assign('answerMessages', $answerMessages);
			}
			//Smarty
			$this->smarty->assign('answerMessagesCount', $count);
		}
		
		//listSentMessages
		public function listSentMessages($type, $modoId) {
			//Assign du type d'affichage
			$this->smarty->assign('displayType', $type);
			//Check
			if ($type == 'last') {
				if ($modoId == 0) {
					//query : on sélectionne les réponses LIMIT 50
					$query = $this->pdo->prepare("SELECT id FROM admin_contactreponses ORDER BY timestamp DESC LIMIT 50");
				}
				else {
					//query : on sélectionne les réponses LIMIT 50
					$query = $this->pdo->prepare("SELECT id FROM admin_contactreponses WHERE idmodo = '$modoId' ORDER BY timestamp DESC LIMIT 50");
				}
			}
			elseif ($type == 'all') {
				if ($modoId == 0) {
					//query : on sélectionne les réponses NO LIMIT
					$query = $this->pdo->prepare("SELECT id FROM admin_contactreponses ORDER BY timestamp DESC");
				}
				else {
					//query : on sélectionne les réponses NO LIMIT
					$query = $this->pdo->prepare("SELECT id FROM admin_contactreponses WHERE idmodo = '$modoId' ORDER BY timestamp DESC");
				}
			}
			$query->execute();
			//Counter
			$count = $query->rowCount();
			//On  boucle si count != 0
			if ($count != 0) {
				//Création array
				$answerMessages = array();
				//Boucle
				while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
					//Création d'un adminMessage
					$answerMessage = new answerMessage($this->pdo, $data['id']);
					$answerMessages[] = $answerMessage->getDetails();
				}
				//Smarty
				$this->smarty->assign('answerMessages', $answerMessages);
			}
			//Smarty
			$this->smarty->assign('answerMessagesCount', $count);
		}
	}
?>