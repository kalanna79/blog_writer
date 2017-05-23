<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 09/05/2017
     * Time: 07:42
     */
    
    /* index doit récupérer toutes les adresses pour rediriger sur l'accueil du site
    */
    require_once 'config.php';
    $path = $_REQUEST;
    $url = $_SERVER['QUERY_STRING'];
    
    session_start();
    
    $parseurl = parse_url($url);
    $param = explode("-", $path['url']);
     
    //connexion to chapter
    if (stristr($url, 'chapter'))
    {
        $idC = $param[1];
        $page = $param[2];
        
        if (isset($param[3])) {
            $comm = $param[3];
            $guy = $param[4];
            $signal = $param[5];
        }
        include ('controller/chapter.php');
    }
   
    //connexion to inscription and connexion view
    elseif (stristr($url, 'inscription') || stristr($url, 'connexion') || stristr($url, 'change'))
    {
        include ('controller/inscription.php');
    }
    
    //connexion to contact
    elseif (stristr($url, 'contact'))
    {
        include ('controller/contact.php');
    }
    
    //add a chapter
    elseif (stristr($url, 'add'))
    {
        include ('controller/add.php');
    }

    elseif (stristr($url, 'modif'))
    {
        $idC = $param[1];
        include ('controller/add.php');
    }
    
    elseif (stristr($url, 'supprimer'))
    {
        $idC = $param[3];
        include ('controller/dashboard.php');
    }
    
    
    //connexion to dashboards
    //delete a chapter or confirmation to inscription
    // delete ou validate a moderated comment
    elseif (stristr($url, 'dashboard')  || stristr($url, 'confirmation'))
    {
        if (isset($idC))
        {
            $idC = $param[1];
        } elseif (isset($_SESSION['id']))
        {
            $_SESSION['id'] = $param[1];
        }
        if (stristr($url, 'trashco') || stristr($url, 'cok'))
        {
            $idCo = $param[3];
        }
        include('controller/dashboard.php');
    }
    
    // destroy session
    elseif (stristr($url, 'deconnection'))
    {
        include('controller/deconnexion.php');
    }
    
    //go to index
     else
     {
         include(CONTROLLER . 'index.php');
     }

     
     