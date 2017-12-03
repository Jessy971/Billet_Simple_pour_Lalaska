<?php
    session_start();
    $_SESSION =[];
    
    setcookie('authentifier',"",time()+1, null, null, false, true);
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page de déconnexion</title>
        <link rel="stylesheet" href="../css/styleSheetLogout.css">
    </head>
    <body>
        <section>
            <h1>Déconnecté</h1>
            <p>Vous avez été déconnecté avec succès.</p>
            <a href="../blog/index.php"><button id="pAccueilBtn">Page d'accueil</button></a>
        </section>
    </body>
</html>