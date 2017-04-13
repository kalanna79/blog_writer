<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 29/03/2017
     * Time: 07:36
     */
    include('../config.php');
    
    function chargerClasse($classe)
	{
		require MODEL.$classe.'.php';
	}
	spl_autoload_register('chargerClasse');
    
    $manager = new ChapterManager();
    if (isset($_GET['id'])) {
    	$chapter = $manager->Chapter_selected($_GET['id']);
	}

    include(ROOT . 'view/header.php');
    ?>

		<div class=" col-xs-12 col-md-offset-2 col-md-8">
			<nav class="navbar navbar-default nav-tabs" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse"  data-target="#navbar-collapse" style="text-align: center;">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse nav-tabs" id="navbar-collapse">
						<ul class="nav navbar-nav">
						
							<li class="nav-item">
								<a class="navbar-link" href="<?php echo HOST;?>index.php">Accueil</a>
							</li>
							
							<!-- liens de navigation entre les chapitres -->
							<li class="nav-item">
								<a class="navbar-link" href="#">chapter <!--<?php echo $chapter->getId();?> --></a>
							</li>
							
						</ul>
				</div>
            </nav>
		</div>
            <section class="col-xs-12 col-md-12 principal">
				<!-- Titre du chapitre -->
				<div class="row titre">
					<div class="col-xs-12 col-md-offset-2 col-md-8">
					<div class="wrapper">
						<div class="clip-text"> <h2><?php echo $chapter->getTitle();?></h2></div>
					</div>
					<span><abbr><?php echo $chapter->getDatecreated();?></abbr></span>
				</div>
				</div>
				
				<!-- Texte du chapitre -->
				<div class="row">
							
					<div class="col-xs-12 col-md-offset-2 col-md-8 book colonne">
						<?php echo $chapter->showText(); ?>
					</div>
					
					<!-- Pagination dans le chapitre -->
				</div>
					<div class="row">
						<div class="page"><div><?php print_r($chapter->pagination()); ?></pre></div>
					</div>
		
					
				<div class="row">
					<div class="comments"><i class="fa fa-comments fa-3x" aria-hidden="true"></i>
					
					</div>
            </section>


			<?php include(__DIR__.'/../view/footer.php');?>
