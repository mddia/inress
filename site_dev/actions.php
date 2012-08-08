<?php
	//Chargement du fichier de config
	require('inc.config.php');
	
	/* Traitement selon le formulaire émetteur */
	switch ($_POST['formName']) {
	
		//** PAGE PARTENAIRES **//
		case 'updatePartner':
			$partner = new partner($pdo, $_POST['partnerId']);
			$partner->update($_POST['titre'], $_POST['description'], $_POST['site'], $_POST['adresse'], $_POST['adresse2'], $_POST['adresse3'], $_POST['postal'], $_POST['ville'], $_POST['pays'], $_POST['actifsite']);
			$partner->redirect();
			break;
	
		//** PAGE CONTACT **//
		case 'contactINREES':
			//Vérif
			if ($_POST['topic'] != 0) {
				//Création du message
				$adminMessage = new adminMessage($pdo, 0);
				$adminMessage->create($_POST['userId'], $_POST['topic'], $_POST['content']);
			}
			//Redirection
			header('location: contact.php?etape=2&m=messageEnvoye');
			break;
			
	
		//** GESTION ADMIN ABONNES **//
		//addNewEmail
		case 'addNewEmail':
			$user = new user($pdo, $_POST['email'], 0);
			$user->register(0, $_POST['name'], $_POST['firstName']);
			$user->goToAdminPage();
			break;
		//updateUserRoutage
		case 'updateUserRoutage':
			$userId = $_POST['userId'];
			$user = new user($pdo, 0, $userId);
			$user->updateRoutage($_POST['emailbis'], $_POST['newsletteractif'], $_POST['frequence'], $_POST['routage']);
			break;
		//listUserAddresses
		case 'listUserAddresses':
			$userId = $_POST['userId'];
			$user = new user($pdo, 0, $userId);
			$addresses = $user->listAllAddresses();
			//Transmission des adresses
			echo json_encode($addresses);
			break;
		//recordUserAddress
		case 'recordUserAddress':
			//Unused vars
			$civility = '';
			//Ajout
			$userId = $_POST['userId'];
			$user = new user($pdo, 0, $userId);
			$user->addAddress($civility, $_POST['name'], $_POST['firstName'], $_POST['address1'], $_POST['address2'], 0, $_POST['city'], $_POST['zipCode'], $_POST['country'], $_POST['state'], 0);
			break;
		//setAddressAsDefault
		case 'setAddressAsDefault':
			$address = new address($pdo, $_POST['addressId']);
			$address->setAsDefault();
			break;
		//deleteAddress
		case 'deleteAddress':
			$address = new address($pdo, $_POST['addressId']);
			$address->delete();
			break;
			
		//** GESTION ACTIVITES **//
		//addIntervenant
		case 'addIntervenant':
			$soutien = new soutien($pdo, 0);
			$soutien->add($_POST['prenom'], $_POST['nom'], $_POST['intro'], $_POST['citation'], $_POST['url'], $_POST['professionFR'], $_POST['photo']);
			//Redirection
			header('location: admin.php?cat=website&scat=gestionIntervenants');
			break;
		//createActivite
		case 'createActivite':
			//Traitement timestamps
			$dateD = mktime($_POST['Dheures'], $_POST['Dminutes'], $_POST['Dsecondes'], $_POST['Dmois'], $_POST['Djours'], $_POST['Dannee']);
			$dateF = mktime($_POST['Fheures'], $_POST['Fminutes'], $_POST['Fsecondes'], $_POST['Fmois'], $_POST['Fjours'], $_POST['Fannee']);
			
			//Enregistrement activite
			$activites = new activites($pdo, $smarty);
			$eventId = $activites->create($_POST['activites'], $_POST['online'], $_POST['theme'], $_POST['url'], $_POST['titre'], $_POST['sst'], $_POST['presentation']);
			$activites->createPlus($eventId, $_POST['locaux'], $dateD, $dateF, $_POST['dispos'], $_POST['actif']);
			
			//Boucle enregistrement intervenants
			$intervenants = $_POST['intervenants'];
					
			//Foreach
			foreach($intervenants as $intervenant) {
				if ($intervenant != 0) {
					//Enregistrement
					$activites->addIntervenant($eventId, $intervenant);
				}
			}
			
			//Redirection vers évènement
			$activites->goToActivite($eventId);
			
			break;
		//deleteActivityType
		case 'deleteActivityType':
			$activites = new activites($pdo, $smarty);
			$activites->deleteActivityType($_POST['id']);
			break;
		//addActivityType
		case 'addActivityType':
			$activites = new activites($pdo, $smarty);
			$activites->addActivityType($_POST['nomsing'], $_POST['nompl'], $_POST['desc'], $_POST['URL'], $_POST['actif']);
			break;
		//updateActivityType
		case 'updateActivityType':
			$activites = new activites($pdo, $smarty);
			$activites->updateActivityType($_POST['id'], $_POST['nomsing'], $_POST['nompl'], $_POST['desc'], $_POST['urlactiv']);
			break;
		//addLocaux
		case 'addLocaux':
			$activites = new activites($pdo, $smarty);
			$activites->addLocaux($_POST['nom'], $_POST['adresse'], $_POST['adressebis'], $_POST['remarques'], $_POST['ville'], $_POST['postal'], $_POST['map']);
			break;
		//updateLocaux
		case 'updateLocaux':
			$activites = new activites($pdo, $smarty);
			$activites->updateLocaux($_POST['id'], $_POST['nom'], $_POST['adresse'], $_POST['adressebis'], $_POST['remarques'], $_POST['ville'], $_POST['postal'], $_POST['map']);
			break;
		//deleteLocaux
		case 'deleteLocaux':
			$activites = new activites($pdo, $smarty);
			$activites->deleteLocaux($_POST['id']);
			break;
			
			
		//** GESTION BUDGET **//
		//ajoutRent
		case 'ajoutRent':
			$budget = new budget($pdo, $smarty);
			$budget->ajoutRent($_POST['Dannee'], $_POST['Dmois'], $_POST['Djours'], $_POST['Eannee'], $_POST['Emois'], $_POST['Ejours'], $_POST['valid'], $_POST['titre'], $_POST['prix'], $_POST['prix2'], $_POST['tva'], $_POST['pht1'], $_POST['pht2'], $_POST['mode']);
			break;
		//ajoutRentX
		case 'ajoutRentX':
			$budget = new budget($pdo, $smarty);
			$budget->ajoutRentX();
			break;
			
		
		//** ADMIN THREADS **//
		case 'addNewThread':
			$adminThread = new adminThread($pdo, 0);
			$adminThread->add($_POST['modId'], $_POST['topic'], $_POST['message']);
			$adminThread->goToThread();
			break;
		case 'addThreadAnswer':
			$adminThread = new adminThread($pdo, $_POST['threadId']);
			$adminThread->answer($_POST['modId'], $_POST['message']);
			$adminThread->goToThread();
			break;
			
	
		//** GESTION ADMIN COMMANDES **//
		//recallForOrder
		case 'recallForOrder':
			$order = new order($pdo, $smarty, $_POST['orderId']);
			$order->sendRecall();
			break;
		//recordOrderFromAdmin
		case 'recordOrderFromAdmin':
			//Comptage du nombre de boxes de livraison
			$boxCount = $_POST['boxesCount'];
			$userId = $_POST['orderUserId'];
			$orderValue = $_POST['orderValue'];
			//CREATION / ENREGISTREMENT COMMANDE
			$adminOrder = new adminOrder($pdo, $smarty, 0);
			$adminOrder->record($userId, $orderValue);
			//Boucle
			for ($boxId = 1; $boxId <= $boxCount; $boxId++) {
				//On vérifie qu'il y a des objets à ajouter
				if (array_key_exists('itemId-'.$boxId, $_POST) AND $_POST['itemId-'.$boxId] != '') {
					//Définition variable itemId
					$items = $_POST['itemId-'.$boxId];
					
					//Boucle sur le type d'id
					foreach($items as $itemId) {
						//Variables
						$userAddress = $_POST['userAddress-'.$boxId];
						//Ajout du produit
						$adminOrder->addItem($itemId, $_POST['item'.$itemId.'Quantity-'.$boxId], $userAddress);
						//Si abo
						if ($_POST['item'.$itemId.'Abo-'.$boxId] == 1) {
							//startMag
							$startMag = $_POST['item'.$itemId.'Select-'.$boxId];
							//Get aboId (idProduit)
							$products = new products($pdo, $itemId);
							$details = $products->getDetails();
							$aboId = $details['idProduit'];
							$aboFreq = $details['aboFreq'];
							$eaboFreq = $details['eaboFreq'];
							//Mag reçu ?
							if (array_key_exists('receivedMagItem'.$itemId.'-'.$boxId, $_POST) AND $_POST['receivedMagItem'.$itemId.'-'.$boxId] == true) {
								$magReceived = 1;
							}
							else {
								$magReceived = 0;
							}
							//isGift
							if (array_key_exists('isGiftItem'.$itemId.'-'.$boxId, $_POST) AND $_POST['isGiftItem'.$itemId.'-'.$boxId] == true) {
								$isGift = 1;
								//Enregistrement de l'abonnement
								$adminOrder->recordAbo($userId, $aboId, $aboFreq, $eaboFreq, $startMag, $magReceived, $isGift);
								//Enregistrement de la procédure de nouvel abo et update shipping address
								$adminOrder->recordAwaitingUser($_POST['giftAddress'.$itemId.'-'.$boxId.'-email'], $_POST['giftAddress'.$itemId.'-'.$boxId.'-firstName'], $_POST['giftAddress'.$itemId.'-'.$boxId.'-name'], $_POST['giftAddress'.$itemId.'-'.$boxId.'-address1'], $_POST['giftAddress'.$itemId.'-'.$boxId.'-address2'], $_POST['giftAddress'.$itemId.'-'.$boxId.'-address3'], $_POST['giftAddress'.$itemId.'-'.$boxId.'-zipCode'], $_POST['giftAddress'.$itemId.'-'.$boxId.'-city']);
							}
							else {
								$isGift = 0;
								//Enregistrement de l'abonnement
								$adminOrder->recordAbo($userId, $aboId, $aboFreq, $eaboFreq, $startMag, $magReceived, $isGift);
							}
						}
					}
				}
				//Redirection vers la commande
				$adminOrder->redirect();
			}
			break;
		//setOrderAsSent
		case 'setOrderAsSent':
			$order = new order($pdo, $smarty, $_POST['orderId']);
			$order->setAsSent();
			break;		
		//setOrderAsPaid
		case 'setOrderAsPaid':
			$order = new order($pdo, $smarty, $_POST['orderId']);
			$order->setAsPaid($_POST['paymentType'], $_POST['transactionNumber']);
			break;
		//refundOrder
		case 'refundOrder':
			$order = new order($pdo, $smarty, $_POST['orderId']);
			$order->refund($_POST['refundValue']);
			break;
		//displayFamilyProducts
		case 'displayFamilyProducts':
			$order = new order($pdo, $smarty, 0);
			$result = $order->findItemInOrder($_POST['target'], $_POST['familyId']);
			//Transmission de la liste
			echo json_encode($result);
			break;
		//getOrderDetails
		case 'getOrderDetails':
			$order = new order($pdo, $smarty, $_POST['orderId']);
			$result = $order->getDetails();
			//Transmission de la liste
			echo json_encode($result);
			break;
	
		//** GESTION ADMIN MEMBRES **//
		//fusionUsers
		case 'fusionUsers':
			//Création user
			$user = new user($pdo, 0, $_POST['userToKeep']);
			$user->fusionWith($_POST['userToDelete']);
			//Redirection
			$user->validateFusion();
			break;
		//deleteUser
		case 'deleteUser':
			//Delete user
			$user = new user($pdo, 0, $_POST['id']);
			$user->delete();
			break;
		//userRecoverRecord
		case 'userRecoverRecord':
			//Création utilisateur
			$user = new user($pdo, 0, 0);
			$user->registerNew($_POST['email'], $_POST['civility'], $_POST['name'], $_POST['firstName'], $_POST['password']);
			//Recover Abo
			$result = $user->recoverAbo($_POST['aboId'], $_POST['addressId']);
			//Actions si l'opération s'est bien déroulée
			if ($result == 1) {
				//Suppression du recover
				$recoverAbo = new recoverAbo($pdo, $smarty);
				$recoverAbo->remove($_POST['email']);
				//Login
				$logIn = new logIn($pdo, $_POST['email'], $_POST['password']);
				$logIn->check();
			}
			break;
		//checkUserId
		case 'checkUserId':
			//Variables
			$userId = $_POST['userId'];
			//Query
			$query = $pdo->prepare("SELECT email FROM in_emails WHERE id = '$userId'");
			$query->execute();
			$count = $query->rowCount();
			//Redirection si exist
			if ($count != 0) {
				header('location: admin.php?cat=membres&scat=membres&id='.$userId);
				exit();
			}
			else {
				header('location: admin.php?cat=membres&scat=rechercherid&m=unknowId');
				exit();
			}
			break;
	
		//** GESTION ADMIN MAGAZINE **//
		//displayMagList
		case 'displayMagList':	
			//Traitement
			$magazine = new magazine($pdo);
			$mags = $magazine->getAboMags($_POST['aboId']);
			//Transmission des mags
			echo json_encode($mags);
			break;
		//recordNewMag
		case 'recordNewMag':
			//Traitement
			$dispo = mktime(0, 0, 0, $_POST['MM'], $_POST['JJ'], $_POST['AAAA']);
			//Enregistrament new mag
			$magazine = new magazine($pdo);
			$magazine->record($_POST['aboId'], $_POST['numero'], $_POST['titre'], $_POST['actif'], $_POST['online'], $dispo);
			break;
		//addMagArticle
		case 'addMagArticle':
			//Création variables
			$timestamp = mktime($_POST['heures'], $_POST['minutes'], $_POST['secondes'], $_POST['mois'], $_POST['jours'], $_POST['annee']);
			$photodir = $_POST['photoname'];
			$idrub = $_POST['idrub'];
			$idtheme = $_POST['idtheme'];
			$url = $_POST['url'];
			$minititre = $_POST['minititre'];
			$titre = $_POST['titre'];
			$minidesc = $_POST['desc'];
			$idredacteur = $_POST['idredac'];
			$html = $_POST['html'];			
			$actif = $_POST['actif'];
			$myinrees = $_POST['myinrees'];
			$blog = $_POST['blog'];
			$online = $_POST['online'];
			//empty vars
			$htmlgratuit = '';
			$stats = 0;
			$redacteur = '';
			$fav = 0;
			$top = 0;
			$bot = 0;
			$website = '';
			$idmag = 0;
			$photocopy = '';
			
			//Création objet
			$magazineArticle = new magazineArticle($pdo, 0);
			$magazineArticle->add($myinrees, $blog, $stats, $timestamp, $photodir, $photocopy, $idrub, $idtheme, $url, $minititre, $titre, $minidesc, $htmlgratuit, $html, $idredacteur, $redacteur, $fav, $actif, $online, $top, $bot, $website, $idmag);
			$magazineArticle->editView('saved');
			
			break;
		
		//ediMagArticle
		case 'editMagArticle':
			//Création variables
			$timestamp = mktime($_POST['heures'], $_POST['minutes'], $_POST['secondes'], $_POST['mois'], $_POST['jours'], $_POST['annee']);
			$photodir = $_POST['photoname'];
			$idrub = $_POST['idrub'];
			$idtheme = $_POST['idtheme'];
			$url = $_POST['url'];
			$minititre = $_POST['minititre'];
			$titre = $_POST['titre'];
			$minidesc = $_POST['desc'];
			$idredacteur = $_POST['idredac'];
			$html = $_POST['html'];			
			$actif = $_POST['actif'];
			$myinrees = $_POST['myinrees'];
			$blog = $_POST['blog'];
			$online = $_POST['online'];
			//empty vars
			$htmlgratuit = '';
			$stats = 0;
			$redacteur = '';
			$fav = 0;
			$top = 0;
			$bot = 0;
			$website = '';
			$idmag = 0;
			$photocopy = '';
			
			//Création objet
			$magazineArticle = new magazineArticle($pdo, $_POST['articleId']);
			$magazineArticle->update($myinrees, $blog, $stats, $timestamp, $photodir, $photocopy, $idrub, $idtheme, $url, $minititre, $titre, $minidesc, $htmlgratuit, $html, $idredacteur, $redacteur, $fav, $actif, $online, $top, $bot, $website, $idmag);
			$magazineArticle->editView('edited');
			
			break;
		
		//ediMagArticle
		case 'deleteMagArticle':
			$magazineArticle = new magazineArticle($pdo, $_POST['articleId']);
			$magazineArticle->delete();
			break;
			
		//** GESTION MESSAGERIE **//
		case 'updateTestimony':
			//Création message
			$adminMessage = new adminMessage($pdo, $_POST['messageId']);
			$adminMessage->updateTestimony($_POST['note'], $_POST['used'], $_POST['usedfor']);
			//Ajout des tags
			if (array_key_exists('tag', $_POST) AND $_POST['tag'] != '') {
				foreach($_POST['tag'] as $tagId) { 
					$adminMessage->addTag($tagId);
				}
			}
			//redirection
			$adminMessage->redirect();
			break;
		//setMessageAsTestimony
		case 'setMessageAsTestimony':
			//Création objet
			$adminMessage = new adminMessage($pdo, $_POST['messageId']);
			$adminMessage->setAsTestimony();
			break;
		//unsetTestimony
		case 'unsetTestimony':
			//Création objet
			$adminMessage = new adminMessage($pdo, $_POST['messageId']);
			$adminMessage->unsetTestimony();
			break;
		//removeTagFromMessage
		case 'removeTagFromMessage':
			$adminMessage = new adminMessage($pdo, $_POST['messageId']);
			$adminMessage->removeTag($_POST['tagId']);
			break;
		//createTopic
		case 'createTopic':
			$messageTopic = new messageTopic($pdo, 0);
			$messageTopic->create($_POST['name']);
			break;
		//editTopic
		case 'editTopic':
			$messageTopic = new messageTopic($pdo, $_POST['topicId']);
			$messageTopic->editName($_POST['newName']);
			break;
		//deleteTopic
		case 'deleteTopic':
			$messageTopic = new messageTopic($pdo, $_POST['topicId']);
			$messageTopic->delete();
			break;
		//sendAnswer
		case 'sendAnswer':
			//Traitement du message
			$adminMessage = new adminMessage($pdo, $_POST['messageId']);
			$adminMessage->addAnswer($_POST['message']);
			//Redirection vers le message
			$adminMessage->redirect();
			break;
		//createLabel
		case 'createLabel':
			$label = new label($pdo, 0);
			$labelId = $label->create($_POST['name'], $_POST['bckg'], $_POST['color']);
			//Transmission du label
			echo json_encode($labelId);
			break;
		//addLabel
		case 'addLabel':
			$adminMessage = new adminMessage($pdo, $_POST['messageId']);
			$labels = $adminMessage->addLabel($_POST['labelId']);
			//Transmission de la liste
			echo json_encode($labels);
			break;
		//removeLabel
		case 'removeLabel':
			$adminMessage = new adminMessage($pdo, $_POST['messageId']);
			$labels = $adminMessage->removeLabel($_POST['labelId']);
			//Transmission de la liste
			echo json_encode($labels);
			break;
		//deleteLabel
		case 'deleteLabel':
			$label = new label($pdo, $_POST['labelId']);
			$label->delete();
			break;
		//removeUserLink
		case 'removeUserLink':
			$label = new label($pdo, $_POST['labelId']);
			$label->removeUserLink($_POST['userId']);
			break;
		//removeTopicLink
		case 'removeTopicLink':
			$label = new label($pdo, $_POST['labelId']);
			$label->removeTopicLink($_POST['topicId']);
			break;
		//addModerateur
		case 'addModerateur':
			$moderateur = new moderateur($pdo, 0);
			$moderateur->add($_POST['firstName'], $_POST['name'], $_POST['pseudo'], $_POST['responsabilites'], $_POST['email'], $_POST['acces'], $_POST['actif']);
			//redirection
			header('location: admin.php?cat=general&scat=gestionModerateurs');
			break;
		//listAllModerateurs
		case 'listAllModerateurs':
			$moderateur = new moderateur($pdo, 0);
			$result = $moderateur->listAll();
			//Transmission de la liste
			echo json_encode($result);
			break;
		//listAllTopics
		case 'listAllTopics':
			$messageTopic = new messageTopic($pdo, 0);
			$result = $messageTopic->listAll();
			//Transmission de la liste
			echo json_encode($result);
			break;
		//addUserToLabel
		case 'addUserToLabel':
			$label = new label($pdo, $_POST['labelId']);
			$label->addUserLink($_POST['userId']);
			break;
		//addTopicToLabel
		case 'addTopicToLabel':
			$label = new label($pdo, $_POST['labelId']);
			$label->addTopicLink($_POST['topicId']);
			break;
		//deleteMessage
		case 'deleteMessage':
			$adminMessage = new adminMessage($pdo, $_POST['messageId']);
			$adminMessage->delete();
			break;
			
		//** GESTION PODCASTS **//
		case 'createPodcast':

			$intervenant = $_POST['intervenant'] ;
			$intervenant2 = $_POST['intervenant2'];
			$intervenant3 = $_POST['intervenant3'];
			
			$theme = $_POST['theme'] ;
			$url = $_POST['url'] ;
			$titre = $_POST['titre'] ;
			$sst = $_POST['sst'] ;
			$timestamp = mktime(0, 0, 0, $_POST['mois'], $_POST['jours'], $_POST['annee']);
			$dureeS = $_POST['dureeS'];
			$actif = $_POST['actif'];
			
			$confassign = $_POST['confassign'] ; 
			$myinrees = $_POST['myinrees'] ; 
			
			//Création objet podcast
			$podcast = new podcast($pdo, 0);
			$podcast->add($myinrees, $confassign, $theme, $url, $titre, $sst, $timestamp, $dureeS, $actif);
			
			//Tags
			$length = count($_POST['tag']);			
			//Boucle ajout tag
			for ($i = 0; $i < $length; $i++) {
				$podcast->addTag($_POST['tag'][$i]);
			}
			//Redirection 
			$podcast->editView('edited');
			break;
			
		//** GESTION VIDEO **//
		case 'createVideo':

			$intervenant = $_POST['intervenant'] ;
			$intervenant2 = $_POST['intervenant2'];
			$intervenant3 = $_POST['intervenant3'];
			
			$theme = $_POST['theme'] ;
			$url = $_POST['url'] ;
			$titre = $_POST['titre'] ;
			$sst = $_POST['sst'] ;
			$timestamp = mktime(0, 0, 0, $_POST['mois'], $_POST['jours'], $_POST['annee']);
			$dureeS = $_POST['dureeS'];
			$actif = $_POST['actif'];
			
			$confassign = $_POST['confassign'] ; 
			$myinrees = $_POST['myinrees'] ; 
			
			//Création objet video
			$video = new video($pdo, 0);
			$video->add($myinrees, $confassign, $theme, $url, $titre, $sst, $timestamp, $dureeS, $actif);
			
			//Tags
			$length = count($_POST['tag']);			
			//Boucle ajout tag
			for ($i = 0; $i < $length; $i++) {
				$video->addTag($_POST['tag'][$i]);
			}
			//Redirection 
			$video->editView('edited');
			break;
		
		//** GESTION ADMIN CATEGORIES **//
		//listCategories
		case 'listCategories':
			$categories = new categories($pdo, 0);
			$list = $categories->listAll();
			//Transmission de la liste
			echo json_encode($list);
			break;
		//addCategory
		case 'addCategory':
			$categories = new categories($pdo, 0);
			$categories->add($_POST['catName']);
			break;
		//deleteCategory
		case 'deleteCategory':
			$categories = new categories($pdo, $_POST['catId']);
			$categories->delete();
			break;
		//updateCategoryVisibility
		case 'updateCategoryVisibility':
			$categories = new categories($pdo, $_POST['catId']);
			$categories->updateVisibility();
			break;
		//returnCategoryDetails
		case 'returnCategoryDetails':
			$categories = new categories($pdo, $_POST['catId']);
			$details = $categories->getDetails();
			//Transmission de la liste
			echo json_encode($details);
			break;
		//editCategoryName
		case 'editCategoryName':
			$categories = new categories($pdo, $_POST['catId']);
			$categories->changeName($_POST['newName']);
			break;
			
			
		//** GESTION ADMIN FAMILLES **//
		//listFamilies
		case 'listFamilies':
			$families = new families($pdo, 0);
			$list = $families->listAll();
			//Transmission de la liste
			echo json_encode($list);
			break;
		//addFamily
		case 'addFamily':
			$families = new families($pdo, 0);
			$families->add($_POST['familyName'], $_POST['catId']);
			break;
		//deleteFamily
		case 'deleteFamily':
			$families = new families($pdo, $_POST['familyId']);
			$families->delete();
			break;
		//updateFamilyVisibility
		case 'updateFamilyVisibility':
			$families = new families($pdo, $_POST['familyId']);
			$families->updateVisibility();
			break;
		//returnFamilyDetails
		case 'returnFamilyDetails':
			$families = new families($pdo, $_POST['familyId']);
			$details = $families->getDetails();
			//Transmission de la liste
			echo json_encode($details);
			break;
		//editFamilyName
		case 'editFamilyName':
			$families = new families($pdo, $_POST['familyId']);
			$families->changeName($_POST['newName'], $_POST['newCatId']);
			break;
			
			
		//** GESTION ADMIN PRODUCT TYPES **//
		//listProductsType
		case 'listProductsType':
			$productsType = new productsType($pdo, 0);
			$list = $productsType->listAll();
			//Transmission de la liste
			echo json_encode($list);
			break;
		//addProductType
		case 'addProductType':
			$productsType = new productsType($pdo, 0);
			$productsType->add($_POST['name'], $_POST['familyId'], $_POST['remarque'], $_POST['url']);
			break;
		//deleteProductType
		case 'deleteProductType':
			$productsType = new productsType($pdo, $_POST['productTypeId']);
			$productsType->delete();
			break;
		//updateProductTypeVisibility
		case 'updateProductTypeVisibility':
			$productsType = new productsType($pdo, $_POST['productTypeId']);
			$productsType->updateVisibility();
			break;
		//returnProductTypeDetails
		case 'returnProductTypeDetails':
			$productsType = new productsType($pdo, $_POST['productTypeId']);
			$details = $productsType->getDetails();
			//Transmission de la liste
			echo json_encode($details);
			break;
		//editProductType
		case 'editProductType':
			$productsType = new productsType($pdo, $_POST['productTypeId']);
			$productsType->changeName($_POST['newName'], $_POST['newFamilyId'], $_POST['newRemarque'], $_POST['newUrl'],  $_POST['newEvent'],  $_POST['newSubscription']);
			break;
			
			
		//** GESTION ADMIN PRODUCT **//
		//listProducts
		case 'listProducts':
			$products = new products($pdo, 0);
			$list = $products->listAll();
			//Transmission de la liste
			echo json_encode($list);
			break;
		//addProduct
		case 'addProduct':
			$products = new products($pdo, 0);
			$products->add($_POST['name'], $_POST['productTypeId'], $_POST['description'], $_POST['prixPublic'], $_POST['prixMembres'], $_POST['aboFreq'], $_POST['eaboFreq'], $_POST['weight'], $_POST['eventId']);
			break;
		//deleteProduct
		case 'deleteProduct':
			$products = new products($pdo, $_POST['productId']);
			$products->delete();
			break;
		//returnProductDetails
		case 'returnProductDetails':
			$products = new products($pdo, $_POST['productId']);
			$details = $products->getDetails();
			//Transmission de la liste
			echo json_encode($details);
			break;
		//editProduct
		case 'editProduct':
			$products = new products($pdo, $_POST['productId']);
			$products->changeName($_POST['newName'], $_POST['newProductTypeId'], $_POST['newDescription'], $_POST['prixPublic'], $_POST['prixMembres'], $_POST['aboFreq'], $_POST['eaboFreq'], $_POST['weight']);
			break;
			
			
		//** GESTION ADMIN DELIVERY **//
		//listDeliveries
		case 'listDeliveries':
			$delivery = new delivery($pdo, 0);
			$list = $delivery->listAll();
			//Transmission de la liste
			echo json_encode($list);
			break;
		//addProduct
		case 'addDelivery':
			$delivery = new delivery($pdo, 0);
			$delivery->add($_POST['deliveryName'], $_POST['tarif'], $_POST['limit']);
			break;
		//deleteDelivery
		case 'deleteDelivery':
			$delivery = new delivery($pdo, $_POST['deliveryId']);
			$delivery->delete();
			break;
		//updateDeliveryVisibility
		case 'updateDeliveryVisibility':
			$delivery = new delivery($pdo, $_POST['deliveryId']);
			$delivery->updateVisibility();
			break;
		//returnDeliveryDetails
		case 'returnDeliveryDetails':
			$delivery = new delivery($pdo, $_POST['deliveryId']);
			$details = $delivery->getDetails();
			//Transmission de la liste
			echo json_encode($details);
			break;
		//editDeliveryName
		case 'editDeliveryName':
			$delivery = new delivery($pdo, $_POST['deliveryId']);
			$delivery->changeName($_POST['newName'], $_POST['tarif'], $_POST['limit']);
			break;
			
			
		//** GESTION PROMO CODES **//
		//listPromoCodes
		case 'listPromoCodes':
			$promoCode = new promoCode($pdo, 0);
			$list = $promoCode->listAll();
			//Transmission de la liste
			echo json_encode($list);
			break;
		//addPromoCode
		case 'addPromoCode':
			$promoCode = new promoCode($pdo, 0);
			$promoCode->add($_POST['promoCodeName'], $_POST['reduction'], $_POST['limited']);
			break;
		//deletePromoCode
		case 'deletePromoCode':
			$promoCode = new promoCode($pdo, $_POST['codeId']);
			$promoCode->delete();
			break;
		//updatePromoCodeVisibility
		case 'updatePromoCodeVisibility':
			$promoCode = new promoCode($pdo, $_POST['codeId']);
			$promoCode->updateVisibility();
			break;
		//returnPromoCodeDetails
		case 'returnPromoCodeDetails':
			$promoCode = new promoCode($pdo, $_POST['codeId']);
			$details = $promoCode->getDetails();
			//Transmission de la liste
			echo json_encode($details);
			break;
		//editPromoCodeName
		case 'editPromoCodeName':
			$promoCode = new promoCode($pdo, $_POST['codeId']);
			$promoCode->changeName($_POST['newName'], $_POST['reduction'], $_POST['limited']);
			break;
		
			
		//** GESTION BANNIERE **//
		//getBanType
		case 'getBanType':
			$banniere = new banniere($pdo);
			$banType = $banniere->getType();
			//Transmission de la liste
			echo json_encode($banType);
			break;
		//getBanType
		case 'updateBan':
			$banniere = new banniere($pdo);
			$banniere->update($_POST['banType'], $_POST['bansquare1'], $_POST['url1'], $_POST['bansquare2'], $_POST['url2'], $_POST['bansquare3'], $_POST['url3'], $_POST['bansquare4'], $_POST['url4'], $_POST['bansquare5'], $_POST['url5'], $_POST['bansquare6'], $_POST['url6']);
			break;
		//getUserName
		case 'getUserName':
			$user = new user($pdo, 0, $_COOKIE["INREES_ID"]);
			$userName = $user->getName();
			//Transmission du nom
			echo json_encode($userName);
			break;
	}
?>
