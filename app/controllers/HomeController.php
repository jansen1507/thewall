<?php

class HomeController extends Controller {
    function getIndex() {

        // Retrieve All posts and pass to view
        $this->view->posts = PostQuery::create()->find();
        // Render the view.
        $this->view->render('home/index');

    }

    function postPost() {

    }
}