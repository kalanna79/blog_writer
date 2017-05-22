<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 05/05/2017
     * Time: 11:11
     */
    
    $sess = new Session();
    $manager = new UserManager();
    $users = $manager->AllUsers(); //allows to count number of users
    $user = $manager->getUserById($_SESSION['id']);
    
    
    $comanager = new CommentManager();
    $comments = $comanager->showAllComments(); //allows to count number of comments
    $lastcomments = $comanager->showLastComments();
    
    $moderationmanager = new ModerationManager();
    $moderations = $moderationmanager->showModeration();
    
    
    $chaptermanager = new ChapterManager();
    $chapters = $chaptermanager->allChapters(); //allows to show all chapters
    $publies = $chaptermanager->Tab_matieres();
    
    
    if (isset($idC)) {
            $chaptermanager->deleteChapter($idC);
            header('Location:dashboard-' . $_SESSION['id']);
    }
        
        
    //moderations
    if (isset($idCo))
    {
        if (stristr($_SERVER['QUERY_STRING'], 'trash'))
        {
            
            $moderationmanager->updateModeration(2,$idCo);
            repl($string);
            header('Location:dashboard-'.$_SESSION['id']);
        }
        
        if (stristr($_SERVER['QUERY_STRING'], 'k'))
        {
            $moderationmanager->downSignaled($idCo);
            $moderationmanager->deleteModeration($idCo);
            header('Location:dashboard-'.$_SESSION['id']);
        }
    }
    
    include(ROOT . 'view/header.php');
    include(VIEW . 'indexadmin.php');
    include(VIEW . 'footer.php');