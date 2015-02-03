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
			<div style="width:50%;margin:0 auto;">
				<form action="ajouterUtilisateur.php" method="POST">
					<div class="form-group">
						<div class="row">
							<label for="" class="col-md-3">ID NFC</label><input type="text" id="idNFC" class="form-control" name="nfc">
						</div>
						<div class="row">
							<label for="" class="col-md-3" >Login</label><input type="text" id="login" name="login" class="form-control">
						</div>	
						<div class="row">
							<label for="" class="col-md-3">Mot de passe</label><input type="password" id="mdp" name="mdp" class="form-control">
						</div>	
						<div class="row">
							<button type="submit" name="boutonInscription" class="btn btn-default">Envoyer</button>
						</div>	
					</div>
				</form>
			</div>
		</div>
	</body>
</html>