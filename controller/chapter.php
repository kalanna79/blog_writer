<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 29/03/2017
     * Time: 07:36
     */
    //include('../config.php');
    
    $CommentManager = new CommentManager();
    $commentaires = $CommentManager->showAllComments();
    
    $UserManager = new UserManager();
    $users = $UserManager->allUsers();
    
    $ModerationManager = new ModerationManager();
    $moderations = $ModerationManager->showModeration();
    
    
    $manager = new ChapterManager();
    
    //-------- VIEW CHAPTER -------------
    
    
    if (isset($idC))
    {
    	$chapter = $manager->Chapter_selected($idC);
        $pagination = $chapter->pagination($idC);
    }
    
    
    if (isset($_SESSION['id']))
    {
        $UserManager->activeRead($_SESSION['id'], $idC, $page);
    }
    
    
    //-------- VIEW COMMENTS ---------------
    
        // ------ add a comment -------
    
    if (isset($_POST['submitcomment']))
    {
        if (isset($_SESSION['id'])) {
        $comment = new Comment([
                                   'title' => $_POST['title'],
                                   'texte' => $_POST['texte'],
                                   'idchapter' => $idC,
                               ]);
        $CommentManager->addComment($comment);
        header('Location:chapter-'.$idC.'-'.$page);
    } else
    {
        echo "<script language=\"javascript\">";
        echo "alert('Vous devez être connecté pour poster un message')";
        echo "</script>";
    }}
    
        // ------ add an answer to a comment -------
    if (isset($_POST['submitreponse']))
    {
        if (isset($_SESSION['id'])) {
        $comment = new Comment([
                                   'title' => NULL,
                                   'texte' => $_POST['reponsetxt'],
                                   'idchapter' => $idC,
                                   'parentId' =>$_POST['reponse'],
                                   'levelcomment' => $_POST['level']+1
                               ]);
        $CommentManager->addComment($comment);
        header('Location:chapter-'.$idC.'-'.$page);
        } else
        {
            echo "<script language=\"javascript\">";
            echo "alert('Vous devez être connecté pour poster un message')";
            echo "</script>";
        }}
        
        //----- add an alert for a comment -----------
    
        if (isset($signal))
        {
            var_dump("siglement");
            $date = getdate();
            $date = $date['mday'] . "/" . $date['mon'] . "/" . $date['year'];
            
            $moderation = new Moderation([
                'datecreated' => $date,
                'message' => 'signale',
                'commentsid' => $comm,
                'userid' => $guy
                                         ]);
            if ($CommentManager->hasModeration($comm) == FALSE)
            {
                $ModerationManager->addModeration($moderation);
                $ModerationManager->updateSignaled($comm, $guy);
            } else {
                $ModerationManager->updateSignaled($comm, $guy);
                echo "vous avez déjà signalé ce commentaire";
            }
        }
        
        
    
    include(VIEW . 'header.php');
  	include(VIEW . 'chapter.php');
	include(VIEW . 'comments.php');
	include(VIEW . 'footer.php');
