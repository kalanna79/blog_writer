<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 05/05/2017
     * Time: 12:12
     */
    
    $manager = new ChapterManager();
    header("Cache-Control: no-store, no-cache, must-revalidate");
    
    if (empty($_SESSION))
    {
    header('Location:connexion');
    } else {
    
        if (isset($_POST['ajout']) || isset($_POST['publication']) || isset($_POST['modif']) || isset($_POST['publi'])) {
            $chapter = new Chapter([
                                       'title'  => htmlspecialchars($_POST['title']),
                                       'numero' => htmlspecialchars($_POST['numero']),
                                       'resume' => htmlspecialchars($_POST['resume']),
                                       'texte'  => $_POST['texte'],
                                       'userid' => htmlspecialchars($_SESSION['id'])
                                   ]);
            if (isset($_POST['ajout'])) {
                $manager->addChapter($chapter);
                $mess = setFlash("Félicitations !", "Votre nouveau chapitre est maintenant enregistré", "success");
                header('refresh: 2; dashboard-'. $_SESSION['id']);
            } elseif (isset($_POST['publication'])) {
                $manager->publiChapter($chapter);
                $mess = setFlash("Félicitations !", "Votre chapitre est maintenant publié", "success");
                header('refresh: 2; dashboard-'. $_SESSION['id']);
            }
            
            if (isset($_POST['modif']) && isset($idC)) {
                $manager->updateChapter($chapter, $idC, 1);
                $mess = setFlash("Félicitations !", "Votre chapitre est maintenant modifié", "success");
                header('refresh: 2; dashboard-'. $_SESSION['id']);
            } elseif (isset($_POST['publi']) && isset($idC)) {
                $manager->updateChapter($chapter, $idC, 2);
                $mess = setFlash("Félicitations !", "Votre chapitre est maintenant publié", "success");
                header('refresh: 2; dashboard-'. $_SESSION['id']);
            }
        }
        include(VIEW . 'header.php');
        if (isset($idC)) {
            $chapter = $manager->chapter_selected($idC);
            $titre = "Modifier un chapitre";
            include(VIEW . 'modifychapter.php');
        } elseif (stristr($_SERVER['QUERY_STRING'], 'addOK')) {
            include(VIEW . 'addok.php');
        } else {
            $titre = "Ajouter un chapitre";
            include(VIEW . 'addchapter.php');
        }
        include(VIEW . 'footer.php');
    }