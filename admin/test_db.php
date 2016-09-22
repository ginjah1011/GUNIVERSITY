<?php
require('../connect/db_class.php');
echo ('ok<br/>');
$db=new MyDB();

if($db->row('INSERT INTO tpl_users (id_user, user_login, user_pass, user_name, user_email, user_registered, user_status, user_activation_key) VALUES (?, ?, ?, ?, ?,  CURRENT_TIMESTAMP, ?, ?)', array(NULL, "aka", md5("Manu"."111111"), "Njeck Maha", "ginjahn@gmail.com", NULL, NULL)))
	echo 'Insertion ok';
else
	echo 'echec';
//var_dump($res);


?>