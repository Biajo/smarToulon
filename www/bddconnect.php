<?php

try
{
    $dbconnexion=new PDO("mysql:host=127.0.0.1;dbname=smartoulultoulon","root","pigeon83");                                      
}

catch(PDOexception $e)
{
    header('location:index.php?mess=echec+de+la+connexion');
    exit;
}
?>
