<?php

use TheWall\Core\Helpers;

class PostController extends Controller {
    function postCreate() {
        if(Helpers\Auth::check()) {
            // get + trim vars
            $text = (isset($_POST['text']) ? trim(Helpers\Sanitizor::escapeHTML($_POST['text'])) : false);
            $token = $_POST['csrftoken'];


            // Validation

            if(Helpers\Validator::check(array(
                'text' => $text,
                'csrftoken' => $token
            ))) {

                $post = new Post();
                $post->setText($text);
                $post->setUserId(Helpers\Session::get('user_id'));

                // Persist post.
                $post->save();
            }
        }
        Helpers\URL::redirect('home');
    }
}