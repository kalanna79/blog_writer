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
        $protectedpwd = sha1($_POST['password']);
        $verifpwd = sha1($_POST['pwd2']);
        if ($protectedpwd === $verifpwd)
        {
            $user = new User(['firstname' => htmlspecialchars($_POST['firstname']),
                              'name' => htmlspecialchars($_POST['name']),
                              'pseudo' => htmlspecialchars($_POST['pseudo']),
                              'email' => htmlspecialchars($_POST['email']),
                              'password' => $protectedpwd]);
    
            if ($manager->verifAdd($_POST['pseudo'], $_POST['email'])) {
                $mess = setFlash("Attention !", "Ce pseudo ou cet email sont déjà utilisés", "danger");
            } else {
                $manager->addUser($user);
                $u = $user->getIdUser();
                $_SESSION['id'] = $user->getIdUser();
                $_SESSION['pseudo'] = $user->getPseudo();
                header('Location:dashboard-' . $_SESSION['id']);
            }
        } else {
            $mess = setFlash("Veuillez recommencer !", "Les mots de passe ne correspondent pas", "danger");
        }
    }
    
    //connexion d'un utilisateur déjà existant
    if (isset($_POST['connect']))
    {
        //vérification pseudo/mot de passe de l'utilisateur
        $user = $manager->verifUser($_POST['pseudo'], $_POST['password']);
        if (!empty($user)) {
            $sess = new Session($user);
            $_SESSION['id'] = $user["idUser"];
            $_SESSION['pseudo'] = $user["pseudo"];
            header('Location:dashboard-'.$_SESSION['id']);
        } else {
            $mess = setFlash("Attention !", "Ce pseudo ou ce mot de passe est erroné", "danger");
        }
    }
    
    //changement mot de passe
    if (isset($_POST['newpwd']))
    {
        $hpwd = sha1($_POST['password']);
        $vhpwd = sha1($_POST['verifpassword']);
    
        if ($hpwd === $vhpwd)
        {
            $manager->updatePwd($_POST['pseudo'], $_POST['password']);
            $mess = setFlash("Félicitations !", "Votre mot de passe a été mis à jour", "success");
            header('refresh: 2; connexion');
    
        }
        else {
            $mess = setFlash("Veuillez recommencer !", "Les mots de passe ne correspondent pas", "danger");
        }
    }
    
    include (VIEW.'header.php');
    if (stristr($_SERVER['QUERY_STRING'], 'change'))
    {
        include (VIEW.'forget.php');
    }
    else {
        include (VIEW.'inscription.php');
    }
    include (VIEW.'footer.php');
