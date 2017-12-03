<!DOCTYPE html>
<html>
  <head>
    <title>administrateur</title>
      <link rel="stylesheet" href="../css/styleSheetConAdmin.css">
  </head>
  <body>
    <?php 
      if(isset($error) && $error == true){
        echo "Login ou mot de passe incorrecte.";
      }
      else{
    ?>
    <form method="POST" action="../../controller/admin/php/accueilAdmin.php">
        <h1>Page d'administration</h1>
      <input type="text" value="" name="pseudo" id="pseudo">
      <input type="password" name="password" id="password">
      <input id="submit" type="submit" value="Connexion">
    </form>
    <?php        
        }
    ?>
  </body>
</html>
