<?php

use TheWall\Core\Helpers;

class CommentController extends Controller {
    function postCreate() {
        // get + trim vars
        $text = (isset($_POST['text']) ? trim(Helpers\Sanitizor::escapeHTML($_POST['text'])) : false);
        $postId = (isset($_POST['post_id']) ? trim(Helpers\Sanitizor::escapeHTML($_POST['post_id'])) : false);

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
                try {
                    $comment->save();

                    Helpers\Observer::log('created_comments', array(
                        'creator' => Helpers\Session::get('user_id'),
                        'commentId' => $comment->getId(),
                        'postId' => $comment->getPost()->getId()
                    ));

                } catch (PropelException $p) {
                    Helpers\Notifier::add('danger', $p);
                }
            } else {
                Helpers\Notifier::add('warning', 'You need to be logged in to write a comment!');
            }


        }

        Helpers\URL::redirect('home');
    }
}