<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 21/04/2017
     * Time: 11:33
     */
    
    include('../config.php');
    $UserManager = new UserManager();
    if (isset($_GET['id']))
    {
        $user = $UserManager->getUserById($_GET['id']);
    }
    
    include(VIEW . 'header.php');
    include(VIEW . 'confirmation_inscription.php');
    include(VIEW. 'footer.php');