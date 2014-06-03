<?php

use TheWall\Core\Helpers;

class CommentController extends Controller {
    function postCreate() {
        // get + trim vars
        $text = (isset($_POST['text']) ? trim($_POST['text']) : false);
        $postId = (isset($_POST['post_id']) ? trim($_POST['post_id']) : false);

        // Validation

        if(Helpers\Validator::check(array(
            'text' => $text
        ))) {

            $comment = new Comment();
            $comment->setText($text);
            $comment->setUserId(Helpers\Session::get('user_id'));
            $comment->setPostId($postId);

            if($comment->getUserId() != null) {
                // Persist comment.
                $comment->save();
            } else {
                Helpers\Notifier::add('warning', 'You need to be logged in to write a comment!');
            }


        }

        Helpers\URL::redirect('home');
    }
}