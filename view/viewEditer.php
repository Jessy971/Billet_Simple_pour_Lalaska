<?php
include_once('_head.php');
 ?>
    <h1>Editeur de Texte</h1>

    <form method="POST" action="enregisterArticleController.php">
        <textarea name="newArticle">
          <?php
            if(isset($contenu)){
              foreach ( $contenu as $article) {
              echo $article['contenu'];
              }
            }
          ?>
        </textarea>
        <input type="submit" value="enregister">
    </form>
    <form method="POST" action="../index.php">
        <input type="submit" value="Accueil">
    </form>
    <script type="text/javascript" src="admin/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="admin/js/textEditor.js"></script>
  </body>
</html>
