<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 30/04/2017
     * Time: 16:11
     */
    
    /*La fonction reçoit un tableau d'objets Comment et pour chaque objet fait:

Afficher le bloc div pour le commentaire courant
Récupérer son tableau d'enfants
Appeler récursivement la fonction en lui passant le tableau d'enfants et en incrémentant le niveau*/
    
    function child($array, $level = 0)
    {
        $CommentManager = new CommentManager(); //pour récupérer les enfants de chaque commentaire
        $html = ""; //initialisation de $html;
        
        // pour chaque ligne du tableau
        foreach ($array as $comment)
        {
            //si le niveau du commentaire est égal à $level
            if ($comment->getLevelComment() == $level)
            {
                //j'affiche le commentaire courant
                $html .= include (VIEW . 'currentcomment.php');
                //je récupère les enfants sous forme de tableau d'objet
                $element = $CommentManager->getChildren($comment->getId());
                // j'affiche les enfants et je vais chercher leurs enfants en rappelant la même fonction
                $html .= child($element, $level+1);
            }
        }
        return $html;
    }
    