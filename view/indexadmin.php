 <section class="col-xs-12 col-md-12 principal">
    <!-- Titre -->
    <div class="row titre">
        <div class="col-xs-12 col-md-offset-2 col-md-8">
            <div class="wrapper">
                <div class="clip-text"> <h3>Tableau de bord</h3></div>
            </div>
        </div>
    </div>
	 
		 <div class="row">
			
			 <div class="col-xs-6 col-md-offset-5 col-md-7">
				 <div class="row">
					 <div class="col-md-3">
						 <a href="<?php echo HOST. 'addchapter.php'; ?>?id=<?php echo $_SESSION['id'];?>" >
							 <button class="btn-primary">Ajouter un chapitre</button>
						 </a>
					 </div>
				
				 </div>
			 </div>
		 </div>
    <!-- Mettre un tableau recap avec nb users, les messages signalés, les 5 derniers messages entrés, combien d'utilisateurs on lu tel chapitre ?? + lien vers ajout chapitre -->
    <div class="row">
		<div class="col-xs-12 col-md-offset-1 col-md-5">
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
                                echo "<li>" . $comment->getUserPseudo($comment->getIdUser()) . " a écrit : " .
									$comment->getTexte() . "</li>";
                            }
                                ;?>
						</ul>
					</td>
				</tr>
				<tr>
					<th>Modérations</th>
					<td><ul><?php foreach ($moderations as $moderation) {
                                include(VIEW . "currentmoderation.php");
                            }
                                ;?>
						</ul>
					</td>
				</tr>
		
			</table>
		</div>
		<div class="col-xs-12 col-md-5">
			<table class="table table-bordered">
				<tr>
					<th>Nombre de chapitres publiés</th>
					<td><?php echo count($publies);?></td>
					
				</tr>
				<tr>
					<th>Titre des chapitres publiés: </th>
					<td><?php foreach($publies as $chapter){
                            echo "<a href='" . HOST . "chapter.php?idchapter=" .$chapter->getId()."&page=1'>" . $chapter->getTitle() . "</a><br>";
                        }; ?>
					</td>
				</tr>
				<tr>
					<th>Tous les chapitres</th>
					<td><ul><?php foreach ($chapters as $chapter) {
                                echo "<li>Chap. " . $chapter->getId() . "  : " . $chapter->getTitle() . "<br> Statut : " . $chapter->getPublicationId() . " <a 
href='" . HOST . "addchapter.php?modif=1&id=" . $_SESSION['id'] . "&idchapter=" .$chapter->getId() . "'><br> Modifier</a> - 
<a href=?action=suppr&idchapter=". $chapter->getId() .">Supprimer</a></li><br>";
                            }
                                ;?>
						</ul>
					</td>
				</tr>
		
			</table>
		</div>
		
	</div>
 </section>
	
	