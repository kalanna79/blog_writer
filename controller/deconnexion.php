<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 19/05/2017
     * Time: 13:32
     */
    
    session_unset();
    session_destroy();
    
    $manager = new ChapterManager();
    $chapters = $manager->Tab_matieres();
    
    $mess = setFlash("A bientôt !", "Vous êtes maintenant déconnecté", "success");
    header('refresh: 2; connexion');
    
    
    include(VIEW . 'header.php');
    include(VIEW . 'inscription.php');
    include(VIEW. 'footer.php');