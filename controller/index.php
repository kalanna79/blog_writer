<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 24/03/2017
     * Time: 09:20
     */
    include('../config.php');
    
    function chargerClasse($classe)
    {
        require MODEL.$classe . '.php';
    }
    spl_autoload_register('chargerClasse');
    
    $manager = new ChapterManager();
    
    $chapters = $manager->Tab_matieres();
    
    include(VIEW . 'header.php');
    include(VIEW . 'index.php');
	include(VIEW. 'footer.php');
    
    /**
     * function resume(text, nbchar)
     * text = text that you want to see an excerpt
     * nbchar = how many chars that you want
     * the end of the excerpt is "..."
     */
    function resume($text, $nb=null){
        $excerpt = substr($text, 0, $nb);
        $excerpt = substr($excerpt, 0, strrpos($excerpt, " "));
        $etc = "...";
        $excerpt = $excerpt.$etc;
        return $excerpt;
    }
