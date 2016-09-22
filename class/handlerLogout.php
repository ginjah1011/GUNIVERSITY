<?php
require('./Autoloader.php');
Autoloader::register();
$configSession = new ConfigSession;
//$Mysql = new MyDB;
session_destroy();
header('location: ../admin');
exit;


?>