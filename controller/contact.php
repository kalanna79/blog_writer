<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 11/05/2017
     * Time: 14:31
     */
    $manager = new UserManager();
    $auteur = $manager->getUserById(1);
    
    header("Cache-Control: no-store, no-cache, must-revalidate");
    
        include(VIEW . 'header.php');
    
        if (isset($_POST['envoyer'])) {
            if (!empty($_POST['mail']) && !empty($_POST['message'])) {
                $donnees = [
                    'expediteurmail' => htmlspecialchars($_POST['mail']),
                    'nomexp'         => htmlspecialchars($_POST['nom']),
                    'adresseMail'    => $auteur->getEmail(),
                    'objet'          => htmlspecialchars($_POST['sujet']),
                    'message'        => htmlspecialchars($_POST['message'])
                ];
            
                $mail = new GestionnaireMail($donnees);
                if ($mail->envoyerMail()) {
                    include(VIEW . 'confirmation_mail.php');
                };
            
            }
        } else {
        
            include(VIEW . 'contact.php');
        }
    
        include(VIEW . 'footer.php');
    