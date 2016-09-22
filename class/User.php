<?php

class User{
	
	public $id;
	public $login;
	public $hashlogin;
	private $pass;
	public $name;
	private $pdo;
	
	
	public function __construct($id=NULL, $login=NULL, $hashlogin=NULL, $name=NULL)
    {
    	$this->id=$id;
		$this->login=$login;
		$this->hashlogin=$hashlogin;
		$this->name=$name;
		$this->pdo = new MyDB;
	}
	
	public function getUser($id){
		$user=$this->pdo->queryParam('SELECT * FROM tpl_users WHERE id_user=?', array($id));
		return $user;
	}
	
	public function getUserName($id){
		
		$user=$this->pdo->queryParam('SELECT * FROM tpl_users WHERE id_user=?', array($id));
		if(!empty($user)){
			return $user[0]->user_name;
		}
		else
			return NULL;
		
	}
	
	
}

?>