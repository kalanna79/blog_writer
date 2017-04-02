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
            'texte' => '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ullamcorper sem erat, in lobortis enim viverra et. Nunc sit amet lacus consequat, congue lacus ornare, lacinia lorem. Suspendisse sit amet ligula imperdiet, commodo eros ac, molestie tortor. Praesent id velit rutrum libero mollis maximus eu ut quam. Quisque dignissim massa metus, vel maximus sem consectetur non. Nunc at enim leo. Sed dapibus ligula leo, id iaculis arcu mollis eget.</div>',
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
	
	<div class="row" style=" background-color: transparent; height:100%; width: 100%; position: absolute;
     z-index: 2;"></div>
	
    <main class="container" style="position: relative; z-index: 20;">
        <!-- partie de gauche avec présentation auteur & form de contact -->
		
		
		
        <div class="row"">
            <div class="col-xs-12 col-md-offset-1 col-md-8 ">
                <h1>Billet pour l'Alaska</h1>
            </div>
            <div class="col-md-2 icon-menu">
                <a href="#" class="fa fa-user-plus fa-lg btn-lg valign"></a>
                <a href="#" class="fa fa-sign-in fa-lg btn-lg valign"></a>
                <a href="#" class="fa fa-envelope-o fa-lg btn-lg valign"></a>
            </div>
        </div>
		<div class=" col-xs-12 col-md-offset-1 col-md-10">
        <div class="row">
            <nav class="col-md-2">
                <ul class="nav flex-column nav-tabs-justified">
                    <?php foreach ($chaps as $key => $chap) :?>
                        
                    <li class="nav-item">
						<a class="navbar-link" href="#">chapter <?php echo $chap['chap'];?></a>
                    </li>
					<?php endforeach;?>
                    
					
					<li class="nav-item">
						<a class="navbar-link" href="index.php">Accueil</a>
					</li>
                </ul>
            </nav>
            
            <section class="col-xs-12 col-md-10 principal">
				<div class="row image" style="text-align: center;">
					<img src="img/rafting-1377057_640.jpg" width="55%" class="valign" ">
				</div>
				<div class="row titre">
					<h2>Blabla</h2>
					<abbr>date</abbr>
				</div>
				
						
				<div class="row">
							
					<div class="col-md-12 book"><?php echo $chap['texte'];?></div>
                            
				</div>
					<div class="row">
						<div class="page"><div>pagination</div>
					</div>
		
					
				<div class="row">
					<div class="comments"><i class="fa fa-comments fa-3x" aria-hidden="true"></i>
					
					</div>
            </section>
			<?php include ('footer.php');?>
