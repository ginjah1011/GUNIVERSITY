<?php
	class ConfigSession{
		public function __construct(){
			session_set_cookie_params(3600);//durée de vies des sessions 15 min
			session_start();
		}	
	}
	
?>