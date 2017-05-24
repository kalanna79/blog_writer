<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 29/03/2017
     * Time: 07:36
     */
    $CommentManager = new CommentManager();
    
    $UserManager = new UserManager();
    $users = $UserManager->allUsers();
    
    $ModerationManager = new ModerationManager();
    $moderations = $ModerationManager->showModeration();
    
    $manager = new ChapterManager();
    
    
        //-------- VIEW CHAPTER -------------
    
        if (isset($idC)) {
            $commentaires = $CommentManager->showCommentsChapter($idC);
    
            $chapter = $manager->Chapter_selected($idC);
            $pagination = $chapter->pagination($idC);
        }
    
        if (isset($_SESSION['id'])) {
            $UserManager->activeRead($_SESSION['id'], $idC, $page);
        }
    
    
        //-------- VIEW COMMENTS ---------------
    
        // ------ add a comment -------
    
        if (isset($_POST['submitcomment'])) {
            if (isset($_SESSION['id'])) {
                $comment = new Comment([
                                           'title'     => htmlspecialchars($_POST['title']),
                                           'texte'     => htmlspecialchars($_POST['texte']),
                                           'idchapter' => $idC,
                                       ]);
                $CommentManager->addComment($comment);
                header('Location:chapter-' . $idC . '-' . $page);
            } else {
                $mess = setFlash("Attention !", "Vous devez être connecté pour poster un message", "warning");
            }
        }
    
        // ------ add an answer to a comment -------
        if (isset($_POST['submitreponse'])) {
            if (isset($_SESSION['id'])) {
                $comment = new Comment([
                                           'title'        => NULL,
                                           'texte'        => htmlspecialchars($_POST['reponsetxt']),
                                           'idchapter'    => $idC,
                                           'parentId'     => htmlspecialchars($_POST['reponse']),
                                           'levelcomment' => $_POST['level'] + 1
                                       ]);
                $CommentManager->addComment($comment);
                header('Location:chapter-' . $idC . '-' . $page);
            } else {
                $mess = setFlash("Attention !", "Vous devez être connecté pour poster un message", "warning");
            }
        }
    
    
        //----- add an alert for a comment -----------
    
        if (isset($signal)) {
            if (isset($_SESSION['id'])) {
                $moderation = new Moderation([
                                                 'message'     => 'signale',
                                                 'commentsid'  => $comm,
                                                 'userid'      => $guy
                                             ]);
                if ($CommentManager->hasModeration($comm) == FALSE) {
                    $ModerationManager->addModeration($moderation);
                    $ModerationManager->updateSignaled($comm, $guy);
                } else {
                    $ModerationManager->updateSignaled($comm, $guy);
                    $mess = setFlash("Attention !", "vous avez déjà signalé ce commentaire", "danger");
                }
            } else {
                $mess = setFlash("Attention !", "Vous devez être connecté pour signaler un message", "warning");
            }
        }
    
        include(VIEW . 'header.php');
        include(VIEW . 'chapter.php');
        include(VIEW . 'comments.php');
        include(VIEW . 'footer.php');
    