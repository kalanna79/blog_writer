<div class=" col-xs-12 col-md-offset-2 col-md-8">
    
</div>
<section class="col-xs-12 col-md-12 principal">
    <!-- Titre du chapitre -->
    <div class="row titre">
        <div class="col-xs-12 col-md-offset-2 col-md-8">
            <div class="wrapper">
                <div class="clip-text"> <h2><?php echo $chapter->getTitle();?></h2></div>
            </div>
            <span><abbr><?php echo datefr($chapter->getDatecreated());?></abbr></span>
        </div>
    </div>
    
    <!-- Texte du chapitre -->
    <div class="row">
        
        <div class="col-xs-12 col-md-offset-2 col-md-8 book colonne" id="chaptertext">
            <?php echo $chapter->showText($page); ?>
        </div>
	</div>
        <!-- Pagination dans le chapitre -->
    
    <div class="row">
        <div class="page">
			<div><?php echo $pagination; ?></pre></div>
        </div>
	</div>
	
</section>



