<?php
    require('../../../modele/class/ManagerArticle.class.php');
    require('admin.php');


    if(isset($_GET['id'])){

        $supprimer = new Articles();
        $supprimer->supprimer($_GET['id']);

        echo "<p>article supprimer</p>";

    }

    echo '<a href="../../../controller/admin/php/accueilAdmin.php"><button>retour</button></a>';


 ?>
