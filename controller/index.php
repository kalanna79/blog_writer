<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 24/03/2017
     * Time: 09:20
     */
    include('../config.php');
    
    $manager = new ChapterManager();
    $chapters = $manager->Tab_matieres();
    
    include(VIEW . 'header.php');
    include(VIEW . 'index.php');
	include(VIEW. 'footer.php');
    
    
  