<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 14/04/2017
     * Time: 08:29
     */
    
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
        
   if ($manager->verifAdd($_POST['pseudo'], $_POST['email'])) {
       $message = '<div class="panel" id="alert">Ce pseudo ou cet email sont déjà utilisés</div>';
   } else {
       $manager->addUser($user);
       $u = $user->getIdUser();
       $_SESSION['id'] = $user->getIdUser();
       $_SESSION['pseudo'] = $user->getPseudo();
       header('Location:dashboard' . $_SESSION['id']);
   }
    }
    
    //connexion d'un utilisateur déjà existant
    if (isset($_POST['connect']))
    {
        //vérification pseudo/mot de passe de l'utilisateur
        $user = $manager->verifUser($_POST['pseudo'], $_POST['password']);
        $sess = new Session($user);
        $_SESSION['id'] = $user["idUser"];
        $_SESSION['pseudo'] = $user["pseudo"];
        
            header('Location:dashboard-'.$_SESSION['id']);
        
    }
    
    include (VIEW.'header.php');
    include (VIEW.'inscription.php');
    include (VIEW.'footer.php');
