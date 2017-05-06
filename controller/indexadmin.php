<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 05/05/2017
     * Time: 11:11
     */
    include('../config.php');
    
    $sess = new Session();
    $manager = new UserManager();
    $users = $manager->AllUsers();
    
    $comanager = new CommentManager();
    $comments = $comanager->showAllComments();
    $lastcomments = $comanager->showLastComments();
    
    
    include(ROOT . 'view/header.php');
    include(VIEW . 'indexadmin.php');
    include(VIEW . 'footer.php');