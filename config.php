<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 11/04/2017
     * Time: 21:44
     */
    
    define ('ROOT', $_SERVER['DOCUMENT_ROOT'].'/blog_writer/');
    define ('MODEL', ROOT . 'model/');
    define ('VIEW', ROOT . 'view/');
    define ('HOST','http://' . $_SERVER['HTTP_HOST'] . '/blog_writer/controller/');
    define ('CONTROLLER', ROOT . 'controller/');
    
    function chargerClasse($classe)
    {
        require MODEL.$classe.'.php';
    }
    spl_autoload_register('chargerClasse');
    
    include (CONTROLLER.'functions.php');