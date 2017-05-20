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
    
    //echo 'PATH : <pre>'; print_r($url); echo '<br/>';
    
    $parseurl = parse_url($url);
    
    $param = explode("-", $path['url']);
    
    //echo '$param : <pre>'; print_r($param); echo '<br/>';
   
    
    //connexion to chapter
    if (stristr($url, 'chapter'))
    {
        unset($param[0]);
        $idC = $param[1];
        $page = $param[2];
        if (isset($c))
        {
            var_dump("comment");
            $c = $param[3];
            if (isset($u))
            {
                var_dump("user");
                $u = $param[4];
                if (isset($s))
                {
                    var_dump("signalé");
                    $s = $param[5];
                }
            }
        }
        include ('controller/chapter.php');
    }
    //connexion to inscription and connexion view
    elseif (stristr($url, 'inscription') || stristr($url, 'connexion'))
    {
        include ('controller/inscription.php');
    }
    
    //connexion to contact
    elseif (stristr($url, 'contact'))
    {
        include ('controller/contact.php');
    }
    
    //add a chapter
    elseif (stristr($url, 'add') || stristr($url, 'modif'))
    {
            $idC = $param[1];
        include ('controller/add.php');
    
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
    
    print_r($_SESSION);

     
     
