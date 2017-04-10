<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 06/04/2017
     * Time: 15:38
     */
    $bdd = new PDO('mysql:host=localhost; dbname=blogwriter;charset=utf8', 'root', 'root', array
    (PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));