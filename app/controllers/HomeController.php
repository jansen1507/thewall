<?php

use TheWall\Core\Helpers;

class HomeController extends Controller {
    function getIndex() {

        // Retrieve All posts and pass to view
        $this->view->posts = PostQuery::create()->find();
        $this->view->messages = MessageQuery::create()
                                    ->filterByReceiverId(Helpers\Session::get('user_id'))
                                    ->find();
        // Render the view.
        $this->view->render('home/index');

    }

}