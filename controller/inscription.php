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
        //vérifications champs vides
        if (empty($_POST['firstname']))
        {
            $mess = setFlash("Oupsss !", 'Vous avez oublié votre prénom', 'warning');
            header('refresh: 2; connexion');
        }
        elseif (empty($_POST['name']))
        {
            $mess = setFlash("Oupsss !", 'Vous avez oublié votre nom', 'warning');
            header('refresh: 2; connexion');
        }
        elseif (empty($_POST['pseudo'])) {
            $mess = setFlash("Oupsss !", 'Vous avez oublié votre pseudo ?', 'warning');
            header('refresh: 2; connexion');
        }
        elseif (empty($_POST['email']))
        {
            $mess = setFlash("Oupsss !", 'Vous avez oublié votre adresse mail', 'warning');
            header('refresh: 2; connexion');
        }
        elseif (empty($_POST['password'])) {
            $mess = setFlash("Oupsss !", 'Vous avez oublié un mot de passe', 'warning');
            header('refresh: 2; connexion');
        }
            
            
        //vérifications longueurs de champ
        elseif (strlen($_POST['firstname']) < 3)
        {
            $mess = setFlash("Oupsss !", 'Ce champ doit faire 3 caractères mininum', 'warning');
            header('refresh: 2; connexion');
        }
        elseif (strlen($_POST['name']) < 3)
        {
            $mess = setFlash("Oupsss !", 'Votre nom doit faire plus de 3 caractères', 'warning');
            header('refresh: 2; connexion');
        }
        elseif (strlen($_POST['pseudo']) < 3) {
            $mess = setFlash("Oupsss !", 'Votre pseudo doit faire plus de 3 caractères', 'warning');
            header('refresh: 2; connexion');
        }
        elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $mess = setFlash("Oupsss !", 'Votre adresse mail n\'a pas le bon format', 'warning');
            header('refresh: 2; connexion');
        }
        elseif (strlen($_POST['password']) < 4) {
            $mess = setFlash("Oupsss !", 'votre mot de passe est trop court', 'warning');
            header('refresh: 2; connexion');
    
        } else {
            $protectedpwd = sha1($_POST['password']);
            $verifpwd = sha1($_POST['pwd2']);
            if ($protectedpwd === $verifpwd) {
                $user = new User(['firstname' => htmlspecialchars($_POST['firstname']),
                                  'name'      => htmlspecialchars($_POST['name']),
                                  'pseudo'    => htmlspecialchars($_POST['pseudo']),
                                  'email'     => htmlspecialchars($_POST['email']),
                                  'password'  => $protectedpwd]);
        
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
                header('refresh: 2; connexion');
            }
        }
    }
    
    //connexion d'un utilisateur déjà existant
    if (isset($_POST['connect']))
    {
        if (empty($_POST['pseudo']) && empty($_POST['password']))
        {
            $mess = setFlash("Oupsss !", 'Il semble que vous ayez oublié de vous identifier...', 'warning');
            header('refresh: 2; connexion');
        }
        if (empty($_POST['pseudo']))
           {
               $mess = setFlash("Oupsss !", 'Vous avez oublié votre pseudo ?', 'warning');
               header('refresh: 2; connexion');
    
           }
        elseif (empty($_POST['password'])) {
            $mess = setFlash('Oupsss !', 'Vous avez oublié votre mot de passe ?', 'warning');
            header('refresh: 2; connexion');
    
        } else {
        //vérification pseudo/mot de passe de l'utilisateur
            $user = $manager->verifUser($_POST['pseudo'], $_POST['password']);
            if (!empty($user)) {
                $sess = new Session($user);
                $_SESSION['id'] = $user["idUser"];
                $_SESSION['pseudo'] = $user["pseudo"];
                header('Location:dashboard-'.$_SESSION['id']);
            } else {
                $mess = setFlash("Attention !", "Ce pseudo ou ce mot de passe est erroné", "danger");
                header('refresh: 2; connexion');
    
            }
        }
    }
    
    //changement mot de passe
    if (isset($_POST['newpwd']) && !empty($_POST['password']))
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
