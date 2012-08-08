<?php
	//Objet label
	
	class label {
		
		//Vars
		private $pdo;
		private $id;
		private $name;
		private $background;
		private $color;
		
		//__construct
		public function __construct($pdo, $id) {
			//Attributions
			$this->pdo = $pdo;
			//Vérif
			if ($id != 0) {
				//Attribution
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT name, background, color FROM admin_labels WHERE id = '$this->id'");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Attribution
				$this->name = $data['name'];
				$this->background = $data['background'];
				$this->color = $data['color'];
			}
		}
		
		//getDetails()
		public function getDetails() {
			//Array
			$label = array(
				'id' => $this->id,
				'name' => stripslashes($this->name),
				'background' => $this->background,
				'color' => $this->color,
			);
			//Return
			return $label;
		}
		
		//listAll
		public function listAll() {
			//Array
			$labels = array();
			//Query
			$query = $this->pdo->prepare("SELECT id, name, background, color FROM admin_labels ORDER BY name ASC");
			$query->execute();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//On va lister les utilisateurs associés au label
				$moderateur = $this->getLinkedUsers($data['id']);
				//On liste les objets associés au label
				$objet = $this->getLinkedTopics($data['id']);
				//Transmission array
				$labels[] = array(
					'id' => $data['id'],
					'name' => stripslashes($data['name']),
					'moderateur' => $moderateur,
					'objet' => $objet,
					'background' => $data['background'],
					'color' => $data['color'],
				);
			}
			//Return
			return $labels;
		}
		
		//getLinkedTopics
		private function getLinkedTopics($labelId) {
			//Query
			$query = $this->pdo->prepare("SELECT DISTINCT objetId FROM admin_contactobjetslabelslinks WHERE labelId = '$labelId'");
			$query->execute();
			//Création array
			$linkedTopics = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création user
				$messageTopic = new messageTopic($this->pdo, $data['objetId']);
				$details = $messageTopic->getDetails();
				//Transmission array
				$linkedTopics[] = $details;
			}
			//Return
			return $linkedTopics;
		}
		
		//getLinkedUsers($labelId);
		private function getLinkedUsers($labelId) {
			//Query
			$query = $this->pdo->prepare("SELECT DISTINCT userId FROM admin_modolabelslinks WHERE labelId = '$labelId'");
			$query->execute();
			//Création array
			$linkedUsers = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création user
				$moderateur = new moderateur($this->pdo, $data['userId']);
				$details = $moderateur->getDetails();
				//Transmission array
				$linkedUsers[] = $details;
			}
			//Return
			return $linkedUsers;
		}
		
		//create
		public function create($name, $bckg, $color) {
			//Secure name
			$content = new content($name);
			$name = $content->secure();
			//Query
			$query = $this->pdo->prepare("INSERT INTO admin_labels VALUES('', '$name', '$bckg', '$color')");
			$query->execute();
			//last_insert_id
			$id = $this->pdo->lastInsertId();
			//return
			return $id;
		}
		
		//delete
		public function delete() {
			//Query
			$query = $this->pdo->prepare("DELETE FROM admin_labels WHERE id = '$this->id' LIMIT 1");
			$query->execute();
			//Delete user links
			$query = $this->pdo->prepare("DELETE FROM admin_modolabelslinks WHERE labelId = '$this->id' LIMIT 1");
			$query->execute();
			//Delete message links
			$query = $this->pdo->prepare("DELETE FROM admin_labelslink WHERE labelId = '$this->id' LIMIT 1");
			$query->execute();
			//Delete objet links
			$query = $this->pdo->prepare("DELETE FROM admin_contactobjetslabelslinks WHERE labelId = '$this->id' LIMIT 1");
			$query->execute();
		}
		
		//addUserLink
		public function addUserLink($userId) {
			//Delete user links
			$query = $this->pdo->prepare("INSERT INTO admin_modolabelslinks VALUES('', '$userId', '$this->id')");
			$query->execute();
		}
		
		//addTopicLink
		public function addTopicLink($topicId) {
			//Delete user links
			$query = $this->pdo->prepare("INSERT INTO admin_contactobjetslabelslinks VALUES('', '$topicId', '$this->id')");
			$query->execute();
		}
		
		//removeUserLink
		public function removeUserLink($userId) {
			//Delete user links
			$query = $this->pdo->prepare("DELETE FROM admin_modolabelslinks WHERE labelId = '$this->id' AND userId = '$userId'");
			$query->execute();
		}
		
		//removeTopicLink
		public function removeTopicLink($topicId) {
			//Delete user links
			$query = $this->pdo->prepare("DELETE FROM admin_contactobjetslabelslinks WHERE labelId = '$this->id' AND objetId = '$topicId'");
			$query->execute();
		}
	}
?>