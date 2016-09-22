<?php
require('../../../connect/db_config.php');
require('../../../connect/db_connect.php');

if(isset($_GET['log'])){
	$log = $_GET['log'];
}	
if(isset($_GET['cle'])){
	$cle = $_GET['cle'];
}		
try{
	//$Mysql = new Mysql('localhost', 'base', 'login', 'password');
	$Mysql = new Mysql($mon_serveur, $ma_bdd, $mon_identifiant_db, $mon_password);
	
	//TEST SI L'IDENTIFIANT EXISTE DEJA
	$findUser = $Mysql->TabResSQL('SELECT * FROM tpl_users WHERE user_login="'.$log.'" AND user_activation_key="'.$cle.'"');
	if(!empty($findUser)){//UTILISATEUR TROUVE
		
		foreach ($findUser as $Valeur)
		{
		  $userId=$Valeur['id_user'];
		  
		}
		
		if($Mysql->ExecuteSQL('UPDATE tpl_users SET user_status = 1, user_activation_key =NULL WHERE id_user='.$userId)==1){
			?><p class="bigger-110">Votre adresse email a été validée. Vous pouvez vous connecter.</p><?php
		}
		else{
			echo 'ECHEC ACTIVATION';
		}
	}
}
catch (MySQLExeption $e){
	echo $e -> RetourneErreur();
}	


?>