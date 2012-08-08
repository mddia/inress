<?php
	// objet adminMessage
	
	class adminMessage {
		
		//Vars
		private $pdo;
		private $id;		
		private $email;
		private $idemail;
		private $timestamp;
		private $objet;
		private $message;
		private $otherMessagesCount;
		private $reponse;
		private $corbeille;
		private $pro;
		private $idmod;
		private $allix;
		private $lilli;
		private $bp;
		private $secretariat;
		private $reflexdem;
		private $reflex;
		private $tem;
		private $temut;
		private $temutprq;
		private $teminterest;
		private $pj;
		private $suivre;
		
		//__construct
		public function __construct($pdo, $id) {
			//Attr
			$this->pdo = $pdo;
			$this->id = $id;
			
			//Vérif si id != 0
			if ($this->id != 0) {
				//Query
				$query = $this->pdo->prepare("SELECT email, idemail, timestamp, objet, message, reponse, corbeille, pro, idmod, allix, lilli, bp, secretariat, reflexdem, reflex, tem, temut, temutprq, teminterest, pj, suivre FROM admin_contact WHERE id = '$this->id' LIMIT 1");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				
				//Attribution	
				$this->email = $data['email'];
				$this->idemail = $data['idemail'];
				$this->timestamp = $data['timestamp'];
				$this->objet = $data['objet'];
				$this->message = $data['message'];
				$this->reponse = $data['reponse'];
				$this->corbeille = $data['corbeille'];
				$this->pro = $data['pro'];
				$this->idmod = $data['idmod'];
				$this->allix = $data['allix'];
				$this->lilli = $data['lilli'];
				$this->bp = $data['bp'];
				$this->secretariat = $data['secretariat'];
				$this->reflexdem = $data['reflexdem'];
				$this->reflex = $data['reflex'];
				$this->tem = $data['tem'];
				$this->temut = $data['temut'];
				$this->temutprq = $data['temutprq'];
				$this->teminterest = $data['teminterest'];
				$this->pj = $data['pj'];
				$this->suivre = $data['suivre'];
			}
		}
		
		//create
		public function create($userId, $topicId, $message) {
			//Traitements
			$timestamp = time();
			//Message
			$content = new content($message);
			$message = $content->secure();
			//user
			$user = new user($this->pdo, 0, $userId);
			$userDetails = $user->getDetails();
			//Query
			$query = $this->pdo->prepare("INSERT INTO admin_contact VALUES ('' , '$userDetails[email]', '$userId', '$timestamp', '$topicId', '$message', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0')");
			$query->execute();
			//getLastInsertId
			$this->id = $this->pdo->lastInsertId();
			//messageTopic
			$messageTopic = new messageTopic($this->pdo, $topicId);
			//getLinkedLabels
			$labels = $messageTopic->getLinkedLabels();
			//Ajout automatique des labels liés au topic
			for ($i=0; $i<sizeof($labels); $i++) {
				$labelId = $labels[$i]['id'];
				$this->addLabel($labelId);
			} 
		}
		
		//getDetails()
		public function getDetails() {
			//Get user details
			$user = new user($this->pdo, 0, $this->idemail);
			$userDetails = $user->getDetails();
			//Calcul du délai depuis l'envoi du message
			$now = time();
			$passedTime = round(($now-$this->timestamp)/86400);
			//Get message labels
			$datas = $this->getLabels();
			$labels = $datas['labels'];
			$labelsCount = $datas['count'];
			//Get message tags
			$tags = $this->getTags();
			//getTopicTitle
			$messageTopic = new messageTopic($this->pdo, $this->objet);
			$topicDetails = $messageTopic->getDetails();
			//listOtherMessages
			$otherMessages = $this->listOtherMessages();
			//Aperçu
			$preview = substr($this->message, 0, 150).'...';
			$preview = str_replace('<br />', ' ', $preview);
			$preview = stripslashes($preview);
			//Array
			$message = array(
				'id' => $this->id,
				'email' => $this->email,
				'idemail' => $this->idemail,
				'firstName' => $userDetails['prenom'],
				'name' => $userDetails['nom'],
				'myinrees' => $userDetails['myinrees'],
				'labels' => $labels,
				'labelsCount' => $labelsCount,
				'timestamp' => $this->timestamp,
				'passedTime' => $passedTime,
				'objetId' => $this->objet,
				'objet' => $topicDetails['titre'],
				'message' => $this->message,
				'tags' => $tags,
				'preview' => $preview,
				'otherMessages' => $otherMessages,
				'otherMessagesCount' => $this->otherMessagesCount,
				'reponse' => $this->reponse,
				'corbeille' => $this->corbeille,
				'pro' => $this->pro,
				'idmod' => $this->idmod,
				'allix' => $this->allix,
				'lilli' => $this->lilli,
				'bp' => $this->bp,
				'secretariat' => $this->secretariat,
				'reflexdem' => $this->reflexdem,
				'reflex' => $this->reflex,
				'tem' => $this->tem,
				'temut' => $this->temut,
				'temutprq' => $this->temutprq,
				'teminterest' => $this->teminterest,
				'pj' => $this->pj,
				'suivre' => $this->suivre,
			);
			//Return
			return $message;
		}
		
		//getAnswers
		public function getAnswers($smarty) {
			//Query
			$query = $this->pdo->prepare("SELECT id FROM admin_contactreponses WHERE messageId = '$this->id' ORDER BY timestamp ASC");
			$query->execute();
			$answersCount = $query->rowCount();
			$smarty->assign('answersCount', $answersCount);
			//Création array
			$answers = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création objet
				$answerMessage = new answerMessage($this->pdo, $data['id']);
				$answerDetails = $answerMessage->getDetails();
				//Transmission array
				$answers[] = $answerDetails;
			}
			//Return
			return $answers;
		}
		
		//addAnswer()
		public function addAnswer($message) {
			//Cration variables
			$idModo = $_SESSION['moderateur']['id'];
			$timestamp = time();
			//Query
			$query = $this->pdo->prepare("INSERT INTO admin_contactreponses VALUES('', '$this->idemail', '$timestamp', '$this->id', '$message', '0', '$idModo', '0')");
			$query->execute();
		}
		
		//listOtherMessages
		public function listOtherMessages() {
			//Query
			$query = $this->pdo->prepare("SELECT DISTINCT id FROM admin_contact WHERE idemail = '$this->idemail' AND id != '$this->id'");
			$query->execute();
			$this->otherMessagesCount = $query->rowCount();
			//Array
			$otherMessages = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$otherMessages[] = array(
					'id' => $data['id'],
				);
			}
			//Return
			return $otherMessages;
		}
		
		//getLabels
		public function getLabels() {
			//Création array
			$labels = array();
			//Query
			$query = $this->pdo->prepare("SELECT DISTINCT admin_labels.id FROM admin_labels JOIN admin_labelslink WHERE admin_labelslink.labelId = admin_labels.id AND admin_labelslink.messageId = '$this->id'");			
			$query->execute();
			$count = $query->rowCount();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création objet
				$label = new label($this->pdo, $data['id']);
				$details = $label->getDetails();
				//Transmission
				$labels[] = $details;
			}
			//Array
			$datas = array(
				'labels' => $labels,
				'count' => $count,
			);
			//return
			return $datas;
		}
		
		//addLabel
		public function addLabel($labelId) {
			$query = $this->pdo->prepare("INSERT INTO admin_labelslink VALUES('', '$this->id', '$labelId')");
			$query->execute();
			//Get label details
			$datas = $this->getLabels();
			//Return
			return $datas['labels'];
		}
		
		//removeLabel
		public function removeLabel($labelId) {
			$query = $this->pdo->prepare("DELETE FROM admin_labelslink WHERE messageId = '$this->id' AND labelId = '$labelId'");
			$query->execute();
			//Get label details
			$datas = $this->getLabels();
			//Return
			return $datas['labels'];
		}
		
		//delete
		public function delete() {
			//Query
			$query = $this->pdo->prepare("UPDATE admin_contact SET corbeille = '1' WHERE id = '$this->id' LIMIT 1");
			$query->execute();
		}
		
		//redirect
		public function redirect() {
			header('location: admin.php?cat=messagerie&scat=message&id='.$this->id);
			exit();
		}
		
		//setAsTestimony
		public function setAsTestimony() {
			//Query
			$query = $this->pdo->prepare("UPDATE admin_contact SET tem = '1' WHERE id = '$this->id'");
			$query->execute();
		}
		
		//unsetTestimony
		public function unsetTestimony() {
			//Query
			$query = $this->pdo->prepare("UPDATE admin_contact SET tem = '0' WHERE id = '$this->id'");
			$query->execute();
		}
		
		//updateTestimony
		public function updateTestimony($note, $used, $usedfor) {
			//Query
			$query = $this->pdo->prepare("UPDATE admin_contact SET teminterest = '$note', temut = '$used', temutprq = '$usedfor' WHERE id = '$this->id'");
			$query->execute();
		}
				
		//addTag
		public function addTag($tagId) {
			//Query
			$query = $this->pdo->prepare("INSERT INTO admin_contacttemlink VALUES('', '$this->id', '$tagId')");
			$query->execute();
		}
		
		//getTags
		public function getTags() {
			//Query
			$query = $this->pdo->prepare("SELECT tagId FROM admin_contacttemlink WHERE messageId = '$this->id' ORDER BY tagId ASC");
			$query->execute();
			//Array
			$tags = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création objet
				$tag = new tag($this->pdo, $data['tagId']);
				//getDetails
				$tags[] = $tag->getDetails();
			}
			//return
			return $tags;
		}
		
		//removeTag
		public function removeTag($tagId) {
			//Query
			$query = $this->pdo->prepare("DELETE FROM admin_contacttemlink WHERE messageId = '$this->id' AND tagId = '$tagId'");
			$query->execute();
		}
	}
?>