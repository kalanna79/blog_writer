<section class="col-xs-12 col-md-offset-2 col-md-8 principal">
    <div class="row">
        <div class="comments">
            <i id="comment" class="fa fa-comments fa-3x" aria-hidden="true"></i>
        </div>
    	
		<div class="showComment">
        	<?php child($commentaires); ?>
	
        <div class="row depotcomment">
            <p>Déposez un commentaire : </p>
            <form action="" method="post">
                <label for="title">Titre de votre message</label><br>
                <input type="text" name="title"> <br><br>
                <textarea name="texte" cols="110" rows="5">Votre message</textarea> <br><br>
                <input id="submitcomment" type="submit" value="Envoyer" name="submitcomment">
			</form>
		</div>
		</div>

	</div>


</section>
