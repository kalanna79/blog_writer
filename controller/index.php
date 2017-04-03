<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 24/03/2017
     * Time: 09:20
     */
        $bdd = new PDO('mysql:host=localhost; dbname=blogwriter;charset=utf8', 'root', 'root', array
		(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));

        $reponse = $bdd->query('SELECT * FROM chapter');
        while ($allchapters = $reponse->fetch()){
        	$chapters[] = array(
        			'id' => $allchapters['id'],
        			'title' => $allchapters['title'],
					'date_created' => $allchapters['date_created'],
					'date_modified' => $allchapters['date_modified'],
					'texte' => $allchapters['texte'],
					'img' => $allchapters['img']
			);
		}
        $reponse->closeCursor();
   include('../view/header.php');
    include('../view/index.php'); /* regrouper les 2 vues en mettant include header dans include index */
	include('../view/footer.php');
   ?>
