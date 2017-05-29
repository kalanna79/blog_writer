<!DOCTYPE HTML>
<html>
<head>
    <title>Billet pour l'Alaska</title>
    <meta charset="UTF-8">
    
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/bootstrap/css/personal.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Space+Mono|Abril+Fatface" rel="stylesheet">
	<script type="text/javascript" src="assets/tinyMCE/tinymce.min.js"></script>

</head>

<body>
	
    <main class="container-fluid">
		<div id="divflash" class="alert alert-<?php if (isset($mess)) { echo
		$mess['type'];};?>">
			<a id="close" class="close">x</a>
			<div id="flashcontent"><?php if (isset($mess)) { echo flashMessage($mess);} ?></div>
		</div>
       
        <div class="row">
			<div class="col-xs-6 col-md-6 icon-reseaux">
				<a href="#" class="fa fa-facebook-square fa-lg btn-md valign"></a>
				<a href="#" class="fa fa-google-plus-square fa-lg btn-md valign"></a>
				<a href="#" class="fa fa-twitter-square fa-lg btn-md valign"></a>
				<a href="#" class="fa fa-pinterest-square fa-lg btn-md valign"></a>
			</div>
			<div class="col-xs-6 col-md-6 icon-menu">
				<a href="index" class="fa fa-home fa-lg btn-lg valign" title="Accueil"></a>
                <?php if (isset($_SESSION['id'])) { ;?>
						<span> <a href="dashboard-<?php echo $_SESSION['id'];?>">Bonjour <?php echo $_SESSION['pseudo'];?></a></span>
						<a href="deconnection-<?php echo $_SESSION['id'];?>" class="fa fa-sign-out fa-lg btn-lg valign" title="Se déconnecter"></a>
				<?php } else { ;?>
					<a href="inscription" class="fa fa-user-plus fa-lg btn-lg valign" title="s'inscrire"></a>
					<a href="connexion" class="fa fa-sign-in fa-lg btn-lg valign" title="Se connecter"></a>
				<?php };?>
				<a href="contact" class="fa fa-envelope-o fa-lg btn-lg valign" title="Contact"></a>
			</div>
		</div>
		<div class="row back-img">
            <div class="col-md-12" style="text-align: center; padding-bottom: 2vh; border-bottom: 1px solid lightslategray; border-top: 1px solid lightslategray;">
                <a href="index"> <h1>Billet pour l'Alaska...</h1></a>
            </div>
            
        </div>
		<div class="row" style="height: 5vh;">
		</div>
