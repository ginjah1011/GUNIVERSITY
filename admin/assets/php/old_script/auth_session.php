<?php
	require('./assets/php/conf_session.php');
	if(!(isset($_SESSION['logId'])&&isset($_SESSION['user']))){
		header('Location: ./');
		exit();
	}
?>