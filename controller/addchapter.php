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
    
    
    
    
    if (isset($_POST['ajout']) || isset($_POST['publication']))
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
        }
        header('Location:' . HOST . 'confirmation_addchapter.php');
    }
    
    include(VIEW . 'header.php');
    if (isset($_GET['idchapter']) && isset($_GET['modif']))
    {
        var_dump($_GET['idchapter']);
        $chapter = $manager->chapter_selected($_GET['idchapter']);
        include(VIEW . 'modifychapter.php');
    } else {
        include(VIEW . 'addchapter.php');
    }
    include(VIEW. 'footer.php');