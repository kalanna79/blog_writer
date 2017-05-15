
	<a href="#mod-comment" class="showModeration fa fa-eye fa-lg btn-lg" id="moderation-<?php echo $moderation->getCommentsid();
    ?>" title="Voir le texte"></a> Le commentaire <?php echo $moderation->getCommentsid();?> écrit par <?php echo
    $moderation->getUserPseudo($moderation->getUserid()) ;
    if ($moderation->getStatusmodif() == 2) { echo repl($string);} else { echo $string; };?><br>
    <div class="text-center">
	
	
	
	</div>
	<div class="mod-comment panel panel-danger" id="txt-moderation-<?php echo $moderation->getCommentsid();?>">
		<?php echo $comanager->showOneComment($moderation->getCommentsid())
			->getTexte();?>
		<a href="<?php echo HOST . 'indexadmin.php?id='.$_SESSION['id'] .'&trashcomment=' . $moderation->getCommentsid();?>" class="fa fa-trash-o fa-lg btn-lg " title="Modérer le commentaire"></a>
		
		<a href="<?php echo HOST . 'indexadmin.php?id='.$_SESSION['id'] .'&commentOK=' . $moderation->getId();?>" class="fa fa-thumbs-o-up fa-lg btn-lg" title="Accepter le commentaire"></a>
	
	</div>

