<?php

require('../connect/db_connect.php');
try
  {
    $Mysql = new Mysql('localhost', 'eguide_studcam', 'ginjah', '101179Nobis');
    $Resulats = $Mysql->TabResSQL('SELECT * FROM con_diplomes');
    foreach ($Resulats as $Valeur)
    {
      echo $Valeur['nom_diplom'];
    }
	echo '</br>DernierId: '.$Mysql->DernierId();
	echo '</br>RetourneNbRequetes: '.$Mysql->RetourneNbRequetes();
  }
  catch (MySQLExeption $e)
  {
    echo $e -> RetourneErreur();
  }

?>