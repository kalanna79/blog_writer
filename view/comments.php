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
				<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titre de votre message</label>
					<div class="col-sm-10">
						<input type="text" placeholder="Titre" name="title" class="form-control ">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<textarea name="message" placeholder="Votre message" rows="5" class="col-sm-2 form-control"></textarea><br>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						
						<input id="submitcomment" type="submit" value="Envoyer" name="submitcomment" class="btn btn-default">
					</div>
				</div>
			</form>
		</div>
		</div>

	</div>


</section>
