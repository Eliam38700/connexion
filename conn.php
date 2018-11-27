<?php 

try
{
 $bdd = new PDO('mysql:host=127.0.0.1;dbname=employe',"newuser","Toto1234");
 $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
}
catch(Exception $e)
{
	echo "Impossible de se connecter à la bdd ! <br/>";
	echo $e->getMessage() . "<br/>";
	var_dump($e);
	exit();
}
