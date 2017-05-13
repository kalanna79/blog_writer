<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 05/05/2017
     * Time: 11:11
     */
    include('../config.php');
    
    $sess = new Session();
    $manager = new UserManager();
    $users = $manager->AllUsers(); //allows to count number of users
    
    $comanager = new CommentManager();
    $comments = $comanager->showAllComments(); //allows to count number of comments
    $lastcomments = $comanager->showLastComments();
    
    $moderationmanager = new ModerationManager();
    $moderations = $moderationmanager->showModeration();
    
    
    $chaptermanager = new ChapterManager();
    $chapters = $chaptermanager->allChapters(); //allows to show all chapters
    $publies = $chaptermanager->Tab_matieres();
    
    if (isset($_GET['idchapter']) && $_GET['action'] == 'suppr')
    {
        $chaptermanager->deleteChapter($_GET['idchapter']);
        header('Location:'. HOST . "indexadmin.php");
    }
    
    include(ROOT . 'view/header.php');
    include(VIEW . 'indexadmin.php');
    include(VIEW . 'footer.php');