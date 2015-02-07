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
				<form action="ajouterUtilisateur.php" method="POST">
					<div class="form-group">
						<div class="row">
							<label for="" class="col-md-5">ID NFC</label><input type="text" id="idNFC" class="form-control" name="nfc">
						</div>
						<div class="row">
							<label for="" class="col-md-5" >Login</label><input type="text" id="login" name="login" class="form-control">
						</div>
						<div class="row">
							<label for="" class="col-md-3">Nom</label><input type="text" id="nom" name="nom" class="form-control">
						</div>
                                                <div class="row">
							<label for="" class="col-md-3">Prenom</label><input type="text" id="mdp" name="prenom" class="form-control">
						</div>	
						<div class="row">
							<label for="" class="col-md-5">Mot de passe</label><input type="password" id="mdp" name="mdp" class="form-control">
						</div>
						<br>
						<div class="row">
							<button type="submit" name="boutonInscription" class="btn-block btn-primary">Créer un compte</button>
						</div>	
					</div>
				</form>
				<div class="row">
					<button type="submit" class="btn-block btn-default">Déjà inscrit ?</button>
				</div>
			</div>
		</div>
	</body>
</html>