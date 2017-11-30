<?php
    session_start();

    if(isset($_GET['id'])){       
            $_SESSION['idArticle'] = htmlspecialchars($_GET['id']);
    }    
    
    if(isset($_SESSION['password']) && isset($_SESSION['login'])){
        require('../../modele/class/ManagerArticle.class.php');
        require('../../controller/admin/php/admin.php');
        
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Editeur de texte</title>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>Editeur de Texte</h1>

    <form method="POST" action="../../controller/admin/php/accueilAdmin.php">
        <textarea name="newArticle">
          <?php

            if(isset($_GET['id'])){
                $article = new Articles();
                $article->one($_GET['id']);
            }
          ?>
        </textarea>
        <input type="submit" value="enregister">
    </form>
    <form method="POST" action="../../controller/admin/php/accueilAdmin.php"> 
        <input type="submit" value="Accueil">
    </form>  
    <script type="text/javascript" src="../../controller/admin/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="../../controller/admin/js/textEditor.js"></script>
  </body>
</html>
<?php
    }
    else {
        echo "vous n'avez pas accès à cette page. seule les personnes autorisé peuvent y accèder.";
    }

?>