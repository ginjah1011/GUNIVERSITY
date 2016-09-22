<?php
require('./Autoloader.php');
Autoloader::register();
$configSession = new ConfigSession;
$Mysql = new MyDB;
if(!empty($_POST)){
	
	if(isset($_POST['email']))
		$email = $_POST['email'];
	
	try {
		$existingEmail = $Mysql->queryParam('SELECT * FROM tpl_users WHERE user_email=?', array($email));	

		if(empty($existingEmail)){//COMPTE N'EXISTE PAS
			echo 'email not found';
		}
		else{//COMPTE EXISTE
			// Génération aléatoire d'une clé
			
			$key_activation = $Mysql->genereString(10);
			$identifiant = $existingEmail[0]->user_login;
			//die(var_dump($existingEmail));
			$id = $existingEmail[0]->id_user;
			$oldKey=$existingEmail[0]->user_activation_key;
			
			//Preparation de l'envoi du mail
			$sujet = utf8_decode("Réinitialisation de compte") ;
			$entete = "From: ".$Mysql->webmaster_email;
			$message = utf8_decode("Bonjour,\r\n \r\nVotre mot de passe est sur point d'être réinitialiser.\r\nVeuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur internet afin de configurer votre nouveau mot de passe. \r\nhttp://".$Mysql->url_racine."admin/?initKey=".sha1($id.$identifiant)."\n \n \n---------------\n \nCeci est un mail automatique, Merci de ne pas y répondre.");
			
			if(mail("$email", "$sujet", "$message", "$entete")){//MAIL ENVOYE!!!
				if($oldKey!=sha1($id.$identifiant)){
					if($Mysql->row('UPDATE tpl_users SET user_activation_key = "'.sha1($id.$identifiant).'" WHERE user_login = "'.$identifiant.'" AND id_user = '.$id)==1){
						echo 'envoi ok';
					}
				}
			}
		}
	}
	catch (Exception $e) {
		echo 'Echec!';
	}
	
}
?>