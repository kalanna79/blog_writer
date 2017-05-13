<li>
    Le commentaire <?php echo $moderation->getCommentsid();?> écrit par <?php echo
    $moderation->getUserPseudo($moderation->getUserid()). " statut : " . $moderation->getStatusmodif();?> a été signalé.<br>
    <div class="text-center">
	<a href="#" class="showModeration fa fa-eye fa-lg btn-lg" id="moderation-<?php echo $moderation->getCommentsid();
    ?>" title="Voir le texte"></a>
	<a href="#<?php echo
    $moderation->getCommentsid();
        ;?>" class="fa fa-trash-o fa-lg btn-lg" title="Modérer le commentaire"></a>
	<a href="#" class="fa fa-thumbs-o-up fa-lg btn-lg" title="Accepter le commentaire"></a>
	</div>
	<div class="mod-comment panel panel-danger" id="txt-moderation-<?php echo $moderation->getCommentsid();?>"><?php echo $comanager->showOneComment($moderation->getCommentsid())
			->getTexte();?></div>
    
</li>
