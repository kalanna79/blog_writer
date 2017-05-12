<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 29/03/2017
     * Time: 07:36
     */
    include('../config.php');
    
    $CommentManager = new CommentManager();
    $commentaires = $CommentManager->showAllComments();
    
    $UserManager = new UserManager();
    $users = $UserManager->allUsers();
    
    $ModerationManager = new ModerationManager();
    
    $manager = new ChapterManager();
    
    //-------- VIEW CHAPTER -------------
    
    if (isset($_GET['idchapter']))
    {
    	$chapter = $manager->Chapter_selected($_GET['idchapter']);
        $pagination = $chapter->pagination($_GET['idchapter']);
    }
    
    
    if (isset($_SESSION['id']))
    {
        $UserManager->activeRead($_SESSION['id'], $_GET['idchapter'], $_GET['page']);
    }
    
    
    //-------- VIEW COMMENTS ---------------
    
        // ------ add a comment -------
    
    if (isset($_POST['submitcomment']))
    {
        if (isset($_SESSION['id'])) {
        $comment = new Comment([
                                   'title' => $_POST['title'],
                                   'texte' => $_POST['texte'],
                                   'idchapter' => $_GET['id'],
                               ]);
        $CommentManager->addComment($comment);
        header('Location:'. HOST.'chapter.php?idchapter='.$_GET['id'].'&page=1');
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
                                   'idchapter' => $_GET['id'],
                                   'commentsid' =>$_POST['reponse'],
                                   'levelcomment' => 1
        
                               ]);
        $CommentManager->addComment($comment);
        header('Location:'. HOST.'chapter.php?idchapter='.$_GET['id'].'&page=1');
        } else
        {
            echo "<script language=\"javascript\">";
            echo "alert('Vous devez être connecté pour poster un message')";
            echo "</script>";
        }}
        
        //----- add an alert for a comment -----------
    
        if (isset($_GET['signaler']))
        {
            $date = getdate();
            $date = $date['mday'] . "/" . $date['mon'] . "/" . $date['year'];
            
            $moderation = new Moderation([
                'datecreated' => $date,
                'message' => 'signale',
                'commentsid' => $_GET['comment'],
                'userid' => $_GET['user']
                                         ]);
            if ($ModerationManager->IsModered($_GET['comment'], $_GET['user']) == FALSE)
            {
                $ModerationManager->addModeration($moderation);
            } else {
                echo "vous avez déjà signalé ce commentaire";
            }
        }
    
    include(ROOT . 'view/header.php');
  	include(VIEW . 'chapter.php');
	include(VIEW . 'comments.php');
	include(VIEW . 'footer.php');
