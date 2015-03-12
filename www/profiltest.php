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
       			if(isset($donnees_fb))
       			{
       				$ajouterUtilisateur->bindValue(':nomUtil',$_POST["$donnees_fb->firstName"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->bindValue(':prenomUtil',$_POST["$donnees_fb->lastName"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->bindValue(':datedenaissanceUtil',$_POST["ddn"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->bindValue(':sexeUtil',$_POST["$donnees_fb->gender"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->execute();
       			}
       			else
       			{
	       			$ajouterUtilisateur->bindValue(':nomUtil',$_POST["nom"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->bindValue(':prenomUtil',$_POST["prenom"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->bindValue(':datedenaissanceUtil',$_POST["ddn"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->bindValue(':sexeUtil',$_POST["sexe"],PDO::PARAM_STR);
	       			$ajouterUtilisateur->execute();
       			}

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
    </head>
    <body style="margin:8px;">
        <div class="site-wrapper">
                <?php
                    
                    if(isset($_GET["idTag"]))
                    {
                        $login=$_GET["idTag"];
                    }
                    else
                    {
                        $login=$_SESSION["idTag"];
                    }
                    echo $_SESSION['idTag'];

                    try 
                    {
                    	//Récupération des infos du profils
				        $infoProfil=$dbconnexion->prepare("SELECT * FROM utilisateurs WHERE login= :pseudoUti;");
				        $infoProfil->bindValue(':pseudoUti',$_SESSION['idTag'],PDO::PARAM_STR);
				        $infoProfil->execute();
				        $infoProfil=$infoProfil->fetch();

				        echo "<div style=\"width:50%;margin:0 auto;\">
				        		<div class=\"row\">
				        			<div class=\"col-md-3\">id Tag</div>
				        			<div class=\"col-md-3\">".$infoProfil["idTag"]."</div>
				        	    </div>
				        	    <div class=\"row\">
				        			<div class=\"col-md-3\">Nom</div>
				        			<div class=\"col-md-3\">".$infoProfil["nom"]."</div>
				        	    </div>
				        	    <div class=\"row\">
				        			<div class=\"col-md-3\">Prenom</div>
				        			<div class=\"col-md-3\">".$infoProfil["prenom"]."</div>
				        	    </div>
				        	  </div>";
                    }
                    catch (PDOexception $e)
                    {

                    }
                ?>
        </div>
    </body>
</html>
