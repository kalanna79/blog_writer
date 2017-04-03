<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 29/03/2017
     * Time: 07:36
     */
    $chaps = array(
        array(
            'chap' => 'chap0',
            'texte' => 'lorem ipsum blabla chp 0',
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
            'texte' => '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ullamcorper sem erat, in lobortis enim viverra et. Nunc sit amet lacus consequat, congue lacus ornare, lacinia lorem. Suspendisse sit amet ligula imperdiet, commodo eros ac, molestie tortor. Praesent id velit rutrum libero mollis maximus eu ut quam. Quisque dignissim massa metus, vel maximus sem consectetur non. Nunc at enim leo. Sed dapibus ligula leo, id iaculis arcu mollis eget.
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ullamcorper sem erat, in lobortis enim viverra et. Nunc sit amet lacus consequat, congue lacus ornare, lacinia lorem. Suspendisse sit amet ligula imperdiet, commodo eros ac, molestie tortor. Praesent id velit rutrum libero mollis maximus eu ut quam. Quisque dignissim massa metus, vel maximus sem consectetur non. Nunc at enim leo. Sed dapibus ligula leo, id iaculis arcu mollis eget.</div>',
        ),
    );
    
    include('../view/header.php');
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
							<?php foreach ($chaps as $key => $chap) :?>
								
							<li class="nav-item">
								<a class="navbar-link" href="#">chapter <?php echo $key;?></a>
							</li>
							<?php endforeach;?>
							
							
							
						</ul>
				</div>
            </nav>
		</div>
            <section class="col-xs-12 col-md-12 principal">
				
				<div class="row titre">
					<div class="col-xs-12 col-md-offset-2 col-md-8">
					<div class="wrapper">
						<div class="clip-text"> <h2>Départ pour l'Alaska</h2></div>
					</div>
					<span><abbr>01/01/2017</abbr></span>
				</div>
				</div>
				
						
				<div class="row">
							
					<div class="col-xs-12 col-md-offset-2 col-md-8 book colonne">
						<?php echo $chap['texte'];?>
					</div>
                            
				</div>
					<div class="row">
						<div class="page"><div>pagination</div>
					</div>
		
					
				<div class="row">
					<div class="comments"><i class="fa fa-comments fa-3x" aria-hidden="true"></i>
					
					</div>
            </section>
			<?php include('../view/footer.php');?>
