<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 11/05/2017
     * Time: 14:31
     */
    include ('../config.php');
    $manager = new UserManager();
    $auteur = $manager->getUserById(1);

    
    
    include (VIEW.'header.php');
    if (isset($_POST['envoyer']))
    {
        if (!empty($_POST['mail']) && !empty($_POST['message']))
        {
            
            
            if ( ) {
                include (VIEW . 'confirmation_mail.php');
            }
        }
    } else {
        include (VIEW.'contact.php');
    }
    
    include (VIEW.'footer.php');