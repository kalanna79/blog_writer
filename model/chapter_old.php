<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 06/04/2017
     * Time: 15:54
     */
    $reponse = $bdd->prepare('SELECT * FROM chapter WHERE id=?');
    $reponse->execute(array($_GET['id']));
    $chap = $reponse->fetch();
    $reponse->closeCursor();
    
    
    
    $texte = $chapter->getTexte();
    
    /**
     * Retourne le texte en tableau afin d'effectuer la pagination
     * @param     $texte = le texte à couper
     * @param int $nb_car = le nombre de caractères par page
     * @return array => chaque part de texte est une ligne de tableau
     */
    function pager($texte, $nb_car=4000) {
        $part = wordwrap($texte, $nb_car, '\n'); // on coupe le texte au mot le plus proche de 4000 car ou de $nb_car
        // et on ajoute \n
        $pager = explode('\n', $part); // on transforme le texte en array avec \n qui sert de séparateur
        return $pager; // on retourne le tableau
    }
    
    /**
     * @param $texte = le texte à paginer
     * affiche les numéros de pages avec lien vers la partie de texte
     */
    function pagination($texte) {
        $pager = pager($texte); //on récupère pager
        foreach ($pager as $key => $single) { // pour chaque ligne, on ajoute 1 pour afficher le numéro de page et on
            // met le lien pour accéder aux différentes pages
            $page = $key+=1;
            echo $page = '<a href=?id='. $_GET['id'] . '&page='.$key.'> ' . $page . ' </a>';
        }
    }
    
    /**
     * @param $texte = texte du chapitre
     * @return mixed = texte de la page visée selon le numéro
     */
    
    function showText($texte) {
        $pager = pager($texte); //on récupère pager
        $page_selected = $_GET['page'];
            return $pager[$page_selected -1]; //retourne le texte de la page visée
        }
    
?>