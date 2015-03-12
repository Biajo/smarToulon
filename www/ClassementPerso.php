<?php
  include'bddconnect.php';   
  include 'graph.php';
?>

<html>
  <head>
    <meta charset="utf-8">  
    <title>WebApp</title>
    <link rel="stylesheet" type="text/css" href="TabClassement.css" /> 
  </head>
  <body>
    <h1>Votre classement personnel (400 m)<h1/>
    <table id="tabStyle" summary="Classement personnel">
      <thead>
        <tr>
          <th scope="col">Classement</th>
          <!-- <th scope="col"><?php echo $idTag?></th> -->
          <th scope="col">Num. tag</th>
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">Temps</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $recupidTag = $dbconnexion->query('SELECT u.idTag
                                          FROM utilisateurs u
                                          /*WHERE u.login = login*/
                                          WHERE u.login = "gcourvite"
                                          ');

        $idTagArray = $recupidTag->fetch();
        $idTag = $idTagArray['idTag'];
        //$idTag = $_SESSION["idTag"];


        $reponse = $dbconnexion->query("SELECT r.idTag, r.temps, u.nom, u.prenom 
                                        FROM resultats r, utilisateurs u
                                        WHERE r.idTag = u.idTag
                                        AND u.idTag = '$idTag'
                                        /*AND YEAR(r.Date) = YEAR(NOW())*/
                                        ORDER BY temps
                                      ");

        $i = 1;
        while($donnees = $reponse->fetch())
        {
        ?>
        <tr>
          <td><?php echo $i?></td>
          <td><?php echo $idTag?></td>
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
    <br/>
    <div>
      <image src="pChart/img/example.drawBarChart.spacing.png">
    <div/>
  </body>
</html>

