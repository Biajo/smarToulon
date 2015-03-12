<?php
    require_once 'bddconnect.php';
    session_start();

if(isset( $_SESSION['idTag'] ))
{
    //user already logged
}else{
    if(!isset( $_POST['username'], $_POST['password']))
    {
        die("no username")
    }
    try
    {
        
        $dbconnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $loginRequest = $dbconnexion->prepare("SELECT idTag, login, motdepasse FROM users 
                    WHERE login = :username AND motdepasse = :password");
        $loginRequest->bindParam(':username', $username, PDO::PARAM_STR);
        $loginRequest->bindParam(':password', $password, PDO::PARAM_STR);
        $loginRequest->execute();
        $user_id = $loginRequest->fetchColumn();

        if($user_id == false)
        {
                $message = 'Login Failed';
        }
        else
        {
                $_SESSION['idTag'] = $user_id;
        }


    }
    catch(Exception $e)
    {
    }
    
}