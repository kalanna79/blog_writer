<section class="col-xs-12 col-md-offset-2 col-md-8 principal">
    <div class="row">
        <div class="comments">
            <i class="fa fa-comments fa-3x" aria-hidden="true"></i>
        </div>
    
        <?php
            $level = 0;
            foreach ($commentaires as $comment) {
            	//j'affiche le commentaire parent qui a le niveau 0
                if ($comment->getlevelComment() == $level) {
                    echo $html = '<div class="level-' . $comment->getLevelComment() . '">' . $comment->getTexte() . '</div>';
                    //si ce commentaire a des enfants,
                    if ($CommentManager->hasChildren($comment->getId())) {
                        //je récupère les objets enfants dans un tableau appelé children
                        $children = $CommentManager->hasChildren($comment->getId());
                        foreach ($children as $child) {
                            echo $html = '<div class="level-' . $child->getLevelComment() . '">' . $child->getTexte() . '</div>';
            
                            //si ce commentaire a des enfants,
                            if ($CommentManager->hasChildren($child->getId())) {
                                //je récupère les objets enfants dans un tableau appelé children
                                $littlechildren = $CommentManager->hasChildren($child->getId());
                                foreach ($littlechildren as $littlechild) {
                                    echo $html = '<div class="level-' . $littlechild->getLevelComment() . '">' . $littlechild->getTexte() . '</div>';
                                }
                            }
                        }
                    }
                }
            }
            ?>
		</div>

			
	
        <div class="row depotcomment">
            <p>Déposez un commentaire : </p>
            <form action="" method="post">
                <label for="title">Titre de votre message</label><br>
                <input type="text" name="title"> <br><br>
                <textarea name="texte" cols="110" rows="5">Votre message</textarea> <br><br>
                <input type="submit" value="Envoyer" name="submitcomment">
			</form>
		</div>

</section>
