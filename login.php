<?php 
require "conn.php";
$username = $_POST['user_name'];
$user_pass = $_POST["password"];

$req = $bdd->prepare("select * from employee_data where username like '$username' and password like '$user_pass' ");
 $response = $req->execute() or die('Erreur lors de execution');
 
  while ($row = $req->fetchALL()) {
	  
	  if($row>0){
	 	echo "ok";
	  }else{
		  echo "login failed !!!";
	  }


	  
}



 
?>