<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 06/04/2017
     * Time: 15:35
     */
    $reponse = $bdd->query('SELECT * FROM chapter');
    while ($allchapters = $reponse->fetch(PDO::FETCH_ASSOC)){
        $newChapter = new Chapter();
        $newChapter->setId($allchapters['id']);
        //faire toutes les lignes ou hydrater l'objet
        $chapter[] = $newChapter;
        /*$chapters[] = array(
            'id' => $allchapters['id'],
            'title' => $allchapters['title'],
            'date_created' => $allchapters['date_created'],
            'date_modified' => $allchapters['date_modified'],
            'texte' => $allchapters['texte'],
            'img' => $allchapters['img']
        );*/
    }
    $reponse->closeCursor();