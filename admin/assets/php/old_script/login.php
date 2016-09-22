<?php
require('../../../class/Autoloader.php');
Autoloader::register();
$configSession = new ConfigSession;

if(!empty($_POST)){
	
	if(isset($_POST['identifiant']))
		$identifiant = $_POST['identifiant'];
	
	if(isset($_POST['mdp']))
		$mdp = $_POST['mdp'];
	
	$logtime=date("Y-m-d H:i:s");
	// Insertion des données dans la base 
	try
	{
		//$Mysql = new Mysql('localhost', 'base', 'login', 'password');
		//$Mysql = new Mysql($mon_serveur, $ma_bdd, $mon_identifiant_db, $mon_password);
		$Mysql=new DB_Class();
		
		//TEST SI L'IDENTIFIANT EXISTE DEJA
		//$logReq = $Mysql->TabResSQL('SELECT * FROM tpl_users WHERE user_login="'.$identifiant.'" AND user_pass="'.md5($identifiant.$mdp).'"');
		$logReq = $Mysql->queryParam('SELECT * FROM tpl_users WHERE user_login=? AND user_pass=?', array($identifiant, md5($identifiant.$mdp)));
		
		//die(var_dump(sizeof($logReq)));
		if(!empty($logReq)){//CONNEXION REUSSIE
			
			if($logReq['0']->user_status=='0')
			  	echo 'Compte inactif';
			else{
				echo 'Connexion reussie';
				$_SESSION['logId']=$logReq['0']->id_user;
			  	$_SESSION['user']=$logReq['0']->user_login;
			}
		}
		else{//ECHEC DE CONNEXION
			echo 'Identifiant ou mot de passe incorret. Veuillez réessayer<br/>';
		}
	}
	catch (MySQLExeption $e){
		echo $e -> RetourneErreur();
	}	
}

?>