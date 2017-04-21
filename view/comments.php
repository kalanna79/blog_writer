<section class="col-xs-12 col-md-offset-2 col-md-8 principal">
    <div class="row">
        <div class="comments">
            <i class="fa fa-comments fa-3x" aria-hidden="true"></i>
        </div>
		
        <?php foreach($comments as $comment): ?>
        <div class="row comment">
			<div class="row">
			<div class="col-md-2">
				<?php echo $comment->getUserPseudo(); ?>
			</div>
			<div class="col-md-10">
				<strong><?php echo $comment->getTitle(); ?></strong>
			</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<abbr>le <?php echo $comment->getDateCreated(); ?></abbr></div>
			</div>
		
			<div class="row">
				<div class="col-md-12">
					<?php echo $comment->getTexte(); ?>
				</div>
				<div class="row">
					<div class="col-md-offset-3 col-md-3"> Répondre - Signaler </div>
				</div>
			</div>
		</div>
		<?php endforeach;?>

			
	
        <div class="row depotcomment">
            <p>Déposez un commentaire : </p>
            <form action="" method="post">
                <label for="title">Titre de votre message</label><br>
                <input type="text" name="title"> <br><br>
                <textarea name="texte" cols="110" rows="5">Votre message</textarea> <br><br>
                <input type="submit" value="Envoyer" name="submitcomment">

</section>
