<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 24/03/2017
     * Time: 09:20
     */

    $manager = new ChapterManager();
    $chapters = $manager->Tab_matieres();
    
    include(VIEW . 'header.php');
    if (stristr($_SERVER['QUERY_STRING'], 'mentions'))
    {
        include (VIEW . 'mentions.php');
    } else {
        include(VIEW . 'index.php');
    }
	include(VIEW. 'footer.php');
    
    
  