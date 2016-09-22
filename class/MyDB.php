<?php

class MyDB
{
	const DB_NAME = 'duxcity_eguide_studcam';
	const DB_HOST = 'localhost';	
	const DB_USER = 'duxcity_ginjah';
	const DB_PASS = '101179Nobis';
	const EMAIL_CONFIG = 'webmaster@guidedesetudes.com';
	const RACINE = '/guide/';
	
	private $serveur;
	private $database;
	private $user;
	private $password;
	private $pdo;
	public $webmaster_email;
	public $url_racine;
	
	public function __construct()
    {
    	$this->serveur = self::DB_HOST;
    	$this->database = self::DB_NAME;
    	$this->user = self::DB_USER;
    	$this->password = self::DB_PASS;
		$this->webmaster_email = self::EMAIL_CONFIG;
		$this->url_racine=$_SERVER['HTTP_HOST'].self::RACINE;
	}
	
	private function getPDO(){
		if($this->pdo===NULL){
	    	$pdo = new PDO('mysql:host='.$this->serveur.';dbname='.$this->database, $this->user, $this->password, array(
           PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	  		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  		$this->pdo=$pdo; 
	  	}
	 	return $this->pdo;
	}
	
	public function query($statement){
	  	$req=$this->getPDO()->query($statement);
		$data=$req->fetchAll(PDO::FETCH_OBJ);
	  	return $data;
	}
	
	public function queryParam($statement, $param){
	  	$req=$this->getPDO()->prepare($statement);
		$req->execute($param);
		$data=$req->fetchAll(PDO::FETCH_OBJ);
	  	return $data;
	}
	
	public function boolQuery($statement, $param){
	  	$insert=true;
		try {
			$req=$this->getPDO()->prepare($statement);
			//$req->exec($statement);
			$req->execute($param);
		} catch (Exception $e) {
			$insert=false;
		}
		return $insert;
	}
	
	public function row($statement){
	  	try {
			//$dblink=
			$req=$this->getPDO();
			$count=$req->exec($statement);
			return $count;
		} catch (Exception $e) {
			return $e;
		}
		
	}
	
	public function genereString($longueur){
		$characts    = 'abcdefghijklmnopqrstuvwxyz';
        //$characts   .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
		$characts   .= '1234567890'; 
		$code_aleatoire      = ''; 
	
		for($i=0;$i < $longueur;$i++)  
		{ 
			$code_aleatoire .= substr($characts,rand()%(strlen($characts)),1); 
		}
		return 	$code_aleatoire;
	}
	
	public function countRow($table){
		$data= $this->query('SELECT * FROM '.$table);
		return count($data); 
	}
	
}
?>