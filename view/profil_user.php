<section class="col-xs-12 col-md-12 principal content">
    <!-- Titre -->
    <div class="row titre">
        <div class="col-xs-12 col-md-offset-2 col-md-8">
            <div class="wrapper">
                <div class="clip-text"> <h2>Mon profil</h2></div>
            </div>
        </div>
    </div>
    
    <!-- Informations utilisateur -->
    <div class="row">
        
        <div class="col-xs-6 col-md-offset-3 col-md-6">
			
			<div class="panel panel-default">
				<table class="table table-hover">
						<th>Pseudo</th>
						<td><?php echo $user->getPseudo();?></td>
					</tr>
					<tr>
						<th>Prénom</th>
						<td><?php echo $user->getFirstname();?></td>
					</tr>
					<tr>
						<th>Nom</th>
						<td><?php echo $user->getName();?></td>
					</tr>
					<tr>
					<tr>
						<th>Email</th>
						<td><?php echo $user->getEmail();?></td>
					</tr>
					<tr>
						<th>Lecture en cours</th>
						<td>
							<?php if ($user->getIdchapter() == NULL)
							{
							echo '<a href="chapter-1-1">Commencez à lire maintenant</a>';
							}
							else {
								echo 'Chapitre ' . $user->getIdchapter() . " : " . $sess->getChapterTitle($user->getIdchapter());
								echo '<br><a href="chapter-'. $user->getIdchapter() . '-' . $user->getPage().'"> Reprendre la lecture</a>';
							}
							?>
						</td>
					</tr>
					<tr>
						<th>Mot de passe</th>
						<td><a href="change">Changer de mot de passe</a></td>
					</tr>
					
				</table>
			</div>
        </div>
    </div>
    
</section>