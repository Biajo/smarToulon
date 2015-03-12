<?php
    if(session_start()==false)
    {
        $_SESSION['idTag']='';
    }
?>
<?php
	include'bddconnect.php';
	if(isset($_POST["boutonInscription"]))
    {
       	if((fVerificationIdNfc($_POST["nfc"]))&&(fVerificationLogin($_POST["login"]))&&(fVerificationMdp($_POST["mdp"])))
       	{
       		try
       		{

       			$ajouterUtilisateur=$dbconnexion->prepare("INSERT INTO utilisateurs (idTag, login, motdepasse,nom,prenom, dateNaissance, genre) VALUES (:idNfcUtil,:loginUtil,:mdpUtil,:nomUtil,:prenomUtil, :datedenaissanceUtil, :sexeUtil);");
       			$ajouterUtilisateur->bindValue(':idNfcUtil',$_POST["nfc"],PDO::PARAM_STR);
       			$ajouterUtilisateur->bindValue(':loginUtil',$_POST["login"],PDO::PARAM_STR);
       			$ajouterUtilisateur->bindValue(':mdpUtil',$_POST["mdp"],PDO::PARAM_STR);
       			/*if(isset($donnees_fb))
       			{
       				$ajouterUtilisateur->bindValue(':nomUtil',$_POST["$donnees_fb->firstName"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->bindValue(':prenomUtil',$_POST["$donnees_fb->lastName"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->bindValue(':datedenaissanceUtil',$_POST["ddn"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->bindValue(':sexeUtil',$_POST["$donnees_fb->gender"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->execute();
       			}*/
       			//else
       			//{
	       			$ajouterUtilisateur->bindValue(':nomUtil',$_POST["nom"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->bindValue(':prenomUtil',$_POST["prenom"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->bindValue(':datedenaissanceUtil',$_POST["ddn"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->bindValue(':sexeUtil',$_POST["sexe"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->execute();
       			//}

       			$_SESSION["idTag"]=$_POST["nfc"];
       		}
       		catch(PDOException $e)
            {
            }
        }
        else
        {

            header('location:index.html?mess=erreur_inscription'); 
        }
    }
    else if(isset($_POST["boutonConnexion"])) {
		if(isset( $_SESSION['idTag'] ))
		{
		    //user already logged
		}else{
		    /*if(!isset( $_POST['login'], $_POST['mdp']))
		    {
		        die("no username")
		    }*/
		    try
		    {

		        $dbconnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        $loginRequest = $dbconnexion->prepare("SELECT idTag, login, motdepasse FROM utilisateurs 
		                    WHERE idTag = :tagUtil AND motdepasse = :password");
		        $loginRequest->bindParam(':tagUtil', $_POST["nfc"], PDO::PARAM_STR);
		        $loginRequest->bindParam(':password', $_POST["mdp"], PDO::PARAM_STR);
		        $loginRequest->execute();
		        $user_id = $loginRequest->fetchColumn();
		        
		        if($user_id == false)
		        {
		                header('location:index.html?mess=erreur_connexion');
		        }
		        else
		        {
		                $_SESSION["idTag"]=$user_id;
		        }
		    }
		    catch(Exception $e)
		    {
		    }  
		}
    }        
?>
<?php
	function fVerificationIdNfc($nfc) 
	{
		$nfcValide="/^[0-9]{5,30}$/";
		return preg_match($nfcValide,$nfc);
	}
	function fVerificationLogin($login)
	{
		$loginValide="/^[a-zA-Z0-9_-]{4,30}$/";
        return preg_match($loginValide,$login);
	}
	function fVerificationMdp($mdp)
	{
		$mdpValide="/^[a-zA-Z0-9?@\.;:!_-]{5,30}$/";
        return preg_match($mdpValide,$mdp);
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <title></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  		<link href="cover.css" rel="stylesheet">
  		<link rel="stylesheet" type="text/css" href="meilleurTemps.css" /> 
    </head>
    <div id="fb-root"></div>
    <body style="margin:8px;">
    	<script>
			(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
        <div class="site-wrapper">
	        <header class="header fixed clearfix navbar navbar-fixed-top">
				<div class="container">
					<div class="row">
						<div class="col-md-4">

							<!-- header-left start -->
							<!-- ================ -->
							<div class="header-left clearfix">

								<!-- logo -->
								<div class="logo smooth-scroll">
									<a href="#banner"><img id="logo" src="images/logo2.png" alt="Worthy"></a>
								</div>

								<!-- name-and-slogan -->
								<div class="site-name-and-slogan smooth-scroll">
									<div class="site-name"><a href="http://smartoulon.fr/">Accueil</a></div>
								</div>

							</div>
							<!-- header-left end -->
						</div>

						</div>
					</div>
			</header>
                <?php
                    
                    if(isset($_GET["idTag"]))
                    {
                        $tag=$_GET["idTag"];
                    }
                    else
                    {
                        $tag=$_SESSION["idTag"];
                    }

                    try 
                    {
                    	//Récupération des infos du profils
				        $infoProfil=$dbconnexion->prepare("SELECT * FROM utilisateurs WHERE idTag= :tagUti;");
				        $infoProfil->bindValue(':tagUti',$tag,PDO::PARAM_STR);
				        $infoProfil->execute();
				        $infoProfil=$infoProfil->fetch();

				        $recordUtilisateur=$dbconnexion->prepare("SELECT * FROM resultats WHERE idTag= :tagUti ORDER BY temps;");
				        $recordUtilisateur->bindValue(':tagUti',$tag,PDO::PARAM_STR);
				        $recordUtilisateur->execute();
				        $recordUtilisateur=$recordUtilisateur->fetch();

				        echo "<div style=\"width:50%;margin:0 auto;margin-top:5%;\">
				        		<h1>Profil</h1>
				        		<div class=\"row\">
				        			<div class=\"col-md-4 col-md-offset-3 text-left\"><h4>Pseudo: </h4></div>
				        			<div class=\"col-md-4 text-left\"><h4>".$infoProfil["login"]."</h4></div>
				        	    </div>
				        		<div class=\"row\">
				        			<div class=\"col-md-4 col-md-offset-3 text-left\"><h4>Id Tag: </h4></div>
				        			<div class=\"col-md-4 text-left\"><h4>".$tag."</h4></div>
				        	    </div>
				        	    <div class=\"row\">
				        			<div class=\"col-md-4 col-md-offset-3 text-left\"><h4>Nom: </h4></div>
				        			<div class=\"col-md-4 text-left\"><h4>".$infoProfil["nom"]."</h4></div>
				        	    </div>
				        	    <div class=\"row\">
				        			<div class=\"col-md-4 col-md-offset-3 text-left\"><h4>Prenom: </h4></div>
				        			<div class=\"col-md-4 text-left\"><h4>".$infoProfil["prenom"]."</h4></div>
				        	    </div>
				        	    <div class=\"row\">
				        			<div class=\"col-md-4 col-md-offset-3 text-left\"><h4>Date de naissance: </h4></div>
				        			<div class=\"col-md-4 text-left\"><h4>".$infoProfil["dateNaissance"]."</h4></div>
				        	    </div>
				        	    <h3>Meilleur temps</h3>
				        	    <table id=\"tabStyle\" summary=\"Meilleur temps\">
							      <thead>
							        <tr>
							          <th scope=\"col\">Num. tag</th>
							          <th scope=\"col\">Temps</th>
							          <th scope=\"col\">Data</th>
							        </tr>
							      </thead>
							      <tbody>
							        <tr>
							          <td>".$recordUtilisateur['idTag']."</td>
							          <td>".$recordUtilisateur['temps']."</td>
							          <td>".$recordUtilisateur['Date']."</td>
							        </tr>
							      </tbody>
							    </table>
				        	  </div>";
                    }
                    catch (PDOexception $e)
                    {

                    }
                ?>
        <div class="fb-share-button" data-href="http://smartoulon.fr/ClassementStade.php" data-layout="button"></div>
        </div>
    </body>
</html>
