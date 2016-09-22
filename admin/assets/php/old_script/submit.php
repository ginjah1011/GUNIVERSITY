<?php
require('../../../connect/db_class.php');

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
	$key_activation = md5(microtime(TRUE)*100000);
	
	$registered=date("Y-m-d H:i:s");
	// Insertion des données dans la base 
	try
	{
		//$Mysql = new Mysql('localhost', 'base', 'login', 'password');
		$Mysql = new Mysql();
		
		
		//TEST SI L'IDENTIFIANT EXISTE DEJA
		$existingLogin = $Mysql->query('SELECT * FROM tpl_users WHERE user_login="'.$identifiant.'"');
		$existingEmail = $Mysql->query('SELECT * FROM tpl_users WHERE user_email="'.$email.'"');
		if(!empty($existingLogin)){//IDENTIFIANT EXISTE DEJA
			echo 'Cet identifiant existe déjà<br/>';
			
		}
		else if(!empty($existingEmail)){//EMAIL EXISTE DEJA
			echo 'Cet email existe déjà<br/>';
		}
		else{//IDENTIFIANT N'EXISTE PAS ENCORE
			//PREPARATION DU MAIL DE L'ACTIVATION
			$sujet = "Validation de compte" ;
			$entete = "From: ".$webmaster_email ;
			 
			// Le lien d'activation est composé du login(log) et de la clé(cle)
			$message = utf8_decode("Félicitations,\r\n \r\nLa création de votre compte administrateur du Guide des Etudes Supérieur au Cameroun s'est bien déroulé.\r\nPour l'activer, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur internet afin de confirmer votre adresse email. \r\n".$mon_siteUrl."admin/?log=".urlencode($identifiant)."&cle=".urlencode($key_activation)."\n \n \n---------------\n \nCeci est un mail automatique, Merci de ne pas y répondre.");
			 
			//ENVOI DU MAIL
			//if(mail("$email", "$sujet", "$message", "$entete")){//MAIL ENVOYE!!!
			if(true){//MAIL ENVOYE!!!
				//INSERTION DES DONNEES DANS LA BDD
				if($Mysql->ExecuteSQL('INSERT INTO '.$ma_bdd.'.tpl_users (id_user, user_login, user_pass, user_name, user_email, user_registered, user_status, user_activation_key) VALUES (NULL, "'.$identifiant.'", "'.md5($identifiant.$mdp1).'", "'.$cname.'", "'.$email.'",  CURRENT_TIMESTAMP, 0, "'.$key_activation.'")')>0){
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