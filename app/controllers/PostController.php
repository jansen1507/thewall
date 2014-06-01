<?php

use TheWall\Core\Helpers;

class PostController extends Controller {
    function postPost() {
        // get + trim vars
        $text = (isset($_POST['text']) ? trim($_POST['text']) : false);

        // Validation

        if(Helpers\Validator::check(array(
            'text' => $text
        ))) {

            $post = new Post();
            $post->setText($text);
            $post->setUserId(Helpers\Session::get('user_id'));

            // Persist post.
            $post->save();
        }

        Helpers\URL::redirect('home');
    }
}