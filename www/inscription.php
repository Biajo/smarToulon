<?php
    session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
  		<title>WebApp</title>
  		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  		<link href="cover.css" rel="stylesheet">
	</head>
	<body>

		<div class="site-wrapper">
			<div class="contener" style="width:20%;margin:0 auto;margin-top:5%;">
				<form action="profil.php" method="POST">
					<div class="form-group">
						<div class="row">
							<h1>Inscription standard</h1>
						</div>
						<div class="row">
							<h3>Champs Obligatoires</h3>
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
							<h3>Connexion Via Facebook (Facultatif)</h3>

						</div>
						<?php include'fbapi.php' ?>
						<div class="row">
							<h3>Champs Facultatifs</h3>
						</div>
    <?php
    if(isset($_SESSION['user_data'])){
    	$user_data = json_decode($_SESSION['user_data']);
    	 echo '<div class="row">';
		echo '					<input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" value="'. $user_data->lastName.'">';
		echo '				</div>';
	      echo '              <div class="row">';
			echo '				<input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prenom"  value="'. $user_data->firstName.'">';
				echo '		</div>';
					echo '	<div class="row">';
					$datedenaissance = $user_data->birthYear . "-" . $user_data->birthMonth . "-" . $user_data->birthDay;
						echo '	<input type="text" id="datedenaissance" name="ddn" placeholder="Date de naissance" class="form-control" value="'. $datedenaissance.'">';
						echo '</div>';
						echo '<div class="row">';
							echo '<input type="text" id="sexe" name="sexe" placeholder="Sexe" class="form-control" value="'. $user_data->gender.'">';
						echo '</div>';
						unset($_SESSION['user_data']);

						
    }else{
    	 echo '<div class="row">';
		echo '					<input type="text" id="nom" name="nom" class="form-control" placeholder="Nom">';
		echo '				</div>';
	      echo '              <div class="row">';
			echo '				<input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prenom">';
				echo '		</div>';
					echo '	<div class="row">';
						echo '	<input type="text" id="datedenaissance" name="ddn" placeholder="Date de naissance" class="form-control">';
						echo '</div>';
						echo '<div class="row">';
							echo '<input type="text" id="sexe" name="sexe" placeholder="Sexe" class="form-control">';
						echo '</div>';
    }

    ?><div class="row">
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