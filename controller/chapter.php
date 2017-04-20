<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 29/03/2017
     * Time: 07:36
     */
    include('../config.php');
	
    $manager = new ChapterManager();
    if (isset($_GET['id'])) {
    	$chapter = $manager->Chapter_selected($_GET['id']);
	}
    
    $CommentManager = new CommentManager();
    $comments = $CommentManager->showAllComments();
    
    $UserManager = new UserManager();
    $users = $UserManager->allUsers();
    
    if (isset($_POST['submitcomment']))
    {
        $comment = new Comment([
            'title' => $_POST['title'],
            'texte' => $_POST['texte'],
            'idchapter' => $_GET['id'],
        ]);
    $CommentManager->addComment($comment);
    }

    include(ROOT . 'view/header.php');
  	include(VIEW . 'chapter.php');
	include(VIEW . 'comments.php');
	include(VIEW . 'footer.php');
