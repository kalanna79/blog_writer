<section class="col-xs-12 col-md-offset-2 col-md-8 principal">
    <div class="row">
        <div class="comments">
            <i class="fa fa-comments fa-3x" aria-hidden="true"></i>
        </div>
    
        <?php $commentsdate = $CommentManager->showCommentsByDate();?>
	
            <?php echo $CommentManager->afficher_commentaires(0, 0, $commentsdate);?>
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
