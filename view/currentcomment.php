<div class="panel panel-default level-<?php echo $comment->getLevelComment();?>" id="comment-<?php echo $comment->getId(); ?>">
    <div class="panel-heading">
        <span class="pseudo">
            <?php echo $comment->getUserPseudo($comment->getIdUser()); ?>
        </span>
        <span class="title">
            <?php echo $comment->getTitle(); ?>
        </span><br>
        <abbr> <?php echo $comment->getDateCreated(); ?>
    </div>
    <div class="panel-body"">
<?php
	$ModerationManager = new ModerationManager();
    if ($ModerationManager->ShowOneModeration($comment->getId())->getStatusmodif() == 2)
    {
       echo "** Commentaire modéré **";
    } else {
        echo $comment->getTexte();
	}
	 ;?>
    </div>
    <div class="panel-footer level<?php echo $comment->getLevelComment();?>">
		<a href="#reponse" class="showForm alevel<?php echo $comment->getLevelComment();?> " id="comment-<?php echo $comment->getId(); ?>"> Répondre -
		</a>
		<a href="chapter-<?php echo $comment->getIdchapter(). '-1-' . $comment->getId(). '-' .
			$comment->getIdUser() .	'-1';?>">Signaler
		</a>
        <div class="row reponse" style="display: none" id="rep-comment-<?php echo $comment->getId(); ?>" >
            <form id="reponse" action="" method="post">
                <input type="hidden" name="reponse" value="<?php echo $comment->getId(); ?>">
                <textarea name="reponsetxt" cols="95" rows="3">Votre réponse</textarea> 						<br><br>
                <input type="submit" value="Envoyer" name="submitreponse">
            </form>
        </div>

    </div>
</div>