<?php
require('./Autoloader.php');
Autoloader::register();
$configSession = new ConfigSession;
$Mysql = new MyDB;

if(isset($_GET['initKey']))//hash_login
	$key = $_GET['initKey'];

try {
	$exist = $Mysql->queryParam('SELECT * FROM tpl_users WHERE user_activation_key=?', array($key));	
	//die(var_dump($exist));
	if(empty($exist)){//COMPTE N'EXISTE PAS
		echo 0;
	}
	else{//COMPTE EXISTE
		echo $exist[0]->id_user;
	}
}
catch (Exception $e) {
	echo 'Echec!';
}
	

?>