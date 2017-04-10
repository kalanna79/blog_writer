<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 06/04/2017
     * Time: 15:35
     */
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