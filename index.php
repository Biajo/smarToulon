<?php
	session_start();
	if (!isset($_SESSION['count'])) {
	  $_SESSION['count'] = 0;
	} else {
	  $_SESSION['count']++;
	}
?>
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
					<a href="inscription.php">Inscription</a>
				</div>
			</div>
			<div class="mainContener">
				
			</div>
		</div>
	</body>
</html>