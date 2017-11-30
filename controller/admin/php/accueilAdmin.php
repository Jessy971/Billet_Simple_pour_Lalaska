<?php
    session_start();
    
   

    if(isset($_POST['password']) && isset($_POST['pseudo'])){
        
        $pwd = htmlspecialchars($_POST['password']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $_SESSION['password'] = $pwd;
        $_SESSION['login'] = $pseudo;    
    
        if($pwd === 'admin' && $pseudo === 'admin'){
          require('../../../view/admin/accueil.php');
           /* echo'<pre style="color:white;">';
            print_r($_COOKIE);
            echo'<pre>';*/

        } 

    }
    elseif(isset($_COOKIE['authentifier'])){
        require('../../../view/admin/accueil.php');
        /*echo'<pre style="color:white;">';
        print_r($_COOKIE);
        echo'<pre>';*/
    }
    else{
        $error = true;
        require('../../../view/admin/index.php');
    }   
 ?>
