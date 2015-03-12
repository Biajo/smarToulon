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
                            <h1>Connexion Standard</h4>
                        </div>
                        <div class="row">
                            <input type="text" id="idNFC" class="form-control" placeholder="ID NFC" name="nfc">
                        </div>
                        <div class="row">
                            <input type="password" id="mdp" name="mdp" class="form-control" placeholder="Mot de passe">
                        </div>
                        <br>
                        <div class="row">
                            <button type="submit" name="boutonConnexion" class="btn-block btn-primary">Connexion</button>
                        </div>  
                    </form>
            </div>
        </div>
    </body>
</html>