<?php

class Trainings{
	
	private $pdo;
		
	public function __construct(){
    	$this->pdo = new MyDB;
	}
	
	public function getAllTrainings(){
		$findTraining = $this->pdo->query('SELECT * FROM con_trainings, con_schools WHERE con_trainings.school_id=con_schools.id_school');	
		if(!empty($findTraining)){
			return $findTraining;
		}
		else
			return NULL;
	}
	
	public function searchTrainings($word){
		$findTraining = $this->pdo->queryParam('SELECT * FROM con_trainings WHERE keywords_training LIKE ? OR keywords_training LIKE ? OR keywords_training LIKE ? OR keywords_training LIKE ? OR nom_training_fr LIKE ? OR nom_training_en LIKE ?', array($word.' %', $word.', %', '%, '.$word.'%', $word, $word, $word));	
		if(!empty($findTraining)){
			return $findTraining;
		}
		else
			return NULL;
	}
}

?>