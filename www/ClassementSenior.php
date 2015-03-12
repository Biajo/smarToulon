<?php
  include'bddconnect.php';  
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>WebApp</title>
    <link rel="stylesheet" type="text/css" href="TabClassement.css" /> 
	</head>
	<body>
    <h1>Classement Senior (entre 18 et 60 ans)<h1/>
    <table id="tabStyle" summary="Classement Senior">
      <thead>
        <tr>
          <th scope="col">Classement</th>
          <th scope="col">Num. tag</th>
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">Temps</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $reponse = $dbconnexion->query("SELECT r.idTag, r.temps, u.nom, u.prenom 
                                        FROM resultats r, utilisateurs u
                                        WHERE r.idTag = u.idTag
                                        AND YEAR(u.dateNaissance) < '1997'
                                        AND YEAR(u.dateNaissance) >= '1955'
                                        ORDER BY temps
                                      ");

        $i = 1;
        while($donnees = $reponse->fetch())
        {
        ?>

        <tr>
          <td><?php echo $i?></td>
          <td><?php echo $donnees['idTag']?></td>
          <td><?php echo $donnees['nom']?></td>
          <td><?php echo $donnees['prenom']?></td>
          <td><?php echo $donnees['temps']?></td>
        </tr>
        <?php
          $i++;
        }
        ?>
      </tbody>
    </table>
    <?php 
      $reponse->closeCursor();
    ?>
	</body>
</html>

