<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 19/05/2017
     * Time: 13:32
     */
    
    session_unset();
    session_destroy();
    header('Location:index');