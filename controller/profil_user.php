<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 21/04/2017
     * Time: 12:03
     */
    include('../config.php');
    
    $sess = new Session();
    $manager = new UserManager();
    $user = $manager->getUserById($_SESSION['id']);
    
    
    include(ROOT . 'view/header.php');
    include(VIEW . 'profil_user.php');
    include(VIEW . 'footer.php');
