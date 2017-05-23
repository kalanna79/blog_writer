<div class="row principal">
    <section class="col-md-12 presentation content">
        <h3>Votre message a bien été envoyé</h3>
		<div class="message">J'ai bien reçu votre message et j'y répondrai dans les plus brefs délais ! <br> Merci de votre intérêt pour mon nouveau livre !</div>
		<div class="message">Voici votre message : <br>
		<?php echo $mail->getNomexp() . "(" . $mail->getExpediteurmail() . ")<br>Message : " . $mail->getMessage();?></div>
		
		<div class="message"><a href="<?php echo 'index' ;?>">Retour à l'accueil</a></div>
    
    </section>
</div>
</div>