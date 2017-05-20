<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 05/05/2017
     * Time: 12:12
     */
    
    $manager = new ChapterManager();
    
    
    if (isset($_POST['ajout']) || isset($_POST['publication']) || isset($_POST['modif']) || isset($_POST['publi']))
    {
        $chapter = new Chapter([
            'title'=>$_POST['title'],
            'resume'=>$_POST['resume'],
            'texte'=>$_POST['texte'],
            'userid'=>$_SESSION['id']
                               ]);
        if (isset($_POST['ajout'])){
            $manager->addChapter($chapter);
        } elseif (isset($_POST['publication']))
        {
            $manager->publiChapter($chapter);
        } elseif (isset($_POST['modif']) && isset($idC))
        {
        $manager->updateChapter($chapter, $idC, 1);
        header('Location:confirmation_addchapter.php');
    
        } elseif (isset($_POST['publi']) && isset($idC))
        {
            $manager->updateChapter($chapter, $idC, 2);
            header('Location:confirmation_addchapter.php');
        }
    }
    
    include(VIEW . 'header.php');
    if (isset($idC))
    {
        var_dump($idC);
        $chapter = $manager->chapter_selected($idC);
        $titre  = "Modifier un chapitre";
        include(VIEW . 'modifychapter.php');
    } else {
        $titre = "Ajouter un chapitre";
        include(VIEW . 'addchapter.php');
    }
    include(VIEW. 'footer.php');