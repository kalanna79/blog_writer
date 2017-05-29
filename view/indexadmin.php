 <section class="col-xs-12 col-md-12 principal">
    <!-- Titre -->
    <div class="row titre">
        <div class="col-xs-12 col-md-offset-2 col-md-8">
            <div class="wrapper">
                <div class="clip-text"> <h3>Tableau de bord</h3></div>
            </div>
        </div>
    </div>
	 
		 
    <!-- Mettre un tableau recap avec nb users, les messages signalés, les 5 derniers messages entrés, combien d'utilisateurs on lu tel chapitre ?? + lien vers ajout chapitre -->
    <div class="row">
		<div class="col-xs-12 col-md-offset-1 col-md-3">
			
			<div class="info-box-container">
					<div class="info-box">
						<span class="info-box-icon bg-bezin"><i class="fa fa-users"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Lecteurs</span>
							<span class="info-box-number"><?php echo count($users);?></span>
						</div>
					</div>
			</div>
			<div class="info-box-container">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Chapitres publiés</span>
						<span class="info-box-number"><?php echo count($publies);?></span>
					</div>
				</div>
			</div>
			<div class="info-box-container">
					<div class="info-box">
						<span class="info-box-icon bg-emerald"><i class="fa fa-comments"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Commentaires</span>
							<span class="info-box-number"><?php echo count($comments);?></span>
						</div>
					</div>
			</div>
			
			<div class="info-box-container">
				<div class="info-box">
					<span class="info-box-icon bg-turquoise"><i class="fa fa-tags"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Modérations</span>
						<span class="info-box-number"><?php echo count($moderations); ?></span>
					</div>
				</div>
			</div>
			
			<div class="info-box-container">
				<a href="add" >
				<div class="info-box">
					<span class="info-box-icon bg-sun"><i class="fa fa-plus-circle"></i></span>
						<span class="info-box-text ajout">Ajouter un chapitre</span>
				</div>
				</a>
			</div>
		</div>
		
		<div class="col-xs-12 col-md-3 principal">
			
			<div class="panel-group">
				<div class="panel">
					<div class="panel-heading bg-aqua info-box-number">
						<i class="fa fa-book"></i> Titre des chapitres publiés
					</div>
					<div class="panel-body">
						<?php foreach($publies as $chapter) : ?>
						<a href='chapter-<?php echo $chapter->getId();?>-1'>
							<?php echo $chapter->getNumero();?>.
							<?php echo $chapter->getTitle();?>
						</a><br>
						<?php endforeach ;?>
					</div>
				</div>
				
				<div class="panel">
					<div class="panel-heading bg-river info-box-number"><i class="fa fa-book"></i> Tous les chapitres</div>
					<div class="panel-body">
 						<?php foreach ($chapters as $chapter) : ?>
								<h5>
									Chap. <?php echo $chapter->getNumero() ;?>  :
								<?php echo $chapter->getTitle() ;?>
									<br>
									<span id='statut'>
										Statut : <span class="publication"><?php echo $chapter->getPublicationId();?></span>
								 </span>
								</h5>
								
								<a href='modif-<?php echo $chapter->getId();?>' class="btn btn-sm btn-warning"'> 							Modifier
								</a> -
								<a href='dashboard-1-supprimer-<?php echo $chapter->getId();?>' class="btn btn-sm btn-danger" >
									Supprimer
								</a>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
			
			<div class="col-xs-12 col-md-4 principal">
			<div class="panel">
					<div class="panel-heading bg-emerald info-box-number"><i class="fa fa-comments"></i> Les 5 derniers commentaires</div>
					<div class="panel-body">
						<?php foreach ($lastcomments as $comment) : ?>
                            <?php echo datefr($comment->getDatecreated());?>
						- Chapitre <?php echo $comment->getIdchapter();?> :
							<?php echo $comment->getUserPseudo($comment->getIdUser());?> a écrit :
							<?php echo $comment->getTexte();?>
						<br>
                        <?php endforeach;?>
					</div>
				</div>
				
				<div class="panel">
					<div class="panel-heading bg-turquoise info-box-number">
						<i class="fa fa-tags"></i> Modérations
					</div>
					<div class="panel-body">
						<?php if (isset($moderations))
							{
								foreach ($moderations as $moderation) { include(VIEW . "currentmoderation.php");}
							};?>
					</div>
				</div>
			</div>
		</div>
		
	</div>
 </section>
	
	