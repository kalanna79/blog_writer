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
        $hpwd = sha1($_POST['password']);
     
        // Créer une mthode dans user pour faire tout ça 
        // ex $user->bindWithValues($_POST);
        
        $user = new User(['firstname' => $_POST['firstname'],
                         'name' => $_POST['name'],
                         'pseudo' => $_POST['pseudo'],
                         'email' => $_POST['email'],
                         'password' => $hpwd]);
   if ($manager->verifAdd()) {
       echo '<div class="panel" id="alert">Ce pseudo ou cet email sont déjà utilisés</div>';
   } else {
       $manager->addUser($user);
       header('Location:' . HOST . 'confirmation_inscription.php?id=' . $user->getIdUser());
   }
    }
    
    //connexion d'un utilisateur déjà existant
    if (isset($_POST['connect']))
    {
        //vérification pseudo/mot de passe de l'utilisateur
        $user = $manager->verifUser();
        $sess = new Session($user);
        $_SESSION['id'] = $user["idUser"];
        $_SESSION['pseudo'] = $sess->getPseudo();
        
        header('Location:'.HOST.'profil_user.php?id='.$_SESSION['id']);
    }
    
    include (VIEW.'header.php');
    include (VIEW.'inscription.php');
    include (VIEW.'footer.php');
