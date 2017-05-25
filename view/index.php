<div class="row principal">
	<section class="col-md-6 presentation">
		
		
		<article>
			
			<img src="assets/img/rafting-1377057_640.jpg" width="100%" class="valign">
			
			<div class="colonne bio">
				Jean Forteroche, né le 11 mai 1979, est un écrivain français, auteur de romans et nouvelles d'aventures.
				<br>Au cours de son enfance, il fait de fréquents séjours aux Etats-Unis et au Canada. Sa première destination est le parc de Denali, dont son dernier roman s'inspire.<br>
				Amoureux des grands espaces et fervent défenseur de la nature, il écrit des romans d'aventures dignes de Jack London et Jules Verne. <br>Parce qu'il désire partager avec le plus grand nombre de lecteurs ses écrits, ce dernier roman est entièrement publié en ligne, chapitre par chapitre. vous le trouverez prochainement en librairie avec de nombreux ajouts photographiques.<br>
				<strong><em>Bonne lecture !</em></strong>
			</div>
		
		</article>
	
	
	</section>
	<!-- partie de droite avec Table des matières comprenant num chap + titre chap + date ajout + 320 car -->
	<section class="col-xs-12 col-md-6 table_mat">
		<h3>Table des matières</h3>
		<hr>
		
		<!-- affichage résumé chapitre -->
		<div class="row user-infos" style="height: 220px;">
			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php foreach($chapters as $chapter):?>
					
					<div class=" details-chap"  style="display: none" id="details-chap<?php echo $chapter->getNumero();?>">
						<h3>Chap <?php echo $chapter->getNumero() . " : " . $chapter->getTitle();?></h3>
						<p> <?php echo $chapter->getExcerpt(320);?></p>
					</div>
                <?php endforeach;?>
			
			</div>
		</div>
		
		<!-- affichage numéro chapitre -->
        <?php $i = 0;?>
        <?php foreach($chapters as $chapter):?>
        
        <?php if($i==0) ?>
		<div class="myrow">
		
			<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 showButton" id="chap<?php echo $chapter->getNumero();?>">
				<div class="row chap-box-icon">
					<a href="chapter-<?php echo $chapter->getId();?>-1">
						<strong class="chap">
							Chap <?php echo $chapter->getNumero();?>
						</strong>
					</a><br>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<abbr>
							<time><?php echo datefr($chapter->getDatecreated()); ?></time>
						</abbr>
					</div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						<i class="glyphicon glyphicon-chevron-down text-muted"></i>
					</div>
				</div>
				
				<?php $i++;?>
				
				<!-- affichage chapitres ligne par ligne -->
		<?php if($i == 4) : ?>
		</div>
		<?php $i = 0; ?>
		<?php elseif($i<4 && $i != 0) :?>
		</div>
		<?php endif;?>
		<?php endforeach;?>
	</section>
	</main>
</div>
