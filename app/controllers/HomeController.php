<?php

class HomeController extends Controller {
    function getIndex() {
        $this->view->render('home/index');
    }
}