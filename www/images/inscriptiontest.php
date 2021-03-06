<?php
    session_start();
    global $donnees_fb;
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
  		<title>WebApp</title>
  		<!-- Bootstrap core CSS -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

		<!-- Font Awesome CSS -->
		<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Plugins -->
		<link href="css/animations.css" rel="stylesheet">

		<!-- Worthy core CSS file -->
		<link href="css/style.css" rel="stylesheet">

		<!-- Custom css --> 
		<link href="css/custom.css" rel="stylesheet"> 
  		<link href="cover.css" rel="stylesheet">
	</head>
	<body>
		<div class="site-wrapper">
			<div class="contener" style="width:20%;margin:0 auto;margin-top:5%;">
				<form action="profil.php" method="POST">
					<div class="form-group">
						<div class="row">
							<h4>Inscription standard</h4>
						</div>
						<div class="row">
							<h5>Champs Obligatoires</h4>
						</div>
						<div class="row">
							<input type="text" id="idNFC" class="form-control" placeholder="ID NFC" name="nfc">
						</div>
						<div class="row">
							<input type="text" id="login" name="login" placeholder="Login" class="form-control">
						</div>
						<div class="row">
							<input type="password" id="mdp" name="mdp" class="form-control" placeholder="Mot de passe">
						</div>
						<div class="row">
							<h5>Connexion Via Facebook (Facultatifs)</h4>
						</div>
						<?php include'fbapi.php' ?>

						<div class="row">
							<h5>Champs Facultatifs</h4>
						</div>
						<div class="row">
							<input type="text" id="nom" name="nom" class="form-control" placeholder="Nom">
						</div>
	                    <div class="row">
							<input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prenom">
						</div>
						<div class="row">
							<input type="text" id="datedenaissance" name="ddn" placeholder="Date de naissance" class="form-control">
						</div>
						<div class="row">
							<input type="text" id="sexe" name="sexe" placeholder="Sexe" class="form-control">
						</div>

						<div class="row">
							<button type="submit" name="boutonInscription" class="btn-block btn-primary">Créer un compte</button>
						</div>
					</form>
					<form action="connexion.php" method="POST">
						<div class="row">
							<button type="submit" class="btn-block btn-default" name="boutonConnexion">Déjà inscrit ?</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>