<?php 
session_start();

$errors = [];

if( isset($_POST['connexion']) )
{
	// cette instruction te fait ceci => $user_name = $_POST['user_name']; $password = $_POST["password"];
	extract($_POST);

	if ( empty($user_name) )
	{
		$errors['id'] = "Veuillez renseigner l'identifiant";
	}

	if ( empty($password) )
	{
		$errors['pwd'] = "Veuillez renseigner le mot de passe";
	}

	if( empty($errors) ) 
	{
		require "conn.php";
		$req=$bdd->prepare("select password from employee_data where username=:username");
		$response= $req->execute( array(':username'=>$user_name) ) or die('Erreur with SQL');
		
		while($row = $req->fetch())
		{
			echo $row->password;
		}
		
		$req = $bdd->prepare("select * from employee_data where username=:username and password=:user_pass ");
		$response = $req->execute( array(':username'=>$user_name, ':user_pass'=>$password) ) or die('Erreur lors de execution');
		 
		while ($row = $req->fetch()) {
			  
			if($row>0)
			{
				$_SESSION['username'] = $user_name;
			 	echo "ok";
				// Redirection vers la page de profile
				header("Location: profil.php");
			}
			else
			{
				echo "login failed !!!";
			}
			  
		}
	}
}
require "login.view.php";



 
?>