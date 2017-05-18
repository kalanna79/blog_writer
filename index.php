<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 09/05/2017
     * Time: 07:42
     */
    
    /* index doit récupérer toutes les adresses pour rediriger sur l'accueil du site
    */
    require_once ('config.php');
    
    $path = $_REQUEST['url'];
    
    echo 'PATH : <pre>'; print_r($path); echo '<br/>';
    
    $direction = explode("/", $path);
    $param = explode("-",$direction[1]);
    
    
    echo 'explde : <pre>'; print_r($direction); echo '<br/>';
    unset($direction[0]);
    
    
    if (stristr($path, 'chapter'))
    {
        unset($param[0]);
        print_r($param);
        $chapter = $param[1];
        
        include ('controller/chapter.php');
        
    }
    
    





