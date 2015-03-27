<?php

try
{
    $dbconnexion=new PDO("mysql:host=***.*.*.*;dbname=*******","***","****");                                      
}

catch(PDOexception $e)
{
    header('location:index.php?mess=echec+de+la+connexion');
    exit;
}
?>
