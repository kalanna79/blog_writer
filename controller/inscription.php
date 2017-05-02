<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 14/04/2017
     * Time: 08:29
     */
    
    include('../config.php');
    
    $manager = new UserManager();
    
    //ajout d'un nouvel utilisateur (form Inscription)
    
    if (isset($_POST['inscription']) && isset($_POST['pseudo']))
    {
     
        // Créer une mthode dans user pour faire tout ça 
        // ex $user->bindWithValues($_POST);
        
        $user = new User(['firstname' => $_POST['firstname'],
                         'name' => $_POST['name'],
                         'pseudo' => $_POST['pseudo'],
                         'email' => $_POST['email'],
                         'password' => $_POST['password']]);
        $manager->addUser($user);
        header('Location:'.HOST.'confirmation_inscription.php?id='.$user->getIdUser());
    }
    
    //connexion d'un utilisateur déjà existant
    if (isset($_POST['connect']))
    {
        $manager->verifUser(); // ça sert à quoi cette method ? elle retourne quoi ? Tu fais rien en retour ?
        // je dois voir ici ce qui se passe si user est ok ou pas
        if (isset($_GET['id']))
        {
            $user = $UserManager->getUserById($_GET['id']);
        }
        header('Location:'.HOST.'profil_user.php?id='.$_SESSION['id']);
    }
    
    include (VIEW.'header.php');
    include (VIEW.'inscription.php');
    include (VIEW.'footer.php');
