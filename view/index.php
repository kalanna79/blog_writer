<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 24/03/2017
     * Time: 09:20
     */
    $chaps = array(
        array(
            'chap' => 'chap0',
            'texte' => 'lorem ipsum',
        ),
        array(
            'chap' => 'chap0',
            'texte' => 'lorem ipsum',
        ),
        array(
            'chap' => 'chap0',
            'texte' => 'lorem ipsum',
        ),
        array(
            'chap' => 'chap0',
            'texte' => 'lorem ipsum',
        ),
        array(
            'chap' => 'chap0',
            'texte' => 'lorem ipsum',
        ),
        array(
            'chap' => 'chap0',
            'texte' => 'lorem ipsum',
        ),
        array(
            'chap' => 'chap0',
            'texte' => 'lorem ipsum',
        ),
        array(
            'chap' => 'chap0',
            'texte' => 'lorem ipsum',
        ),
    );
    ?>



<!DOCTYPE HTML>
<html>
<head>
    <title>Billet pour l'Alaska</title>
    <meta charset="UTF-8">
    
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/personal.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">
</head>

<body>
    <main class="container">
        <!-- partie de gauche avec présentation auteur & form de contact -->
		<div class="row">
			<div class="col-md-9">
				<h1>Billet pour l'Alaska</h1>
			</div>
			<div class="col-md-3 icon-menu">
				<a href="#" class="fa fa-user-plus fa-lg btn-lg valign"></a>
				<a href="#" class="fa fa-sign-in fa-lg btn-lg valign"></a>
				<a href="#" class="fa fa-envelope-o fa-lg btn-lg valign"></a>
			</div>
		</div>
			<div class="row principal">
				<section class="col-md-offset-1 col-md-5 presentation">
					
					
					<article>
						
						<img src="img/rafting-1377057_640.jpg" width="100%" class="valign">
						
						<div class="colonne">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ullamcorper sem erat, in lobortis enim viverra et. Nunc sit amet lacus consequat, congue lacus ornare, lacinia lorem. Suspendisse sit amet ligula imperdiet, commodo eros ac, molestie tortor. Praesent id velit rutrum libero mollis maximus eu ut quam. Quisque dignissim massa metus, vel maximus sem consectetur non. Nunc at enim leo. Sed dapibus ligula leo, id iaculis arcu mollis eget.
						
											 Praesent dictum nibh ac ultricies eleifend. Sed eget pulvinar lacus. Suspendisse dictum dictum lacus bibendum imperdiet. Sed ut nisi dignissim enim tincidunt aliquet sed sed velit. Aenean vitae lobortis nulla, non elementum nibh. Vestibulum a fermentum urna. Integer sed sodales metus. Nulla tincidunt arcu a ex ultricies, at ultrices velit sollicitudin. Proin tempus pretium orci sit amet iaculis. Duis eget pellentesque sem. In eu faucibus nunc. Sed posuere, nunc et imperdiet eleifend, enim sapien malesuada enim, in sodales purus libero sit amet turpis.
						</div>
						
					</article>
					
					
				</section>
				<!-- partie de droite avec Table des matières comprenant num chap + titre chap + date ajout + 300 car et Lire la suite -->
				<section class="col-xs-12 col-md-5 table_mat">
					<h2>Table des matières</h2>
					<hr>
					
					
					
						<div class="row">
                            <?php $i = 0;?>
							<?php foreach($chaps as  $key => $chap): ?>
                            <?php if($i==0) echo '<div class="row">';?>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 showButton" id="<?php echo $key; ?>">
								<div class="chap-box-icon">
									<span class="chap"><a href="chapter.php">Chap <?php echo $key; ?></a></span><br>
									<div>
										<abbr>
											<time datetime="2017-04-04">31/03/2017</time>
											<i class="glyphicon glyphicon-chevron-down text-muted"></i>
										</abbr>
									</div>
								</div>
							</div>
						
					
					
							
							
							<div class="row" >
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 details-chap" id="details-<?php
									echo $key; ?>" style="display: none">
									<div class="panel panel-primary">
										<div class="panel-body">
											<div class="row">
												<div>
													<p><?php echo $chap['texte']; ?></p>
												
												</div>
											</div>
										</div>
									
									</div>
								</div>
                                
                                <?php $i++ ;?>
                                <?php if ($i == 4):?>
									</div>
									<?php $i = 0;?>
									<?php endif;?>
                                <?php endforeach;?>
                            <?php if (($i < 4) && ($i != 0)) echo '</div>'; ?>
							
							</div>
				</section>
		</div>
		
    </main>
	<footer>
		<div class="row">
			<div class="col-md-6"><span>Copyright Jean Forteroche 2017</span></div>
			<div class="col-md-6">
				<a href="#" class="fa fa-facebook-square fa-lg btn-md"></a>
				<a href="#" class="fa fa-google-plus-square fa-lg btn-md"></a>
				<a href="#" class="fa fa-twitter-square fa-lg btn-md"></a>
				<a href="#" class="fa fa-pinterest-square fa-lg btn-md"></a>
			</div>
	</footer>
	
	<script src="bootstrap/js/query.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="bootstrap/js/personal.js"></script>
</body>
</html>
