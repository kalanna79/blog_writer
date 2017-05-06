 <section class="col-xs-12 col-md-12 principal">
    <!-- Titre -->
    <div class="row titre">
        <div class="col-xs-12 col-md-offset-2 col-md-8">
            <div class="wrapper">
                <div class="clip-text"> <h3>Tableau de bord</h3></div>
            </div>
        </div>
    </div>
    
    <!-- Mettre un tableau recap avec nb users, les messages signalés, les 5 derniers messages entrés, combien d'utilisateurs on lu tel chapitre ?? + lien vers ajout chapitre -->
    <div class="row">
        
	<div class="col-xs-6 col-md-offset-1 col-md-5">
		<table class="table table-bordered">
			<tr>
				<th>Nombre d'utilisateurs</th>
				<td><?php echo count($users);?></td>
			</tr>
			<tr>
				<th>Nombre de commentaires</th>
				<td><?php echo count($comments);?></td>
			</tr>
			<tr>
				<th>Les derniers commentaires</th>
				<td><ul><?php foreach ($lastcomments as $comment) {
					echo "<li>" . $comment->getUserPseudo() . " a écrit : " . $comment->getTexte() . "</li>";
					}
					;?>
					</ul>
				</td>
			</tr>
			
		</table>
</div>
	
		
</div>
	 <div class="col-xs-6 col-md-offset-1 col-md-5">
		 <div class="row">
			 <a class="col-md-3"><a href="<?php echo HOST. 'addchapter.php'; ?>?id=<?php echo $user->getIdUser();?>"> <button class="btn-primary">Ajouter un chapitre</button> </a></div>
		 </div>
	 </div>
</section>