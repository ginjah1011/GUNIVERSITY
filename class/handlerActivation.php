<?php
require('./Autoloader.php');
Autoloader::register();
$Mysql = new MyDB;

if(isset($_GET['log'])){
	$log = $_GET['log'];
}	
if(isset($_GET['cle'])){
	$cle = sha1($_GET['cle']);
	
}

try{
	
	//TEST SI L'IDENTIFIANT EXISTE DEJA
	$findUser = $Mysql->queryParam('SELECT * FROM tpl_users WHERE hash_login= ? AND user_activation_key=?', array($log, $cle));
	
	if(!empty($findUser)){//UTILISATEUR TROUVE
		
		if($Mysql->boolQuery('UPDATE tpl_users SET user_status = 1, user_activation_key = NULL, hash_login=NULL WHERE id_user= ?', array($findUser[0]->id_user))){
			?><p class="bigger-110">Votre adresse email a été validée. Vous pouvez vous connecter.</p><?php
		}
		else{
			echo 'ECHEC ACTIVATION';
		}
	}
	else{
		echo 'Veuillez vous assurer que vous avez bien copié le lien d\'activation ou cliquez directement dessus.';
	}
}
catch (Exception $e){
	echo 'La requête n\'a pas pu être effcetuée.';
}	


?>