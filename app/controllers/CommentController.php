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

            // Persist comment.
            $comment->save();
        }

        Helpers\URL::redirect('home');
    }
}