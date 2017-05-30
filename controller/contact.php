<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 11/05/2017
     * Time: 14:31
     */
    $manager = new UserManager();
    $auteur = $manager->getUserById(1);
    
    //header("Cache-Control: no-store, no-cache, must-revalidate");
    
    if (isset($_POST['envoyer']))
    {
        if (empty($_POST['mail']) && empty($_POST['message']))
        {
            $mess = setFlash("Attention !", "Je ne pourrais pas vous répondre sans adresse mail ni message", "warning");
            // header('refresh: 2; contact');
        }
        elseif (empty($_POST['mail']) || (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)))
        {
            $mess = setFlash("Attention !", "Je ne pourrais pas vous répondre sans adresse mail valide", "warning");
        }
       
        else {
            $mail = new Mail(htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['nom']), htmlspecialchars
            ($_POST['sujet']), htmlspecialchars($_POST['message']));
            $destinataire = $auteur->getEmail();
    
        }
    }
    include(VIEW . 'header.php');
    
    if (isset($mail))
    {
        if ($mail->sendMail($destinataire) == true) {
            include(VIEW . 'confirmation_mail.php');
        }
    }
         else
        {
        include(VIEW . 'contact.php');
        }
    
        include(VIEW . 'footer.php');
    