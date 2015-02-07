<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
  		<title>WebApp</title>
  		<link rel="stylesheet" href="worthy_v.1.0/bootstrap/css/bootstrap.min.css">
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
			<div style="width:20%;margin:0 auto;">
				<form action="" method="POST">
					<div class="form-group">
						<div class="row">
							<h4>Inscription rapide</h4>
						</div>
						<div class="row">
							<button type="submit" class="btn-block btn-primary">Inscription Facebook</button>
						</div>
					</div>
				</form>
				<form action="ajouterUtilisateur.php" method="POST">
					<div class="form-group">
						<div class="row">
							<h4>Inscription standart</h4>
						</div>
						<div class="row">
							<input type="text" id="idNFC" class="form-control" placeholder="ID NFC" name="nfc">
						</div>
						<div class="row">
							<input type="text" id="login" name="login" placeholder="Login" class="form-control">
						</div>
						<div class="row">
							<input type="text" id="nom" name="nom" class="form-control" placeholder="Nom">
						</div>
                        <div class="row">
							<input type="text" id="mdp" name="prenom" class="form-control" placeholder="Prenom">
						</div>	
						<div class="row">
							<input type="password" id="mdp" name="mdp" class="form-control" placeholder="Mot de passe">
						</div>
						<br>
						<div class="row">
							<button type="submit" name="boutonInscription" class="btn-block btn-primary">Créer un compte</button>
						</div>	
						<div class="row">
							<button type="submit" class="btn-block btn-default" name="boutonConnexion">Déjà inscrit ?</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>