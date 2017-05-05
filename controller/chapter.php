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
    
    $manager = new ChapterManager();
    if (isset($_GET['idchapter'])) {
    	$chapter = $manager->Chapter_selected($_GET['idchapter']);
    	
	}
    
    
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
    
    
    include(ROOT . 'view/header.php');
  	include(VIEW . 'chapter.php');
	include(VIEW . 'comments.php');
	include(VIEW . 'footer.php');
