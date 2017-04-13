<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 03/04/2017
     * Time: 09:17
     */
    


     ?>

<div class="row principal">
    <section class="col-md-6 presentation">
        
        
        <article>
            
            <img src="../img/rafting-1377057_640.jpg" width="100%" class="valign">
            
            <div class="colonne bio">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ullamcorper sem erat, in lobortis enim viverra et. Nunc sit amet lacus consequat, congue lacus ornare, lacinia lorem. Suspendisse sit amet ligula imperdiet, commodo eros ac, molestie tortor. Praesent id velit rutrum libero mollis maximus eu ut quam. Quisque dignissim massa metus, vel maximus sem consectetur non. Nunc at enim leo. Sed dapibus ligula leo, id iaculis arcu mollis eget.
                
                Praesent dictum nibh ac ultricies eleifend. Sed eget pulvinar lacus. Suspendisse dictum dictum lacus bibendum imperdiet. Sed ut nisi dignissim enim tincidunt aliquet sed sed velit. Aenean vitae lobortis nulla, non elementum nibh. Vestibulum a fermentum urna. Integer sed sodales metus. Nulla tincidunt arcu a ex ultricies, at ultrices velit sollicitudin. Proin tempus pretium orci sit amet iaculis. Duis eget pellentesque sem. In eu faucibus nunc. Sed posuere, nunc et imperdiet eleifend, enim sapien malesuada enim, in sodales purus libero sit amet turpis.
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
				
				<div class=" details-chap"  style="display: none" id="details-chap<?php echo $chapter->getId();?>">
					<h3>Chap <?php echo $chapter->getId() . " : " . $chapter->getTitle();?></h3>
					<p> <?php echo resume($chapter->getTexte(), 320);?></p>
				</div>
                <?php endforeach;?>
			
			</div>
		</div>
	
	<!-- affichage numéro chapitre -->
		<?php $i = 0;?>
		<?php foreach($chapters as $chapter):?>
                
		<?php if($i==0) echo '<div class="myrow">';?>
                
		<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 showButton" id="chap<?php echo $chapter->getId();?>">
			<div class="row chap-box-icon">
				<a href="../controller/chapter.php?id=<?php echo $chapter->getId();?>&page=1"> <strong class="chap">Chap <?php echo $chapter->getId();?></strong></a><br>
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<abbr>
						<time><?php echo $chapter->getDatecreated(); ?></time>
					</abbr>
				</div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <i class="glyphicon glyphicon-chevron-down text-muted"></i>
                        </div>
                    </div>
                
		<?php $i++;?>
			
			<!-- affichage chapitres ligne par ligne -->
                <?php
					if($i == 4) {
						echo '</div>';
                        $i = 0;
				}; ?>
            <?php if($i<4 && $i != 0) {echo '</div>';}?>
                    <?php endforeach;?>
</main>
