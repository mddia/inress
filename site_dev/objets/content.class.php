<?php
	//Objet content, permet de sécuriser le contenu
	
	class content {

		private $content;
		
		//__construct
		public function __construct($content) {
			//Attribution variables
			$this->content = $content;
		}
		
		//Secure
		public function secure() {
			//Traitement du contenu
			$this->content = addslashes($this->content);
			$this->content = htmlspecialchars($this->content);
			$this->content = nl2br($this->content);
			//return du contenu
			return $this->content;
		}
	}
?>