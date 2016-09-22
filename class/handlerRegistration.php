<?php
require('./Autoloader.php');
Autoloader::register();
$Mysql = new MyDB;

if(!empty($_POST)){
	
	if(isset($_POST['cname']))
		$cname = $_POST['cname'];
	//$email = $_POST['email'];
	if(isset($_POST['email_reg']))
		$email = $_POST['email_reg'];
	//$identifiant = $_POST['login'];
	if(isset($_POST['login_reg']))
		$identifiant = $_POST['login_reg'];
	//$mdp1 = $_POST['mdp1'];
	if(isset($_POST['mdp1']))
		$mdp1 = $_POST['mdp1'];
	//$mdp2 = $_POST['mdp2'];
	if(isset($_POST['mdp2']))
		$mdp2 = $_POST['mdp2'];
		
	// Génération aléatoire d'une clé
	$key_activation = $Mysql->genereString(10);
	
	// Insertion des données dans la base 
	try
	{
		//TEST SI L'IDENTIFIANT EXISTE DEJA
		$existingLogin = $Mysql->queryParam('SELECT * FROM tpl_users WHERE user_login=?',array($identifiant));
		$existingEmail = $Mysql->queryParam('SELECT * FROM tpl_users WHERE user_email=?', array($email));
		if(!empty($existingLogin)){//IDENTIFIANT EXISTE DEJA
			echo 'Cet identifiant existe déjà<br/>';
			
		}
		else if(!empty($existingEmail)){//EMAIL EXISTE DEJA
			echo 'Cet email existe déjà<br/>';
		}
		else{//IDENTIFIANT N'EXISTE PAS ENCORE
			//PREPARATION DU MAIL DE L'ACTIVATION
			$sujet = "Validation de compte" ;
			$entete = "From: ".$Mysql->webmaster_email;
			//die($Mysql->url_racine);
			// Le lien d'activation est composé du login(log) et de la clé(cle)
			$message = utf8_decode("Félicitations,\r\n \r\nLa création de votre compte administrateur du Guide des Etudes Supérieur au Cameroun s'est bien déroulée.\r\nPour l'activer, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur internet afin de confirmer votre adresse email. \r\nhttp://".$Mysql->url_racine."admin/?log=".urlencode(sha1($identifiant))."&cle=".urlencode($key_activation)."\n \n \n---------------\n \nCeci est un mail automatique, Merci de ne pas y répondre.");
			 
			//ENVOI DU MAIL
			//if(mail("$email", "$sujet", "$message", "$entete")){//MAIL ENVOYE!!!
			if(mail("$email", "$sujet", "$message", "$entete")){//MAIL ENVOYE!!!
				//INSERTION DES DONNEES DANS LA BDD
				if($Mysql->boolQuery('INSERT INTO tpl_users (id_user, user_login, hash_login, user_pass, user_name, user_email, user_registered, user_status, user_activation_key) VALUES (NULL, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, 0, ?)', array($identifiant, sha1($identifiant), sha1($identifiant.$mdp1), $cname, $email, sha1($key_activation)))){
				//INSERTION DES DONNEES A REUSSI
					?><p class="bigger-110">Nouvel utilisateur enregistré. veuillez consulter vos emails pour validation. Si le mail de validation n'est pas visible dans la boite de reception, consultez les spams.</p><?php
				}
				else{
					//ECHEC DE L'INSERTION
					?><p class="bigger-110">Echec de l'enregistrement!!</p><?php
				}
			} 
			else{//ECHEC DE L'ENVOI DE MAIL
				?><p class="bigger-110">Erreur! L'adresse email entrée n'existe pas.</p><?php	
			}
		}
	}
	catch (MySQLExeption $e){
		echo $e -> RetourneErreur();
	}	
}

?>