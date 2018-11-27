<?php

$type=$_POST["type"];

error_reporting( E_ALL );
	try{

	 $bdd = new PDO('mysql:host=51.75.16.6;dbname=qoxozv8m_agp',"saiya","tapion") or die('Erreur');
	 	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 	$bdd->exec('SET NAMES UTF8');
	 $req = $bdd->prepare("SELECT agp_training.training_location_id,agp_training_location.location,agp_training_location.custom_location, agp_training.training_type_id,agp_training.info,agp_training.date from agp_training,agp_training_location where agp_training.training_location_id=agp_training_location.id and agp_training.training_type_id='$type';");
	 $response = $req->execute() or die('Erreur lors de execution');

	




	 while ($row = $req->fetch())
	 {
	 	$json[] = $row;
	 	//print_r($row);
	 }

	 $jsonencoded=json_encode($json,JSON_UNESCAPED_UNICODE);

	 echo $jsonencoded;

	 //$decoded = json_decode($jsonencoded[0]->location,true);

	//echo $decoded->location;


	

	$someArray = json_decode($jsonencoded, true);
 	 //print_r($someArray[0]);        // Dump all data of the Array
  //echo $someArray[0][0]["location"]; // Access Array data

   $someObject = json_decode($jsonencoded);
  //print_r($someObject);      // Dump all data of the Object
  //echo $someObject[0]->location;
  //echo $someObject[0]->custom_location;
   // Access Object data
 
   //echo $someObject[0][0]->date; // Access Object data
	//echo $someObject[0][0]->custom_location; // Access Object data



	
	//$obj = json_decode($json);
	//echo json_last_error(); // 4 (JSON_ERROR_SYNTAX)
	//echo json_last_error_msg(); // unexpected charact



	}catch(Exception $e){

		echo 'erreur';
		die('Erreur de SQL'. $e->getMessage());
	}catch(JsonException $e1){
		echo 'erreur de JSON';
	}
?>