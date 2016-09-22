<?php
require('./Autoloader.php');
Autoloader::register();
$configSession = new ConfigSession;
$Mysql = new MyDB;
if(!empty($_POST)){
	
	if(isset($_POST['init_mdp1']))
		$new_mdp = $_POST['init_mdp1'];
		
	if(isset($_POST['id_toInit']))
		$id = $_POST['id_toInit'];
	
	try {
		$user=$Mysql->queryParam('SELECT * FROM tpl_users WHERE id_user=? ', array($id));
		if(!empty($user)){
			$login=$user[0]->user_login;
			if($Mysql->boolQuery('UPDATE tpl_users SET user_pass = ?, user_activation_key=NULL, user_status=1 WHERE id_user = ?', array(sha1($login.$new_mdp), $id))){
				echo 'update ok';
			}
		}
		else{
			echo 'update failed';
		}
	}
	catch (Exception $e) {
		echo $e;
	}
	
}
?>