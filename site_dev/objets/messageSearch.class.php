<?php
	//Objet messageSearch

	class messageSearch {
		
		//Vars
		private $pdo;
		private $smarty;
		
		//__construct
		public function __construct($pdo, $smarty) {
			//Attribution variables
			$this->pdo = $pdo;
			$this->smarty = $smarty;
		}
		
		//Recherche avec mots clés...
		public function find($name, $topic, $content) {
			//Vérif que tout n'est pas vide
			if ($name != '' OR $topic != '0' OR $content!= '') {
				//recherche du nom
				$query = $this->pdo->prepare("SELECT admin_contact.id FROM admin_contact JOIN in_emails ON admin_contact.idemail = in_emails.id WHERE in_emails.nom LIKE '%$name%' OR in_emails.prenom LIKE '%$name%' ORDER BY admin_contact.id DESC");
				$query->execute();
				//Création array
				$messages = array();
				//Boucle
				while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
					//On boucle en checkant topic si != 0
					if ($topic != '0') {
						//Témoignage ?
						if ($topic == 'T') {
							//Query2
							$query2 = $this->pdo->prepare("SELECT id FROM admin_contact WHERE id = '$data[id]' AND tem = '1' AND message LIKE '%$content%' LIMIT 1");
							$query2->execute();
							$count = $query2->rowCount();
							//Check if count = 1
							if ($count == 1) {
								//Assignation
								$result = $query2->fetch(PDO::FETCH_ASSOC);
								//Message
								$adminMessage = new adminMessage($this->pdo, $result['id']);
								$details = $adminMessage->getDetails();
								//Replace
								$details['preview'] = str_replace($content, '<span style="background-color: yellow;">'.$content.'</span>', $details['preview']);
								//Transmission array
								$messages[] = $details;
							}
						}
						else {
							//Query2
							$query2 = $this->pdo->prepare("SELECT id FROM admin_contact WHERE id = '$data[id]' AND objet = '$topic' AND message LIKE '%$content%'");
							$query2->execute();
							$count = $query2->rowCount();
							//Check if count = 1
							if ($count == 1) {
								//Assignation
								$result = $query2->fetch(PDO::FETCH_ASSOC);
								//Message
								$adminMessage = new adminMessage($this->pdo, $result['id']);
								$details = $adminMessage->getDetails();
								//Replace
								$details['preview'] = str_replace($content, '<span style="background-color: yellow;">'.$content.'</span>', $details['preview']);
								//Transmission array
								$messages[] = $details;
							}
						}
					}
					else {
						//Query2
						$query2 = $this->pdo->prepare("SELECT id FROM admin_contact WHERE id = '$data[id]' AND message LIKE '%$content%'");
						$query2->execute();
						$count = $query2->rowCount();
						//Check if count = 1
						if ($count == 1) {
							//Assignation
							$result = $query2->fetch(PDO::FETCH_ASSOC);
							//Message
							$adminMessage = new adminMessage($this->pdo, $result['id']);
							$details = $adminMessage->getDetails();
							//Replace
							$details['preview'] = str_replace($content, '<span style="background-color: yellow;">'.$content.'</span>', $details['preview']);
							//Transmission array
							$messages[] = $details;
						}
					}
					//Assignation smarty
					$this->smarty->assign('messages', $messages);
				}
			}
		}
		
		//Recherche avec tag
		public function findByTag($tag) {
			//Query
			$query = $this->pdo->prepare("SELECT admin_contact.id FROM admin_contact JOIN admin_contacttemlink ON admin_contact.id = admin_contacttemlink.messageId WHERE admin_contacttemlink.tagId = '$tag' ORDER BY id DESC");
			$query->execute();
			//Array
			$messages = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Get details
				$adminMessage = new adminMessage($this->pdo, $data['id']);
				$messages[] = $adminMessage->getDetails();
			}
			//Smarty
			$this->smarty->assign('messages', $messages);
		}
	}
?>