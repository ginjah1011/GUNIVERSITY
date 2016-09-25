<?php
require('./Autoloader.php');
Autoloader::register();
$configSession = new ConfigSession;
//$Mysql = new MyDB;
$training = new Trainings;
if(!empty($_POST)){
	
	if(isset($_POST['keyword'])){
		$keyword = $_POST['keyword'];
	}
	if(isset($_POST['langue'])){
		$langue = $_POST['langue'];
	}
		
	try {
		$findTraining = $training->searchTrainings($keyword);	
		$found=array();
		//$i=0;
		if(!empty($findTraining)){
			echo (count($findTraining).' '.(($langue=='en') ? 'training(s) found for: ' : 'offre(s) de formation trouvées pour: ').$keyword.' <a class="" href="../'.$langue.'/result.php?keyword='.$keyword.'">'.(($langue=='en')?'(Show the list)':'(Afficher la liste)').'</a>');
			foreach($findTraining as $valeur){
				array_push($found, $valeur->id_training);
			}
		}
		else{
			echo ((($langue=='en') ? 'No trainings found for: ' : 'Aucune formation trouvées pour: ').$keyword);
		}
			
	}
	catch (Exception $e) {
		echo 'Echec!';
	}

}
?>