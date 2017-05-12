<div class="panel panel-default level-<?php echo $comment->getLevelComment();?>">
    <div class="panel-heading">
        <span class="pseudo">
            <?php echo $comment->getUserPseudo(); ?>
        </span>
        <span class="title">
            <?php echo $comment->getTitle(); ?>
        </span><br>
        <abbr> <?php echo $comment->getDateCreated(); ?>
    </div>
    <div class="panel-body">
<?php echo $comment->getTexte(); ?>
    </div>
    <div class="panel-footer level<?php echo $comment->getLevelComment();?>">
		<a href="#reponse" class="showForm alevel<?php echo $comment->getLevelComment();?> " id="comment-<?php echo $comment->getId(); ?>"> Répondre - </a> <a href="<?php echo HOST . 'chapter.php?idchapter='. $comment->getIdchapter(). '&page=1&comment=' . $comment->getId().
		'&user=' . $comment->getIdUser
			() .	'&signaler=1';?>">Signaler</a>
        <div class="row reponse" style="display: none" id="rep-comment-<?php echo $comment->getId(); ?>" >
            <form id="reponse" action="" method="post">
                <input type="hidden" name="reponse" value="<?php echo $comment->getId(); ?>">
                <textarea name="reponsetxt" cols="95" rows="3">Votre réponse</textarea> 						<br><br>
                <input type="submit" value="Envoyer" name="submitreponse">
            </form>
        </div>

    </div>
</div>