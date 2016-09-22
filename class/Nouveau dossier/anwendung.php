<?php
  /**
  * Utilisation de la classe
  */
  try
  {
    $Mysql = new Mysql('localhost', 'base', 'login', 'password');
    $Resulats = $Mysql->TabResSQL('SELECT Champ1,Champ2 FROM table');
    foreach ($Resulats as $Valeur)
    {
      echo $Valeur['Champ1'];
      echo $Valeur['Champ2'];
    }
  }
  catch (MySQLExeption $e)
  {
    echo $e -> RetourneErreur();
  }
?>