<?php
	include'bddconnect.php';
	if(isset($_POST["boutonInscription"]))
    {
       	if((fVerificationIdNfc($_POST["nfc"]))&&(fVerificationLogin($_POST["login"]))&&(fVerificationMdp($_POST["mdp"])))
       	{
       		try
       		{
       			$_SESSION["idNfc"]=$_POST["nfc"];

       			$ajouterUtilisateur=$dbconnexion->prepare("INSERT INTO identifiants (idTag, login, motdepasse) VALUES (:idNfcUtil,:loginUtil,:mdpUtil);");
       			$ajouterUtilisateur->bindValue(':idNfcUtil',$_POST["nfc"],PDO::PARAM_STR);
       			$ajouterUtilisateur->bindValue(':loginUtil',$_POST["login"],PDO::PARAM_STR);
       			$ajouterUtilisateur->bindValue(':mdpUtil',$_POST["mdp"],PDO::PARAM_STR);
       			$ajouterUtilisateur->execute();
       		}
       		catch(PDOException $e)
            {

            }
        }
        else
        {

            header('location:index.php?mess=erreur_inscription'); 
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