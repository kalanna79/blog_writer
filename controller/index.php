<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 24/03/2017
     * Time: 09:20
     */
    
    include(__DIR__ . '/../model/bdd.php');
    include(__DIR__ . '/../model/sql.php');
    include(__DIR__ . '/../view/header.php');
    include(__DIR__ . '/../view/index.php'); /* regrouper les 2 vues en mettant include header dans include index */
	include(__DIR__ . '/../view/footer.php');
    
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
    
    function mydate($date) {
        return date("Y-m-d H:i:s");
             }