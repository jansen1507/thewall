<?php namespace TheWall;

use TheWall\Helpers;
use TheWall\Libs;

class App {

    public function run() {

        // starting the session

        Helpers\Session::init();

        // instantiating the router.
        $router = new Libs\Router();

        // setting the right path to the controllers dir.
        $router->setPath(__SITE_PATH . 'app/controllers');

        // running the loader
        $router->loader();
    }
    public function detect() {

    }
} 
