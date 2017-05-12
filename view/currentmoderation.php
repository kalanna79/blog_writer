<li>
    Le commentaire <?php echo $moderation->getCommentsid();?> écrit par <?php echo
    $moderation->getUserPseudo($moderation->getUserid());?> a été signalé.<br>
    <a href="<?php echo HOST . "chapter.php?idchapter=" . $moderationmanager->isInChapter($moderation->getCommentsid()) . "&page=1#comment-" .$moderation->getCommentsid();?>"> Voir le commentaire </a> <br>
    <a href="#">Modérer le commentaire</a> <br>
    <a href="#">Accepter le commentaire</a>
</li>
<br>