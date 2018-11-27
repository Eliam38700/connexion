<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
</head>
<body>
	<form method="POST">
		<label for="user_name">Identifiant: </label><br/>
		<input type="text" id="user_name" name="user_name" placeholder="enter your username" required="required" ><br/>
		<label for="pwd">Mot de passe: </label><br/>
		<input type="password" name="password" id="pwd" placeholder="enter your password" required="required"><br/>
		<input type="submit" name="connexion" value="Se connecter">
	</form>
</body>
</html>