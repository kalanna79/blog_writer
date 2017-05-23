<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 05/05/2017
     * Time: 11:11
     */
    
    header("Cache-Control: no-store, no-cache, must-revalidate");
    
    if (empty($_SESSION))
    {
        header('Location:connexion');
    }
    else
        {
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
                $mess = setFlash("Modération effectuée !", "Ce message vient d'être modéré", "success");
            }
        
            if (stristr($_SERVER['QUERY_STRING'], 'cok'))
            {
                $moderationmanager->downSignaled($idCo);
                $moderationmanager->deleteModeration($idCo);
                $mess = setFlash("Modération effectuée !", "Vous avez accepté ce message", "success");
            }
        }
    
        include(ROOT . 'view/header.php');
        if ($_SESSION['id'] == 1){
        include(VIEW . 'indexadmin.php');
        } else {
            include (VIEW.'profil_user.php');
        }
        include(VIEW . 'footer.php');
    }
    