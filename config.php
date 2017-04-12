<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 11/04/2017
     * Time: 21:44
     */
    
    echo $_SERVER['HTTP_HOST'];
    
    define ('ROOT', $_SERVER['DOCUMENT_ROOT'].'/blog_writer/');
    define ('MODEL', ROOT . 'model/');
    define ('HOST','http://' . $_SERVER['HTTP_HOST'] . '/blog_writer/controller/');
    