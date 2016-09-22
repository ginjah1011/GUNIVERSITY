<?php
	class Authentified{
		public $user;
		public $userID;
		
		public function __construct(){
			if(!(isset($_SESSION['logId'])&&isset($_SESSION['user']))){
				header('Location: ./');
				exit();
			}
			else{
				$this->user=$_SESSION['user'];
				$this->userID=$_SESSION['logId'];
			}
		}	
	}
?>