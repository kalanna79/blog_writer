<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 29/03/2017
     * Time: 07:36
     */
	
    include(__DIR__ . '/model/bdd.php');
    include($_SERVER["DOCUMENT_ROOT"].'/blog_writer/model/chapter.php');
    include($_SERVER["DOCUMENT_ROOT"].'/blog_writer/view/header.php');
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
								<a class="navbar-link" href="index.php">Accueil</a>
							</li>
							
							<!-- liens de navigation entre les chapitres -->
							<li class="nav-item">
								<a class="navbar-link" href="#">chapter <!--<?php echo $key;?> --></a>
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
						<div class="clip-text"> <h2><?php echo $chap['title'];?></h2></div>
					</div>
					<span><abbr><?php echo $chap['date_created'];?></abbr></span>
				</div>
				</div>
				
				<!-- Texte du chapitre -->
				<div class="row">
							
					<div class="col-xs-12 col-md-offset-2 col-md-8 book colonne">
						<?php echo showText($chap['texte']); ?>
					</div>
					
					<!-- Pagination dans le chapitre -->
				</div>
					<div class="row">
						<div class="page"><div><?php print_r(pagination($chap['texte'])); ?></pre></div>
					</div>
		
					
				<div class="row">
					<div class="comments"><i class="fa fa-comments fa-3x" aria-hidden="true"></i>
					
					</div>
            </section>
			<?php include($_SERVER["DOCUMENT_ROOT"].'/blog_writer/view/footer.php');?>
