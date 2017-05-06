<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 21/04/2017
     * Time: 12:03
     */
    include('../config.php');
    
    
    
    $manager = new UserManager();
    $user = $manager->getUserById($_SESSION['id']);
    
    $sess = new Session();
    $_SESSION['id'] = $user->getIdUser();
    $_SESSION['pseudo'] = $sess->getPseudo();
    
    $users = $manager->AllUsers();
    
    $comanager = new CommentManager();
    $comments = $comanager->showAllComments();
    $lastcomments = $comanager->showLastComments();
    
    
    include(ROOT . 'view/header.php');
    
    if ($_SESSION['id'] == 1) {
        include(VIEW . 'indexadmin.php');
    } else {
        include(VIEW . 'profil_user.php');
    }
    include(VIEW . 'footer.php');
