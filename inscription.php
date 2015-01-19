<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
  		<title>WebApp</title>
	</head>
	<body>
		<div class="contener">
			<div class="header">
				<a href="">Classement Stade</a>
				<a href="">Classement Personnel</a>
				<a href=""></a>
				<div class="connexion">
					
				</div>
			</div>
			<div class="mainContener">
				<form action="ajouterUtilisateur.php" method="POST">
					<label for="">ID NFC</label><input type="text" id="idNFC" name="nfc">
					<label for="">Login</label><input type="text" id="login" name="login">
					<label for="">Mot de passe</label><input type="text" id="mdp" name="mdp">
					<button type="submit" name="boutonInscription">Envoyer</button>
				</form>
			</div>
		</div>
	</body>
</html>