<?php
	//Objet adminThread
	class adminThread {
		
		//Vars
		private $pdo;
		private $id;
		private $topic;
		
		//__construct
		public function __construct($pdo, $id) {
			//Vars
			$this->pdo = $pdo;
			//id != 0
			if ($id != 0) {
				//Vars
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT topic FROM admin_threads WHERE id = '$this->id'");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Vars
				$this->topic = stripslashes($data['topic']);
			}
		}
		
		//listAll
		public function listAll() {
			//Query
			$query = $this->pdo->prepare("SELECT DISTINCT admin_threads.id, admin_threads.topic FROM admin_threads JOIN admin_threadsmessages ON admin_threads.id = admin_threadsmessages.threadId ORDER BY admin_threadsmessages.timestamp DESC");
			$query->execute();
			//Array
			$threads = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création objet
				$adminThread = new adminThread($this->pdo, $data['id']);
				//getLastMessage
				$lastMessage = $adminThread->getLastMessage();
				//AllMessages
				$messages = $adminThread->getAllMessages();
				//Array
				$threads[] = array(
					'id' => $data['id'],
					'topic' => stripslashes($data['topic']),
					'lastMessage' => $lastMessage,
					'messages' => $messages,
				);
			}
			//Return
			return $threads;
		}
		
		//add
		public function add($modId, $topic, $message) {
			//Traitement
			$timestamp = time();
			//Topic
			$topic = addslashes($topic);
			//Content
			$content = new content($message);
			$message = $content->secure();
			
			//Queries
			$query = $this->pdo->prepare("INSERT INTO admin_threads VALUES('', '$topic')");
			$query->execute();
			//GetId
			$this->id = $this->pdo->lastInsertId();
			//Ajout message
			$query = $this->pdo->prepare("INSERT INTO admin_threadsmessages VALUES('', '$this->id', '$message', '$modId', '$timestamp')");
			$query->execute();
		}
		
		//answer
		public function answer($modId, $message) {
			//Traitement
			$timestamp = time();
			//Content
			$content = new content($message);
			$message = $content->secure();
			//Enregistrement message
			$query = $this->pdo->prepare("INSERT INTO admin_threadsmessages VALUES('', '$this->id', '$message', '$modId', '$timestamp')");
			$query->execute();
		}
		
		//getDetails
		public function getDetails() {
			//Récupération du dernier message
			$lastMessage = $this->getLastMessage();
			//Récupérations de tous les messages
			$messages = $this->getAllMessages();
			//Array
			$thread = array(
				'id' => $this->id,
				'topic' => $this->topic,
				'lastMessage' => $lastMessage,
				'messages' => $messages,
			);
			//Return
			return $thread;
		}
		
		//getAllMessages
		public function getAllMessages() {
			//Query
			$query = $this->pdo->prepare("SELECT id, message, modId, timestamp FROM admin_threadsmessages WHERE threadId = '$this->id' ORDER BY timestamp DESC");
			$query->execute();
			//array
			$messages = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Get moderateur infos
				$moderateur = new moderateur($this->pdo, $data['modId']);
				$modDetails = $moderateur->getDetails();
				//Array
				$messages[] = array(
					'id' => $data['id'],
					'content' => stripslashes($data['message']),
					'moderateur' => $modDetails,
					'timestamp' => $data['timestamp'],
				);
			}
			//Return
			return $messages;
		}
		
		//getLastMessage
		public function getLastMessage() {
			//Query
			$query = $this->pdo->prepare("SELECT id, message, modId, timestamp FROM admin_threadsmessages WHERE threadId = '$this->id' ORDER BY timestamp DESC LIMIT 1");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			//Get moderateur infos
			$moderateur = new moderateur($this->pdo, $data['modId']);
			$modDetails = $moderateur->getDetails();
			//Array
			$message = array(
				'id' => $data['id'],
				'content' => stripslashes($data['message']),
				'moderateur' => $modDetails,
				'timestamp' => $data['timestamp'],
			);
			//Return
			return $message;
		}
		
		//goTo
		public function goToThread() {
			header('location: admin.php?cat=reseau&scat=thread&id='.$this->id);
			exit();
		}
	}
?>