<?php

class Menu{
	
	public $id_menu;
	public $text_menu;
	public $class_menu;
	private $url_menu;
	public $category_menu;
	
	
	public function __construct()
    {
    	
	}
	
	public function initUserBox($id){
		$user=$Mysql->queryParam('SELECT * FROM tpl_users WHERE id_user=?', array($id));
		return $user;
	}
	
	public function getUserName($id){
		$Mysql = new MyDB;
		$user=$Mysql->queryParam('SELECT * FROM tpl_users WHERE id_user=?', array($id));
		if(!empty($user)){
			return $user[0]->user_name;
		}
		else
			return NULL;
		
	}
}

?>