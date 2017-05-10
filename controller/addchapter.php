<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 05/05/2017
     * Time: 12:12
     */
    include('../config.php');
    
    $_SESSION['id'] = $_GET['id'];
    $sess = new Session();
    
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
        } elseif (isset($_POST['modif']) && isset($_GET['idchapter']))
        {
        $manager->updateChapter($chapter, $_GET['idchapter'], 1);
        header('Location:' . HOST . 'confirmation_addchapter.php');
    
        } elseif (isset($_POST['publi']) && isset($_GET['idchapter']))
        {
            $manager->updateChapter($chapter, $_GET['idchapter'], 2);
            header('Location:' . HOST . 'confirmation_addchapter.php');
    
        }
    }
    
    
    
    include(VIEW . 'header.php');
    if (isset($_GET['idchapter']) && isset($_GET['modif']))
    {
        $chapter = $manager->chapter_selected($_GET['idchapter']);
        $titre  = "Modifier un chapitre";
        include(VIEW . 'modifychapter.php');
    } else {
        $titre = "Ajouter un chapitre";
        include(VIEW . 'addchapter.php');
    }
    include(VIEW. 'footer.php');